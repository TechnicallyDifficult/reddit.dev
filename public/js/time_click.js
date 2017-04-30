$(document).ready(function() {
	function swapTime()
	{
		var $this = $(this);

		if ($this.text() === $this.attr('data-datetime-relative')) {
			$this.text($this.attr('data-datetime'));
		} else if ($this.text() === $this.attr('data-datetime')) {
			$this.text($this.attr('data-datetime-relative'));
		} else {
			$this.text('You screwed something up, didn\'t you?');
		}
	}

	$('a, .time').each(function(index, el) {
		el.click(swapTime);
	});
});