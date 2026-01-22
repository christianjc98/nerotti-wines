/**
 * Wine Grid Block - Editor Component
 *
 * Displays a preview of the wine grid in the block editor
 * with controls for filtering and display options
 *
 * @package Wine_React_Blocks
 */

import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	RangeControl,
	SelectControl,
	Placeholder,
	Spinner,
} from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { store as coreDataStore } from '@wordpress/core-data';

export default function Edit( { attributes, setAttributes } ) {
	const { postsToShow, wineType, orderBy, order } = attributes;

	/**
	 * Query Wine posts using WordPress core data store
	 *
	 * This hook fetches wine posts based on block attributes
	 * and automatically re-queries when attributes change
	 */
	const { wines, isResolvingWines } = useSelect(
		( select ) => {
			const { getEntityRecords, isResolving } = select( coreDataStore );

			// Build query parameters
			const queryParams = {
				per_page: postsToShow,
				_embed: true, // Include featured image data
				status: 'publish',
			};

			// Add wine type filter if selected
			if ( wineType ) {
				queryParams.wine_type = wineType;
			}

			// Set ordering
			if ( orderBy === 'title' ) {
				queryParams.orderby = 'title';
				queryParams.order = order;
			} else if ( orderBy === 'meta_value' ) {
				queryParams.orderby = 'meta_value_num';
				queryParams.meta_key = 'wine_year';
				queryParams.order = order;
			}

			return {
				wines: getEntityRecords( 'postType', 'wine', queryParams ),
				isResolvingWines: isResolving( 'getEntityRecords', [
					'postType',
					'wine',
					queryParams,
				] ),
			};
		},
		[ postsToShow, wineType, orderBy, order ]
	);

	/**
	 * Get featured image URL from post
	 *
	 * @param {Object} wine Wine post object
	 * @return {string|null} Image URL or null
	 */
	const getFeaturedImage = ( wine ) => {
		if (
			wine._embedded &&
			wine._embedded['wp:featuredmedia'] &&
			wine._embedded['wp:featuredmedia'][0]
		) {
			return (
				wine._embedded['wp:featuredmedia'][0].media_details?.sizes
					?.medium?.source_url ||
				wine._embedded['wp:featuredmedia'][0].source_url
			);
		}
		return null;
	};

	/**
	 * Get ACF field value
	 * Note: In the editor, ACF fields may not be available via REST API
	 * This is a placeholder - actual ACF data will show on frontend
	 *
	 * @param {Object} wine Wine post object
	 * @param {string} fieldName ACF field name
	 * @return {any} Field value
	 */
	const getACFField = ( wine, fieldName ) => {
		// ACF fields are available in wine.acf if REST API is enabled
		return wine.acf ? wine.acf[ fieldName ] : null;
	};

	return (
		<div { ...useBlockProps() }>
			{/* Inspector Controls - Sidebar Settings */ }
			<InspectorControls>
				<PanelBody
					title={ __( 'Display Settings', 'wine-react-blocks' ) }
					initialOpen={ true }
				>
					<RangeControl
						label={ __(
							'Number of Wines to Show',
							'wine-react-blocks'
						) }
						value={ postsToShow }
						onChange={ ( value ) =>
							setAttributes( { postsToShow: value } )
						}
						min={ 1 }
						max={ 24 }
						help={ __(
							'Maximum number of wines to display',
							'wine-react-blocks'
						) }
					/>
				</PanelBody>

				<PanelBody
					title={ __( 'Filter Settings', 'wine-react-blocks' ) }
					initialOpen={ true }
				>
					<SelectControl
						label={ __( 'Wine Type', 'wine-react-blocks' ) }
						value={ wineType }
						options={ [
							{
								label: __( 'All Types', 'wine-react-blocks' ),
								value: '',
							},
							{
								label: __( 'Red', 'wine-react-blocks' ),
								value: 'red',
							},
							{
								label: __( 'White', 'wine-react-blocks' ),
								value: 'white',
							},
							{
								label: __( 'Rosé', 'wine-react-blocks' ),
								value: 'rose',
							},
							{
								label: __(
									'Sparkling',
									'wine-react-blocks'
								),
								value: 'sparkling',
							},
						] }
						onChange={ ( value ) =>
							setAttributes( { wineType: value } )
						}
						help={ __(
							'Filter wines by type',
							'wine-react-blocks'
						) }
					/>
				</PanelBody>

				<PanelBody
					title={ __( 'Sorting', 'wine-react-blocks' ) }
					initialOpen={ false }
				>
					<SelectControl
						label={ __( 'Order By', 'wine-react-blocks' ) }
						value={ orderBy }
						options={ [
							{
								label: __( 'Title', 'wine-react-blocks' ),
								value: 'title',
							},
							{
								label: __( 'Year', 'wine-react-blocks' ),
								value: 'meta_value',
							},
						] }
						onChange={ ( value ) =>
							setAttributes( { orderBy: value } )
						}
					/>

					<SelectControl
						label={ __( 'Order', 'wine-react-blocks' ) }
						value={ order }
						options={ [
							{
								label: __(
									'Ascending (A-Z, Old-New)',
									'wine-react-blocks'
								),
								value: 'ASC',
							},
							{
								label: __(
									'Descending (Z-A, New-Old)',
									'wine-react-blocks'
								),
								value: 'DESC',
							},
						] }
						onChange={ ( value ) =>
							setAttributes( { order: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>

			{/* Block Content - Preview Grid */ }
			{ isResolvingWines && (
				<Placeholder
					icon="grid-view"
					label={ __( 'Wine Grid', 'wine-react-blocks' ) }
				>
					<Spinner />
					<p>
						{ __( 'Loading wines...', 'wine-react-blocks' ) }
					</p>
				</Placeholder>
			) }

			{ ! isResolvingWines && ( ! wines || wines.length === 0 ) && (
				<Placeholder
					icon="grid-view"
					label={ __( 'Wine Grid', 'wine-react-blocks' ) }
				>
					<p>
						{ __(
							'No wines found. Try adjusting your filters or create some wine posts.',
							'wine-react-blocks'
						) }
					</p>
				</Placeholder>
			) }

			{ ! isResolvingWines && wines && wines.length > 0 && (
				<div className="wine-grid">
					<div className="wine-grid__container">
						{ wines.map( ( wine ) => {
							const featuredImage = getFeaturedImage( wine );
							const wineYear = getACFField( wine, 'wine_year' );
							const wineTypeField = getACFField(
								wine,
								'wine_type'
							);

							return (
								<article
									key={ wine.id }
									className="wine-grid__item"
								>
									{ featuredImage && (
										<div className="wine-grid__image">
											<img
												src={ featuredImage }
												alt={
													wine.title.rendered ||
													''
												}
											/>
										</div>
									) }

									{ ! featuredImage && (
										<div className="wine-grid__image wine-grid__image--placeholder">
											<span className="wine-grid__placeholder-icon">
												🍷
											</span>
										</div>
									) }

									<div className="wine-grid__content">
										<h3 className="wine-grid__title">
											{ wine.title.rendered }
										</h3>

										{ ( wineYear || wineTypeField ) && (
											<div className="wine-grid__meta">
												{ wineYear && (
													<span className="wine-grid__year">
														{ wineYear }
													</span>
												) }
												{ wineTypeField && (
													<span className="wine-grid__type">
														{ wineTypeField }
													</span>
												) }
											</div>
										) }

										{ wine.excerpt.rendered && (
											<div
												className="wine-grid__excerpt"
												dangerouslySetInnerHTML={ {
													__html: wine.excerpt
														.rendered,
												} }
											/>
										) }
									</div>
								</article>
							);
						} ) }
					</div>
				</div>
			) }
		</div>
	);
}
