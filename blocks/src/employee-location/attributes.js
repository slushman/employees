export default {
	city: {
		type: 'string',
		source: 'html',
		selector: '.employee-city',
	},
	heading: {
		type: 'string',
		source: 'html',
		selector: '.employee-location-heading',
		default: 'Office Location',
	},
	state: {
		type: 'string',
		source: 'html',
		selector: '.employee-state',
	},
	streetAddress1: {
		type: 'string',
		source: 'html',
		selector: '.employee-address-1',
	},
	streetAddress2: {
		type: 'string',
		source: 'html',
		selector: '.employee-address-2',
	},
	streetAddress3: {
		type: 'string',
		source: 'html',
		selector: '.employee-address-3',
	},
	zipcode: {
		type: 'string',
		source: 'html',
		selector: '.employee-zipcode',
	},
};
