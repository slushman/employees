import PropTypes from 'prop-types';

const { __ } = wp.i18n;
const { RichText } = wp.editor;

const Edit = ( { attributes, className, setAttributes } ) => {
	const {
		city,
		heading,
		state,
		streetAddress1,
		streetAddress2,
		streetAddress3,
		zipcode,
	} = attributes;
	return (
		<address className={ className }>
			<RichText
				className="employee-location-heading"
				keepPlaceholderOnFocus={ true }
				onChange={ ( newHeading ) => setAttributes( { heading: newHeading } ) }
				placeholder={ __( 'Office Location' ) }
				tagName="h2"
				value={ heading }
			/>
			<RichText
				className="employee-address-1"
				keepPlaceholderOnFocus={ true }
				onChange={ ( newStreetAddress1 ) => setAttributes( { streetAddress1: newStreetAddress1 } ) }
				placeholder={ __( 'Street Address Line 1' ) }
				tagName="div"
				value={ streetAddress1 }
			/>
			<RichText
				className="employee-address-2"
				keepPlaceholderOnFocus={ true }
				onChange={ ( newStreetAddress2 ) => setAttributes( { streetAddress2: newStreetAddress2 } ) }
				placeholder={ __( 'Street Address Line 2' ) }
				tagName="div"
				value={ streetAddress2 }
			/>
			<RichText
				className="employee-address-3"
				keepPlaceholderOnFocus={ true }
				onChange={ ( newStreetAddress3 ) => setAttributes( { streetAddress3: newStreetAddress3 } ) }
				placeholder={ __( 'Street Address Line 3' ) }
				tagName="div"
				value={ streetAddress3 }
			/>
			<div className="employee-city-state-zip">
				<RichText
					className="employee-city"
					keepPlaceholderOnFocus={ true }
					onChange={ ( newCity ) => setAttributes( { city: newCity } ) }
					placeholder={ __( 'City' ) }
					tagName="div"
					value={ city }
				/>
				<span className="separator-city-state">,</span>
				<RichText
					className="employee-state"
					keepPlaceholderOnFocus={ true }
					onChange={ ( newState ) => setAttributes( { state: newState } ) }
					placeholder={ __( 'State' ) }
					tagName="div"
					value={ state }
				/>
				<span className="separator-state-zip"></span>
				<RichText
					className="employee-zipcode"
					keepPlaceholderOnFocus={ true }
					onChange={ ( newZipcode ) => setAttributes( { zipcode: newZipcode } ) }
					placeholder={ __( 'Zip Code' ) }
					tagName="div"
					value={ zipcode }
				/>
			</div>
		</address>
	);
};

Edit.propTypes = {
	attributes: PropTypes.object.isRequired,
	className: PropTypes.string.isRequired,
	setAttributes: PropTypes.func.isRequired,
};

export default Edit;
