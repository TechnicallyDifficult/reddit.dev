<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BaseController extends Controller
{
	/**
	 * grab all non-global vars in current scope
	 *
	 * must be passed the get_defined_vars() function in order to work as intended
	 *
	 * @return an associative array of all locally-defined vars, with the keys corresponding to the variables' names
	 */
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
}
