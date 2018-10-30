import PropTypes from 'prop-types';

const { __ } = wp.i18n;
const { Component } = wp.element;
const { InspectorControls } = wp.editor;
const {
	PanelBody,
	TextControl,
	ToggleControl,
} = wp.components;

class Inspector extends Component {
	/**
	 * Sets any toggle attribute.
	 *
	 * @param {string} attribute The attribute to toggle.
	 * @return {void}
	 */
	toggleAttribute = ( attribute ) => {
		return ( newValue ) => {
			this.props.setAttributes( { [ attribute ]: newValue } );
		};
	}
	render() {
		const {
			labelEmail,
			labelFaxNumber,
			labelPhoneCell,
			labelPhoneOffice,
			showIcons,
			showLabels,
		} = this.props.attributes;
		return (
			<InspectorControls>
				<PanelBody initialOpen={ true } title={ __( 'Contact Information Options' ) }>
					<ToggleControl
						label={ __( 'Show Icons' ) }
						checked={ !! showIcons }
						onChange={ this.toggleAttribute( 'showIcons' ) }
					/>
					<ToggleControl
						label={ __( 'Show Labels' ) }
						checked={ !! showLabels }
						onChange={ this.toggleAttribute( 'showLabels' ) }
					/>
				</PanelBody>
				<PanelBody initialOpen={ true } title={ __( 'Label Options' ) }>
					<TextControl
						label={ __( 'Office Phone Label' ) }
						onChange={ this.toggleAttribute( 'labelPhoneOffice' ) }
						value={ labelPhoneOffice }
					/>
					<TextControl
						label={ __( 'Cell Phone Label' ) }
						onChange={ this.toggleAttribute( 'labelPhoneCell' ) }
						value={ labelPhoneCell }
					/>
					<TextControl
						label={ __( 'Fax Number Label' ) }
						onChange={ this.toggleAttribute( 'labelFaxNumber' ) }
						value={ labelFaxNumber }
					/>
					<TextControl
						label={ __( 'Email Label' ) }
						onChange={ this.toggleAttribute( 'labelEmail' ) }
						value={ labelEmail }
					/>
				</PanelBody>
			</InspectorControls>
		);
	}
}

Inspector.propTypes = {
	setAttributes: PropTypes.func.isRequired,
};

export default Inspector;
