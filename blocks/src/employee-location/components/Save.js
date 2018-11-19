import PropTypes from 'prop-types';

const { RichText } = wp.editor;

const Save = ( { attributes, className } ) => {
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
			{ ( ! RichText.isEmpty( streetAddress1 ) ||
				! RichText.isEmpty( streetAddress2 ) ||
				! RichText.isEmpty( streetAddress3 ) ||
				! RichText.isEmpty( city ) ||
				! RichText.isEmpty( state ) ||
				! RichText.isEmpty( zipcode )
			) && <RichText.Content
				className="employee-location-heading"
				tagName="h2"
				value={ heading }
			/>
			}
			<RichText.Content
				className="employee-address-1"
				tagName="div"
				value={ streetAddress1 }
			/>
			<RichText.Content
				className="employee-address-2"
				tagName="div"
				value={ streetAddress2 }
			/>
			<RichText.Content
				className="employee-address-3"
				tagName="div"
				value={ streetAddress3 }
			/>
			<div className="employee-city-state-zip">
				<RichText.Content
					className="employee-city"
					tagName="div"
					value={ city }
				/>
				<span className="separator-city-state">,</span>
				<RichText.Content
					className="employee-state"
					tagName="div"
					value={ state }
				/>
				<span className="separator-state-zip"></span>
				<RichText.Content
					className="employee-zipcode"
					tagName="div"
					value={ zipcode }
				/>
			</div>
		</address>
	);
};

Save.propTypes = {
	attributes: PropTypes.object.isRequired,
	className: PropTypes.string.isRequired,
};

export default Save;
