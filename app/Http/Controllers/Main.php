<?php

namespace App\Http\Controllers;

class Main extends Controller {
	public function root()
	{
		return view('welcome');
	}

	public function helloworld()
	{
		return 'hello world';
	}

	public function add($x = 0, $y = 0)
	{
		$data['x'] = $x;
		$data['o'] = $y < 0 ? '-' : '+';
		$data['y'] = $y;

		return view('add', $data);
	}

	public function rolldice($guess = NULL) {
		$data['roll'] = mt_rand(1, 6);

		$data['guess'] = $guess;

		return view('roll_dice', $data);
	}
}