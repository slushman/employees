/**
 * BLOCK: employee-contact-info
 */

import './style.scss';
import './editor.scss';

import attributes from './attributes.js';
import Edit from './components/Edit';
import Save from './components/Save';
import Inspector from './components/Inspector';
import Controls from './components/Controls';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { Fragment } = wp.element;

/**
 * Register a Gutenberg Block.
 *
 * @link 		https://wordpress.org/gutenberg/handbook/block-api/
 * @param 		{string} 		name 			Block name.
 * @param 		{Object} 		settings 		Block settings.
 * @return 		{?WPBlock} 						The block, if it has been successfully
 * 													registered; otherwise `undefined`.
 */
registerBlockType(
	'employees/employee-contact-info-block', {
		title: __( 'Employee Contact Info' ),
		icon: 'phone',
		category: 'employees',
		keywords: [
			__( 'Employee Contact Info' ),
			__( 'Phone Fax Email' ),
			__( 'Office Employees' ),
		],
		attributes,
		edit: ( props ) => (
			<Fragment>
				<Inspector
					attributes={ props.attributes }
					setAttributes={ props.setAttributes }
				/>
				<Controls
					listLayout={ props.attributes.listLayout }
					setAttributes={ props.setAttributes }
				/>
				<Edit
					attributes={ props.attributes }
					className={ props.className }
					setAttributes={ props.setAttributes }
				/>
			</Fragment>
		),
		save: ( props ) => (
			<Save
				attributes={ props.attributes }
				className={ props.className }
			/>
		),
	}
);
