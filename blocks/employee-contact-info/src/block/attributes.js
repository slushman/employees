export default {
	email: {
		type: 'string',
		source: 'html',
		selector: '.employee-email',
	},
	faxNumber: {
		type: 'string',
		source: 'html',
		selector: '.employee-fax-number',
	},
	heading: {
		type: 'string',
		source: 'html',
		selector: '.contact-info-heading',
		default: 'Contact Information',
	},
	labelEmail: {
		type: 'string',
		default: 'Email',
	},
	labelFaxNumber: {
		type: 'string',
		default: 'Fax Number',
	},
	labelPhoneCell: {
		type: 'string',
		default: 'Cell Phone',
	},
	labelPhoneOffice: {
		type: 'string',
		default: 'Office Phone',
	},
	listLayout: {
		type: 'string',
		default: 'list',
	},
	phoneCell: {
		type: 'string',
		source: 'html',
		selector: '.employee-phone-cell',
	},
	phoneOffice: {
		type: 'string',
		source: 'html',
		selector: '.employee-phone-office',
	},
	showIcons: {
		type: 'boolean',
		default: true,
	},
	showLabels: {
		type: 'boolean',
		default: false,
	},
};
