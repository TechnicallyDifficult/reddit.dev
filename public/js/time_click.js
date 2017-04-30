$(document).ready(function() {
	function swapTime()
	{
		$(this)
			.children('time')
			.children('span')
			.toggleClass('hidden');
	}

	$('a, .time').each(function(index, el) {
		el.click(swapTime);
	});
});