const Save = props => {
	const { jobTitle } = props.attributes;
	return (
		<div className={ props.className }>{ jobTitle }</div>
	);
};

export default Save;
