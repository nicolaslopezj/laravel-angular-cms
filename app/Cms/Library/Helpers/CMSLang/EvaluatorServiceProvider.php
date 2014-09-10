<?php namespace Cms\Library\Helpers\CMSLang;

use Illuminate\Support\ServiceProvider;
use \Blade;

class EvaluatorServiceProvider extends ServiceProvider {

	public function boot()
	{
		Blade::extend(function($view, $compiler)
		{
		    $pattern = $compiler->createMatcher('evaluate');
		    return preg_replace($pattern, '$1<?php echo Evaluator::evaluateTextInView$2; ?>', $view);
		});
	}

	public function register()
	{
		
	}

}