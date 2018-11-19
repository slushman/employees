export default {
	facebookUrl: {
		type: 'string',
		default: '',
	},
	heading: {
		type: 'string',
		source: 'html',
		selector: '.connect-heading',
		default: 'Connect',
	},
	iconSize: {
		type: 'number',
		default: 48,
	},
	instagramUrl: {
		type: 'string',
		default: '',
	},
	linkedinUrl: {
		type: 'string',
		default: '',
	},
	showIcons: {
		type: 'boolean',
		default: true,
	},
	showLabels: {
		type: 'boolean',
		default: false,
	},
	twitterUrl: {
		type: 'string',
		default: '',
	},
	websiteUrl: {
		type: 'string',
		default: '',
	},
};
