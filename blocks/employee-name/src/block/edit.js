const { __ } = wp.i18n;
const { TextControl } = wp.components;

const Edit = props => {
	const { setAttributes } = props;
	const { prefix, nameFirst, nameLast, suffix } = props.attributes;
	return (
		<div className="employee-name-edit-wrap">
			<TextControl
				className="field-prefix"
				label={ __( 'Prefix' ) }
				onChange={ ( newPrefix ) => setAttributes( { prefix: newPrefix } ) }
				value={ prefix }
			/>
			<TextControl
				className="field-name-first"
				label={ __( 'First Name' ) }
				onChange={ ( newNameFirst ) => setAttributes( { nameFirst: newNameFirst } ) }
				value={ nameFirst }
			/>
			<TextControl
				className="field-name-last"
				label={ __( 'Last Name' ) }
				onChange={ ( newNameLast ) => setAttributes( { nameLast: newNameLast } ) }
				value={ nameLast }
			/>
			<TextControl
				className="field-suffix"
				label={ __( 'Suffix' ) }
				onChange={ ( newSuffix ) => setAttributes( { suffix: newSuffix } ) }
				value={ suffix }
			/>
		</div>
	);
};

export default Edit;
