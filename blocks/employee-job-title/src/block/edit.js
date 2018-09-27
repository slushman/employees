const { __ } = wp.i18n;
const { TextControl } = wp.components;
const { Component } = wp.element;

class Edit extends Component {
	render() {
		const { setAttributes } = this.props;
		const { jobTitle } = this.props.attributes;
		return (
			<div className="employee-job-title-edit-wrap">
				<TextControl
					className="field-job-title"
					label={ __( 'Job Title' ) }
					onChange={ ( newJobTitle ) => setAttributes( { jobTitle: newJobTitle } ) }
					value={ jobTitle }
				/>
			</div>
		);
	}
}

export default Edit;
