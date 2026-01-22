import { useBlockProps } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { imageUrl, imageAlt, wineName, wineType, description } = attributes;

	return (
		<div { ...useBlockProps.save() }>
			<article className="wine-card">
				{ imageUrl && (
					<img
						src={ imageUrl }
						alt={ imageAlt || wineName }
						className="wine-card__image"
					/>
				) }
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
