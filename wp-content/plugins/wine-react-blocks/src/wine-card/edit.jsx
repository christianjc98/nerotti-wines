import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor';
import {
	PanelBody,
	TextControl,
	TextareaControl,
	SelectControl,
	Button,
} from '@wordpress/components';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { imageUrl, imageId, imageAlt, wineName, wineType, description } =
		attributes;

	const onSelectImage = ( media ) => {
		setAttributes( {
			imageUrl: media.url,
			imageId: media.id,
			imageAlt: media.alt,
		} );
	};

	const onRemoveImage = () => {
		setAttributes( {
			imageUrl: '',
			imageId: undefined,
			imageAlt: '',
		} );
	};

	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody
					title={ __( 'Wine Settings', 'wine-react-blocks' ) }
					initialOpen={ true }
				>
					<TextControl
						label={ __( 'Wine Name', 'wine-react-blocks' ) }
						value={ wineName }
						onChange={ ( value ) =>
							setAttributes( { wineName: value } )
						}
						help={ __(
							'Enter the name of the wine',
							'wine-react-blocks'
						) }
					/>
					<SelectControl
						label={ __( 'Wine Type', 'wine-react-blocks' ) }
						value={ wineType }
						options={ [
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
								label: __( 'Sparkling', 'wine-react-blocks' ),
								value: 'sparkling',
							},
						] }
						onChange={ ( value ) =>
							setAttributes( { wineType: value } )
						}
					/>
					<TextareaControl
						label={ __( 'Description', 'wine-react-blocks' ) }
						value={ description }
						onChange={ ( value ) =>
							setAttributes( { description: value } )
						}
						help={ __(
							'Short description of the wine',
							'wine-react-blocks'
						) }
						rows={ 4 }
					/>
				</PanelBody>
			</InspectorControls>

			<article className="wine-card">
				<MediaUploadCheck>
					<MediaUpload
						onSelect={ onSelectImage }
						allowedTypes={ [ 'image' ] }
						value={ imageId }
						render={ ( { open } ) => (
							<div className="wine-card__image-container">
								{ imageUrl ? (
									<>
										<img
											src={ imageUrl }
											alt={ imageAlt || wineName }
											className="wine-card__image"
										/>
										<Button
											onClick={ onRemoveImage }
											isDestructive
											className="wine-card__remove-image"
										>
											{ __(
												'Remove Image',
												'wine-react-blocks'
											) }
										</Button>
									</>
								) : (
									<Button
										onClick={ open }
										variant="secondary"
										className="wine-card__upload-button"
									>
										{ __(
											'Upload Wine Image',
											'wine-react-blocks'
										) }
									</Button>
								) }
							</div>
						) }
					/>
				</MediaUploadCheck>

				<div className="wine-card__content">
					{ wineName && (
						<h3 className="wine-card__title">{ wineName }</h3>
					) }
					{ wineType && (
						<span className="wine-card__type wine-type-badge">
							{ wineType.charAt( 0 ).toUpperCase() +
								wineType.slice( 1 ) }
						</span>
					) }
					{ description && (
						<p className="wine-card__description">
							{ description }
						</p>
					) }
				</div>
			</article>
		</div>
	);
}
