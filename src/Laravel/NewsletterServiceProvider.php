<?php namespace Ninjaparade\Newsletter\Laravel;

use Illuminate\Support\ServiceProvider;

class NewsletterServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ninjaparade/newsletter');
		$this->package('ninjaparade/newsletter', 'ninjaparade/newsletter', __DIR__.'/..');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['np_newsletter'] = $this->app->share(function($app)
		{
			$config = $app['config']->get('ninjaparade/newsletter::config');

		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
