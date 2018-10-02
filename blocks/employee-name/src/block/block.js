/**
 * BLOCK: employee-name
 */

import './style.scss';
import './editor.scss';

import Edit from './edit';
import Save from './save';
import attributes from './attributes';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks

/**
 * Register a Gutenberg Block.
 *
 * @link 		https://wordpress.org/gutenberg/handbook/block-api/
 * @param 		{string} 		name 			Block name.
 * @param 		{Object} 		settings 		Block settings.
 * @return 		{?WPBlock} 						The block, if it has been successfully
 * 													registered; otherwise `undefined`.
 */
registerBlockType( 'employees/employee-name-block', {
	title: __( 'Employee Name' ),
	icon: 'admin-users',
	category: 'employees',
	keywords: [
		__( 'Employee Name' ),
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
