/**
 * BLOCK: employee-job-title
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';
import attributes from './attributes.js';

import Edit from './edit.js';
import Save from './save.js';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'employees/job-title', {
	title: __( 'Employee Job Title' ),
	icon: 'businessman',
	category: 'employees',
	keywords: [
		__( 'Employee Job Title' ),
		__( 'Employees' ),
	],
	attributes,
	edit: ( props ) => (
		<Edit { ...props } />
	),
	save: ( props ) => (
		<Save { ...props } />
	),
} );
