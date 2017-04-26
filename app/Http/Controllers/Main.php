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
        $data['pageTitle'] = 'Add';
        
        $data['x'] = $x;
        $data['o'] = $y < 0 ? '-' : '+';
        $data['y'] = $y;

        return view('add', $data);
    }

    public function rolldice($guess = NULL)
    {
        $data['pageTitle'] = 'Roll';

        $data['roll'] = mt_rand(1, 6);
        $data['guess'] = $guess;

        return view('roll_dice', $data);
    }

    public function increment($number = 0)
    {
        $data['pageTitle'] = "$number | Increment";

        $data['number'] = $number;

        return view('increment', $data);
    }

    public function uppercase($word = 'uppercase')
    {
        $data['pageTitle'] = 'UPPERCASE';

        $data['word'] = $word;
        $data['newWord'] = strtoupper($word);

        return view('convert_case', $data);
    }

    public function lowercase($word = 'LOWERCASE')
    {
        $data['pageTitle'] = 'lowercase';
        
        $data['word'] = $word;
        $data['newWord'] = strtolower($word);

        return view('convert_case', $data);
    }
}