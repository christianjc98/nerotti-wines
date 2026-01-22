import { useBlockProps } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { icon, title, description } = attributes;

	return (
		<div { ...useBlockProps.save() }>
			<div className="experience-highlight">
				<div
					className="experience-highlight__icon"
					role="img"
					aria-label={ title }
				>
					{ icon }
				</div>
				<div className="experience-highlight__content">
					{ title && (
						<h3 className="experience-highlight__title">
							{ title }
						</h3>
					) }
					{ description && (
						<p className="experience-highlight__description">
							{ description }
						</p>
					) }
				</div>
			</div>
		</div>
	);
}
