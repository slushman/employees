import PropTypes from 'prop-types';

const { __ } = wp.i18n;
const { Component } = wp.element;
const { InspectorControls } = wp.editor;
const {
	PanelBody,
	RangeControl,
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
			facebookUrl,
			iconSize,
			instagramUrl,
			linkedinUrl,
			showIcons,
			showLabels,
			twitterUrl,
			websiteUrl,
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
					<RangeControl
						label={ __( 'Icon Size' ) }
						value={ iconSize }
						onChange={ this.toggleAttribute( 'iconSize' ) }
						min={ 24 }
						max={ 60 }
						step={ 2 }
					/>
				</PanelBody>
				<PanelBody initialOpen={ true } title={ __( 'Link URLs' ) }>
					<TextControl
						label={ __( 'Facebook URL' ) }
						onChange={ this.toggleAttribute( 'facebookUrl' ) }
						value={ facebookUrl }
					/>
					<TextControl
						label={ __( 'Instagram URL' ) }
						onChange={ this.toggleAttribute( 'instagramUrl' ) }
						value={ instagramUrl }
					/>
					<TextControl
						label={ __( 'LinkedIn URL' ) }
						onChange={ this.toggleAttribute( 'linkedinUrl' ) }
						value={ linkedinUrl }
					/>
					<TextControl
						label={ __( 'Twitter URL' ) }
						onChange={ this.toggleAttribute( 'twitterUrl' ) }
						value={ twitterUrl }
					/>
					<TextControl
						label={ __( 'Website URL' ) }
						onChange={ this.toggleAttribute( 'websiteUrl' ) }
						value={ websiteUrl }
					/>
				</PanelBody>
			</InspectorControls>
		);
	}
}

Inspector.propTypes = {
	attributes: PropTypes.object.isRequired,
	setAttributes: PropTypes.func.isRequired,
};

export default Inspector;
