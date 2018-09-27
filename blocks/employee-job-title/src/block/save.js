import PropTypes from 'prop-types';

const Save = ( { jobTitle } ) => {
	return (
		<div className="employee-job-title">
			{
				jobTitle
			}
		</div>
	);
};

Save.propTypes = {
	jobTitle: PropTypes.string.isRequired,
};

export default Save;
