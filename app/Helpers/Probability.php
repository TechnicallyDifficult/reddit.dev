<?php

namespace App\Helpers;

class Probability
{
	/**
	 *
	 * picks a random value from a numeric-indexed array
	 *
	 * the order of items determines the probability of the item being chosen
	 *
	 * values closer to the end are more likely than those closer to the beginning
	 *
	 * for example, in a numerically-indexed array with 5 items...
	 * 	[0]: 1/15 chance
	 * 	[1]: 2/15 chance
	 * 	[2]: 3/15 (1/5) chance
	 * 	[3]: 4/15 chance
	 * 	[5]: 5/15 (1/3) chance
	 *
	 * @param the array to get an item from
	 *
	 * @return an item from the array, chosen at weighted random
	 *
	 */
	public static function array_rising($array)
	{
		$array = array_values($array);

		$items = sizeof($array);

		$max = 0;

		for ($i = $items; $i > 0; $i--) { 
			$max += $i;
		}

		$random = mt_rand(1, $max);

		for ($i = $items; $i > 0; $i--) {
			if ($random > $max -= $i) {
				return $array[$i - 1];
			}
		}
	}
}