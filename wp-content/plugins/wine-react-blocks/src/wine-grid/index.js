/**
 * Wine Grid Block
 *
 * Displays a filterable grid of wine posts from the Wine CPT
 *
 * @package Wine_React_Blocks
 */

import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import './editor.scss';
import Edit from './edit';
import metadata from './block.json';

/**
 * Register the Wine Grid block
 *
 * This is a dynamic block that renders on the server side
 * using render.php for actual frontend output
 */
registerBlockType( metadata.name, {
	edit: Edit,
	// No save function - this is a dynamic block rendered server-side
	save: () => null,
} );
