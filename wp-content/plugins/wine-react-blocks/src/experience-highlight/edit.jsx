import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	TextControl,
	TextareaControl,
	SelectControl,
} from '@wordpress/components';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { icon, title, description } = attributes;

	const iconOptions = [
		{ label: __( '🍷 Wine Glass', 'wine-react-blocks' ), value: '🍷' },
		{ label: __( '🍇 Grapes', 'wine-react-blocks' ), value: '🍇' },
		{ label: __( '🎉 Celebration', 'wine-react-blocks' ), value: '🎉' },
		{ label: __( '🏛️ Estate', 'wine-react-blocks' ), value: '🏛️' },
		{ label: __( '👥 Group', 'wine-react-blocks' ), value: '👥' },
		{ label: __( '🎵 Music', 'wine-react-blocks' ), value: '🎵' },
		{ label: __( '🍽️ Dining', 'wine-react-blocks' ), value: '🍽️' },
		{ label: __( '⭐ Star', 'wine-react-blocks' ), value: '⭐' },
		{ label: __( '🌟 Sparkle', 'wine-react-blocks' ), value: '🌟' },
		{ label: __( '🎊 Party', 'wine-react-blocks' ), value: '🎊' },
	];

	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody
					title={ __(
						'Experience Settings',
						'wine-react-blocks'
					) }
					initialOpen={ true }
				>
					<SelectControl
						label={ __( 'Icon', 'wine-react-blocks' ) }
						value={ icon }
						options={ iconOptions }
						onChange={ ( value ) =>
							setAttributes( { icon: value } )
						}
						help={ __(
							'Choose an icon for this experience',
							'wine-react-blocks'
						) }
					/>
					<TextControl
						label={ __( 'Title', 'wine-react-blocks' ) }
						value={ title }
						onChange={ ( value ) =>
							setAttributes( { title: value } )
						}
						help={ __(
							'Enter the experience title',
							'wine-react-blocks'
						) }
					/>
					<TextareaControl
						label={ __( 'Description', 'wine-react-blocks' ) }
						value={ description }
						onChange={ ( value ) =>
							setAttributes( { description: value } )
						}
						help={ __(
							'Describe this experience',
							'wine-react-blocks'
						) }
						rows={ 4 }
					/>
				</PanelBody>
			</InspectorControls>

			<div className="experience-highlight">
				<div className="experience-highlight__icon">{ icon }</div>
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
