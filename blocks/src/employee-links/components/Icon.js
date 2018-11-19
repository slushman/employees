import PropTypes from 'prop-types';
import classNames from 'classnames';

const { __ } = wp.i18n;

const iconSizeToClass = ( iconSize ) => {
	return ( 10 >= iconSize || 110 <= iconSize ) ? null : 'icon-size-' + ( 10 * Math.round( iconSize / 10 ) );
};

const Icon = ( { icon, iconSize, iconUrl, showIcons, showLabels } ) => {
	const listClasses = classNames(
		'employee-link-item',
	);
	const linkClasses = classNames(
		'employee-link',
		iconSizeToClass( iconSize ),
	);
	const iconClasses = classNames();
	const textClasses = classNames( {
		'screen-reader-text': ! showLabels,
	} );

	let iconPath;
	let label;
	switch ( icon ) {
		case 'facebook':
			iconPath = 'M8.46 18h2.93v-7.3h2.45l.37-2.84h-2.82V6.04q0-.69.295-1.035T12.8 4.66h1.51V2.11Q13.36 2 12.12 2q-1.67 0-2.665.985T8.46 5.76v2.1H6v2.84h2.46V18z';
			label = __( 'Facebook' );
			break;
		case 'instagram':
			iconPath = 'M17.3 16.6v-8h-1.7c.2.5.2 1.1.2 1.6 0 1-.3 2-.8 2.9-.5.9-1.2 1.6-2.2 2.1-.9.5-1.9.8-3 .8-1.6 0-3-.6-4.2-1.7s-1.7-2.5-1.7-4.1c0-.6.1-1.1.2-1.6H2.6v8c0 .2.1.4.2.5.1.1.3.2.5.2h13.2c.2 0 .4-.1.5-.2s.3-.3.3-.5zM13.8 10c0-1-.4-1.9-1.1-2.6S11.1 6.3 10 6.3c-1 0-1.9.4-2.7 1.1S6.2 8.9 6.2 10s.4 1.9 1.1 2.6S9 13.7 10 13.7c1.1 0 2-.4 2.7-1.1s1.1-1.6 1.1-2.6zm3.5-4.5v-2c0-.2-.1-.4-.2-.6-.2-.2-.4-.3-.6-.3h-2.2c-.2 0-.4.1-.6.3-.2.2-.2.4-.2.6v2c0 .2.1.4.2.6.2.2.4.2.6.2h2.2c.2 0 .4-.1.6-.2.2-.1.2-.4.2-.6zm2.2-2.6V17c0 .7-.2 1.2-.7 1.7s-1.1.7-1.7.7H2.9c-.7 0-1.2-.2-1.7-.7S.5 17.6.5 17V2.9c0-.7.2-1.2.7-1.7S2.3.5 2.9.5H17c.7 0 1.2.2 1.7.7s.8 1.1.8 1.7z';
			label = __( 'Instagram' );
			break;
		case 'linkedin':
			iconPath = 'M4.8 6.8v12.3H.7V6.8h4.1zM5.1 3c0 .6-.2 1.1-.6 1.5s-1 .6-1.7.6-1.2-.2-1.6-.6S.5 3.6.5 3s.2-1.1.6-1.5 1-.6 1.7-.6 1.2.2 1.6.6c.5.4.7.9.7 1.5zm14.4 9.1v7h-4.1v-6.6c0-.9-.2-1.5-.5-2s-.9-.7-1.6-.7c-.5 0-1 .1-1.3.4-.4.3-.6.6-.8 1.1-.1.2-.1.6-.1 1v6.8h-4v-8-4.3h4.1v1.8c.2-.3.3-.5.5-.7.2-.2.4-.4.7-.6.2-.3.6-.4 1-.6s.9-.2 1.4-.2c1.4 0 2.5.5 3.4 1.4s1.3 2.3 1.3 4.2z';
			label = __( 'LinkedIn' );
			break;
		case 'twitter':
			iconPath = 'M18.94 4.46c-.49.73-1.11 1.38-1.83 1.9.01.15.01.31.01.47 0 4.85-3.69 10.44-10.43 10.44-2.07 0-4-.61-5.63-1.65.29.03.58.05.88.05 1.72 0 3.3-.59 4.55-1.57a3.671 3.671 0 0 1-3.42-2.55c.22.04.45.07.69.07.33 0 .66-.05.96-.13a3.68 3.68 0 0 1-2.94-3.6v-.04c.5.27 1.06.44 1.66.46a3.68 3.68 0 0 1-1.63-3.06c0-.67.18-1.3.5-1.84 1.81 2.22 4.51 3.68 7.56 3.83-.06-.27-.1-.55-.1-.84a3.67 3.67 0 0 1 3.67-3.66c1.06 0 2.01.44 2.68 1.16.83-.17 1.62-.47 2.33-.89-.28.85-.86 1.57-1.62 2.02a7.08 7.08 0 0 0 2.11-.57z';
			label = __( 'Twitter' );
			break;
		case 'website':
			iconPath = 'M19 10a9 9 0 1 0-18.001.001A9 9 0 0 0 19 10zm-11 .1c-2.84-.29-4.48-1.17-5.48-2.29.97-3.16 3.8-5.48 7.25-5.63-.84 1.38-1.5 4.13-.03 5.57-1.51.21-2.21-1.86-3.11-1.15-1.43 1.12-.08 2.67 3.2 3.27 3.29.59 3.66 1.58 3.63 3.08-.03 1.47-.8 3.3-4.06 4.7.09-4.18-2.64-3.84-3.2-5.04.2-.87.44-1.78 1.8-2.51zm8.49-4.32c2.15 3.3 1.02 6.08.84 6.68-.77-1.86-2.17-2.29-2.53-3.54-.32-1.11.62-2.23 1.69-3.14z';
			label = __( 'Website' );
			break;
	}

	return (
		<li className={ listClasses }>
			<a className={ linkClasses } href={ iconUrl }>
				{
					showIcons &&
						<svg xmlns="http://www.w3.org/2000/svg" width={ iconSize } height={ iconSize } viewBox="0 0 20 20" className={ iconClasses }>
							<path d={ iconPath } />
						</svg>
				}
				<span className={ textClasses }>{ label }</span>
			</a>
		</li>
	);
};

Icon.propTypes = {
	icon: PropTypes.string.isRequired,
	iconSize: PropTypes.number.isRequired,
	iconUrl: PropTypes.string.isRequired,
	showIcons: PropTypes.bool.isRequired,
	showLabels: PropTypes.bool.isRequired,
};

export default Icon;
