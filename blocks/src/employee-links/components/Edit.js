import PropTypes from 'prop-types';
import classNames from 'classnames';

import Icon from './Icon';

const { RichText } = wp.editor;
const { __ } = wp.i18n;

const Edit = ( { attributes, className, setAttributes } ) => {
	const {
		facebookUrl,
		heading,
		iconSize,
		instagramUrl,
		linkedinUrl,
		showIcons,
		showLabels,
		twitterUrl,
		websiteUrl,
	} = attributes;
	const listClasses = classNames(
		className,
		'employee-links',
	);
	return (
		<div className="">
			<RichText
				className="connect-heading"
				keepPlaceholderOnFocus={ true }
				onChange={ ( newValue ) => setAttributes( { heading: newValue } ) }
				placeholder={ __( 'Connect' ) }
				tagName="h2"
				value={ heading }
			/>
			<ul className={ listClasses }>
				{
					facebookUrl &&
						<Icon
							icon="facebook"
							iconSize={ iconSize }
							iconUrl={ facebookUrl }
							showIcons={ showIcons }
							showLabels={ showLabels }
						/>
				}
				{
					instagramUrl &&
						<Icon
							icon="instagram"
							iconSize={ iconSize }
							iconUrl={ instagramUrl }
							showIcons={ showIcons }
							showLabels={ showLabels }
						/>
				}
				{
					linkedinUrl &&
						<Icon
							icon="linkedin"
							iconSize={ iconSize }
							iconUrl={ linkedinUrl }
							showIcons={ showIcons }
							showLabels={ showLabels }
						/>
				}
				{
					twitterUrl &&
						<Icon
							icon="twitter"
							iconSize={ iconSize }
							iconUrl={ twitterUrl }
							showIcons={ showIcons }
							showLabels={ showLabels }
						/>
				}
				{
					websiteUrl &&
						<Icon
							icon="website"
							iconSize={ iconSize }
							iconUrl={ websiteUrl }
							showIcons={ showIcons }
							showLabels={ showLabels }
						/>
				}
			</ul>
		</div>
	);
};

Edit.propTypes = {
	attributes: PropTypes.object.isRequired,
	className: PropTypes.string.isRequired,
};

export default Edit;
