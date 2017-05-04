<?php

namespace App\Helpers;

class Placeholder
{
	private static $usernames = [
		[
			'Fatal error: Placeholder not silly enough',
			'I am Groot',
			'Lorem ipsum dolor sit amet...',
			'Miserable little pile of secrets',
			'Notice: Undefined variable: pancakes',
			'Robert\'); DROP TABLE users;',
			'THIS IS NOT A JOKE! YOU ARE OUR 1000TH VISITOR!',
			'You shouldn\'t have done that.',
			'Algae AND YES I KNOW THE SINGULAR IS ALGA'
		],
		[
			'ユーザー名',
			'[deleted]',
			'\'\'',
			'1',
			'Meme',
			'NULL',
			'Random',
			'Wumbo'
		],
		[
			'Anonymous',
			'Boop',
			'Bot',
			'Concept',
			'Cow',
			'Dragon',
			'Explosion',
			'File',
			'Floof',
			'Fungus',
			'Function',
			'Fuzz',
			'Herpaderp',
			'Hemoglobin',
			'Human',
			'Imposter',
			'Insect',
			'Me',
			'Mew',
			'NPC',
			'Object',
			'Pie',
			'Placeholder',
			'Potato',
			'Protozoa',
			'Robot',
			'String',
			'Tanuki',
			'Train',
			'Typo',
			'Woof',
			'You'
		],
		[
			'Anon',
			'Bacterium',
			'Name',
			'Person',
			'Username',
			'Algae',
			'Girl',
			'Guy'
		]
	];

	public static function username()
	{
		return 'someRandom' . Random::arrayVal(Probability::array_rising(self::$usernames));
	}
}