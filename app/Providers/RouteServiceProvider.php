<?php namespace App\Providers;

use App\Models\Article;
use App\Models\Section;
use App\Models\Style;
use App\User;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Models\Page;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        $router->bind('pages', function($slug)
        {
            return Page::where('slug', $slug)->firstOrFail();
        });

        $router->bind('sections', function($alias)
        {
            return Section::where('alias', $alias)->firstOrFail();
        });

        $router->bind('articles', function($id)
        {
           return Article::find($id);
        });

        $router->bind('styles', function($id)
        {
            return Style::find($id);
        });

        $router->bind('users', function($id)
        {
            return User::find($id);
        });
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});

	}

}
