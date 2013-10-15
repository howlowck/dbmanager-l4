<?php namespace Howlowck\DbmanagerL4;

use Illuminate\Support\ServiceProvider;

class DbmanagerL4ServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['db.count'] = $this->app->share(function () {
			return new Commands\DbManagerCount();
		});

		$this->commands(
			'db.count'
		);
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