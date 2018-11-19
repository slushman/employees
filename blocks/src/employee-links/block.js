/**
 * BLOCK: employee-links
 */

import './style.scss';
import './editor.scss';

import attributes from './attributes.js';
import Edit from './components/Edit';
import Save from './components/Save';
import Inspector from './components/Inspector';

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
	'employees/employee-links', {
		title: __( 'Employee Links' ),
		icon: 'share',
		category: 'employees',
		keywords: [
			__( 'Employees Facebook Instagram' ),
			__( 'LinkedIn Twitter Website' ),
			__( 'social media links' ),
		],
		attributes,
		edit: ( props ) => (
			<Fragment>
				<Inspector
					attributes={ props.attributes }
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
