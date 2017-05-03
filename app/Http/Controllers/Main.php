<?php

namespace App\Http\Controllers;

class Main extends BaseController {
	
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
		$o = $y < 0 ? '-' : '+';

		return view('add', $this->getLocalVars(get_defined_vars()));
	}

	public function rolldice($guess = NULL)
	{
		$roll = mt_rand(1, 6);

		return view('roll_dice', $this->getLocalVars(get_defined_vars()));
	}

	public function increment($number = 0)
	{
		return view('increment', $this->getLocalVars(get_defined_vars()));
	}

	public function uppercase($word = 'uppercase')
	{
		$pageTitle = 'UPPERCASE';

		$newWord = strtoupper($word);

		return view('convert_case', $this->getLocalVars(get_defined_vars()));
	}

	public function lowercase($word = 'LOWERCASE')
	{
		$pageTitle = 'lowercase';
		
		$newWord = strtolower($word);

		return view('convert_case', $this->getLocalVars(get_defined_vars()));
	}
}