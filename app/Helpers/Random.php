<?php

namespace App\Helpers;

class Random
{
	public static function arrayVal($array)
	{
		return $array[array_rand($array)];
	}

	public static function strChar($str)
	{
		return $str[mt_rand(0, strlen($str) - 1)];
	}

	public static function strWord($str)
	{
		return self::arrayVal(explode(' ', $str));
	}
}