/**
 * BLOCK: employee-job-title
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;

registerBlockType( 'employees/job-title', {
	title: __( 'Employee Job Title' ),
	icon: 'businessman',
	category: 'employees',
	keywords: [
		__( 'Employee Job Title' ),
		__( 'Employees' ),
	],
	attributes: {
		jobTitle: {
			type: 'array',
			source: 'children',
			selector: 'div',
		},
	},
	edit: ( { className, attributes, setAttributes } ) => {
		const { jobTitle } = attributes;
		const onChangeContent = ( newJobTitle ) => {
			setAttributes( { jobTitle: newJobTitle } );
		};
		return (
			<RichText
				className={ className }
				keepPlaceholderOnFocus={ true }
				onChange={ onChangeContent }
				placeholder={ __( 'Job Title' ) }
				tagName="div"
				value={ jobTitle }
			/>
		);
	},
	save: ( { attributes } ) => {
		const { jobTitle } = attributes;
		return (
			<RichText.Content
				className="employee-job-title"
				tagName="div"
				value={ jobTitle }
			/>
		);
	},
} );
