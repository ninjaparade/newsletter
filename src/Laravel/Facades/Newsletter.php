<?php namespace Ninjaparade\Newsletter\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class Newsletter extends Facade {

	/**
	 * {@inheritDoc}
	 */
	protected static function getFacadeAccessor()
	{
		return 'np_newsletter';
	}

}
