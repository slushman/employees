/**
 * BLOCK: employee-location
 */

import './style.scss';
import './editor.scss';

import attributes from './attributes.js';
import Edit from './components/Edit';
import Save from './components/Save';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { Fragment } = wp.element;

/**
 * Register a Gutenberg Block.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'employees/employee-location', {
	title: __( 'Employee Location' ),
	icon: 'location',
	category: 'employees',
	attributes,
	keywords: [
		__( 'Employee Location suite' ),
		__( 'employees office building' ),
		__( 'city state zip' ),
	],
	edit: ( props ) => (
		<Fragment>
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
} );
