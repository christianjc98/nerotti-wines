import { useBlockProps } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { headline, buttonText, buttonUrl } = attributes;

	return (
		<div { ...useBlockProps.save() }>
			<div className="contact-cta">
				<div className="contact-cta__content">
					{ headline && (
						<h2 className="contact-cta__headline">{ headline }</h2>
					) }
					{ buttonText && (
						<a
							href={ buttonUrl || '#' }
							className="contact-cta__button"
						>
							{ buttonText }
						</a>
					) }
				</div>
			</div>
		</div>
	);
}
