import PropTypes from 'prop-types';
import classNames from 'classnames';

import Icon from './Icon';

const { RichText } = wp.editor;

const Save = ( { attributes, className } ) => {
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
		<div className={ className }>
			{
				( facebookUrl ||
					instagramUrl ||
					linkedinUrl ||
					twitterUrl ||
					websiteUrl
				) && <RichText.Content
					className="connect-heading"
					tagName="h2"
					value={ heading }
				/>
			}
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

Save.propTypes = {
	attributes: PropTypes.object.isRequired,
	className: PropTypes.string.isRequired,
};

export default Save;
