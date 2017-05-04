$(document).ready(function () {
	elements = $('textarea.autosize');

	autosize(elements);

	elements.on('input', function() {
		autosize.update(this);
	});
});