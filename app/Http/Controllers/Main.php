<?php

namespace App\Http\Controllers;

class Main extends Controller {
    // if you want to get all local variables within the current scope, you **MUST** pass this function the get_defined_vars() function
    protected function getLocalVars($vars)
    {
        $ignore = ['GLOBALS', '_SERVER', '_GET', '_POST', '_FILES', '_REQUEST', '_SESSION', '_ENV', '_COOKIE', 'php_errormsg', 'HTTP_RAW_POST_DATA', 'http_response_header', 'argc', 'argv'];

        foreach ($ignore as $name) {
            if (isset($vars[$name])) {
                unset($vars[$name]);
            }
        }

        return $vars;
    }

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
        $pageTitle = 'Add';

        $o = $y < 0 ? '-' : '+';

        return view('add', $this->getLocalVars(get_defined_vars()));
    }

    public function rolldice($guess = NULL)
    {
        $pageTitle = 'Roll';

        $roll = mt_rand(1, 6);

        return view('roll_dice', $this->getLocalVars(get_defined_vars()));
    }

    public function increment($number = 0)
    {
        $pageTitle = "$number | Increment";

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