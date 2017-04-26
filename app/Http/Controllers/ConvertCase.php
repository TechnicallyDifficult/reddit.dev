<?php

namespace App\Http\Controllers;

class ConvertCase extends Controller {
	public function uppercase($word = 'uppercase')
	{
		return $this->convertcase($word, true);
	}

	public function lowercase($word = 'LOWERCASE')
	{
		return $this->convertcase($word, false);
	}

	private function convertcase($word, $upper)
	{
		$data['word'] = $word;
		$data['newWord'] = $upper ? strtoupper($word) : strtolower($word);
		return view('convert_case', $data);
	}
}