<!DOCTYPE html>
<html>
<head>
	<title>Roll Dice</title>
</head>
<body>
	<p><?= $roll; ?></p>
	<?php if (isset($guess)) : ?>
		<p><?= $guess; ?></p>
		<p>
			<?php if ($guess == $roll) : ?>
				Looks like a match.
			<?php else : ?>
				Nope. Wrong. Luck is depressing, isn't it?
			<?php endif; ?>
		</p>
	<?php endif ?>
</body>
</html>