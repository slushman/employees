const Save = ( props ) => {
	const { jobTitle } = props.attributes;
	return (
		<div className="employee-job-title">{ jobTitle }</div>
	);
};

export default Save;
