import PropTypes from 'prop-types';
import classNames from 'classnames';

const { __ } = wp.i18n;
const { RichText } = wp.editor;
const { Dashicon } = wp.components;

const Edit = ( { attributes, className, setAttributes } ) => {
	const {
		email,
		faxNumber,
		heading,
		labelEmail,
		labelFaxNumber,
		labelPhoneCell,
		labelPhoneOffice,
		listLayout,
		phoneCell,
		phoneOffice,
		showIcons,
		showLabels,
	} = attributes;
	const listClasses = classNames(
		'contact-info-list',
		{ 'is-grid': 'grid' === listLayout }
	);
	return (
		<div className={ className }>
			<RichText
				className="contact-info-heading"
				keepPlaceholderOnFocus={ true }
				onChange={ ( newHeading ) => setAttributes( { heading: newHeading } ) }
				placeholder={ __( 'Contact Information' ) }
				tagName="h2"
				value={ heading }
			/>
			<ul className={ listClasses }>
				<li className="employee-field-list-item">
					<div className="employee-field-wrap">
						{
							showIcons && <Dashicon icon="phone" />
						}
						{
							showLabels && <span className="employee-field-label">{ labelPhoneOffice + ': ' }</span>
						}
						<RichText
							className="employee-data employee-phone-office"
							keepPlaceholderOnFocus={ true }
							onChange={ ( newPhoneOffice ) => setAttributes( { phoneOffice: newPhoneOffice } ) }
							placeholder={ __( 'Office Phone' ) }
							tagName="span"
							value={ phoneOffice }
						/>
					</div>
				</li>
				<li className="employee-field-list-item">
					<div className="employee-field-wrap">
						{
							showIcons && <Dashicon icon="smartphone" />
						}
						{
							showLabels && <span className="employee-field-label">{ labelPhoneCell + ': ' }</span>
						}
						<RichText
							className="employee-data employee-phone-cell"
							keepPlaceholderOnFocus={ true }
							onChange={ ( newPhoneCell ) => setAttributes( { phoneCell: newPhoneCell } ) }
							placeholder={ __( 'Cell Phone' ) }
							tagName="div"
							value={ phoneCell }
						/>
					</div>
				</li>
				<li className="employee-field-list-item">
					<div className="employee-field-wrap">
						{
							showIcons && <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z" /><path d="M0 0h24v24H0z" fill="none" /></svg>

						}
						{
							showLabels && <span className="employee-field-label">{ labelFaxNumber + ': ' }</span>
						}
						<RichText
							className="employee-data employee-fax-number"
							keepPlaceholderOnFocus={ true }
							onChange={ ( newFaxNumber ) => setAttributes( { faxNumber: newFaxNumber } ) }
							placeholder={ __( 'Fax Number' ) }
							tagName="div"
							value={ faxNumber }
						/>
					</div>
				</li>
				<li className="employee-field-list-item">
					<div className="employee-field-wrap">
						{
							showIcons && <Dashicon icon="email-alt" />
						}
						{
							showLabels && <span className="employee-field-label">{ labelEmail + ': ' }</span>
						}
						<RichText
							className="employee-data employee-email"
							keepPlaceholderOnFocus={ true }
							onChange={ ( newEmail ) => setAttributes( { email: newEmail } ) }
							placeholder={ __( 'Email Address' ) }
							tagName="div"
							value={ email }
						/>
					</div>
				</li>
			</ul>
		</div>
	);
};

Edit.propTypes = {
	attributes: PropTypes.object.isRequired,
	className: PropTypes.string.isRequired,
	setAttributes: PropTypes.func.isRequired,
};

export default Edit;
