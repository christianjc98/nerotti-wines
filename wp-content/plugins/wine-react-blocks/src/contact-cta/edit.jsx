import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { headline, buttonText, buttonUrl } = attributes;

	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody
					title={ __( 'CTA Settings', 'wine-react-blocks' ) }
					initialOpen={ true }
				>
					<TextControl
						label={ __( 'Headline', 'wine-react-blocks' ) }
						value={ headline }
						onChange={ ( value ) =>
							setAttributes( { headline: value } )
						}
						help={ __(
							'Enter the call-to-action headline',
							'wine-react-blocks'
						) }
					/>
					<TextControl
						label={ __( 'Button Text', 'wine-react-blocks' ) }
						value={ buttonText }
						onChange={ ( value ) =>
							setAttributes( { buttonText: value } )
						}
						help={ __(
							'Enter the button text',
							'wine-react-blocks'
						) }
					/>
					<TextControl
						label={ __( 'Button URL', 'wine-react-blocks' ) }
						value={ buttonUrl }
						onChange={ ( value ) =>
							setAttributes( { buttonUrl: value } )
						}
						help={ __(
							'Enter the URL for the button',
							'wine-react-blocks'
						) }
						type="url"
					/>
				</PanelBody>
			</InspectorControls>

			<div className="contact-cta">
				<div className="contact-cta__content">
					{ headline && (
						<h2 className="contact-cta__headline">{ headline }</h2>
					) }
					{ buttonText && (
						<a
							href={ buttonUrl || '#' }
							className="contact-cta__button"
							onClick={ ( e ) => e.preventDefault() }
						>
							{ buttonText }
						</a>
					) }
				</div>
			</div>
		</div>
	);
}
