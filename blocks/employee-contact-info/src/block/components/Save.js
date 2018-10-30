import PropTypes from 'prop-types';
import classNames from 'classnames';

const { RichText } = wp.editor;
const { Dashicon } = wp.components;

const cleanPhoneNumber = ( number ) => {
	return number.replace( /\D/g, '' );
};

const Save = ( { attributes, className } ) => {
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
			{ ( ! RichText.isEmpty( phoneOffice ) ||
				! RichText.isEmpty( phoneCell ) ||
				! RichText.isEmpty( faxNumber ) ||
				! RichText.isEmpty( email )
			) && <RichText.Content
				className="contact-info-heading"
				tagName="h2"
				value={ heading }
			/>
			}
			<ul className={ listClasses }>
				{ ! RichText.isEmpty( phoneOffice ) && (
					<li className="employee-field-list-item">
						<a
							className="employee-field-wrap"
							href={ `tel:${ cleanPhoneNumber( phoneOffice ) }` }
							title={ labelPhoneOffice }
						>
							{
								showIcons && <Dashicon icon="phone" />
							}
							{
								showLabels && <span className="employee-field-label">{ labelPhoneOffice + ': ' }</span>
							}
							<span className="screen-reader-text">{ labelPhoneOffice }</span>
							<RichText.Content
								className="employee-data employee-phone-office"
								tagName="span"
								value={ phoneOffice }
							/>
						</a>
					</li>
				) }
				{ ! RichText.isEmpty( phoneCell ) && (
					<li className="employee-field-list-item">
						<a
							className="employee-field-wrap"
							href={ `tel:${ cleanPhoneNumber( phoneCell ) }` }
							title={ labelPhoneCell }
						>
							{
								showIcons && <Dashicon icon="smartphone" />
							}
							{
								showLabels && <span className="employee-field-label">{ labelPhoneCell + ': ' }</span>
							}
							<span className="screen-reader-text">{ labelPhoneCell }</span>
							<RichText.Content
								className="employee-data employee-phone-cell"
								tagName="div"
								value={ phoneCell }
							/>
						</a>
					</li>
				) }
				{ ! RichText.isEmpty( faxNumber ) && (
					<li className="employee-field-list-item">
						<div className="employee-field-wrap">
							{
								showIcons &&
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
										<path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z" />
										<path d="M0 0h24v24H0z" fill="none" />
									</svg>
							}
							{
								showLabels && <span className="employee-field-label">{ labelFaxNumber + ': ' }</span>
							}
							<span className="screen-reader-text">{ labelFaxNumber }</span>
							<RichText.Content
								className="employee-data employee-fax-number"
								tagName="div"
								value={ faxNumber }
							/>
						</div>
					</li>
				) }
				{ ! RichText.isEmpty( email ) && (
					<li className="employee-field-list-item">
						<a
							className="employee-field-wrap"
							href={ `mailto:${ email }` }
							title={ labelEmail }
						>
							{
								showIcons && <Dashicon icon="email-alt" />
							}
							{
								showLabels && <span className="employee-field-label">{ labelEmail + ': ' }</span>
							}
							<span className="screen-reader-text">{ labelEmail }</span>
							<RichText.Content
								className="employee-data employee-email"
								tagName="div"
								value={ email }
							/>
						</a>
					</li>
				) }
			</ul>
		</div>
	);
};

Save.propTypes = {
	attributes: PropTypes.object.isRequired,
	className: PropTypes.string.isRequired,
};

export default Save;
