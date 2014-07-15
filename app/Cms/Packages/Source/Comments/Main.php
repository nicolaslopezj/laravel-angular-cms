<?php namespace Cms\Packages\Source\Comments;

class Main {

	public static function boot()
	{

	}

	public static function register()
	{
		\View::addNamespace('comments', app_path() . '/Cms/Packages/Source/Comments/views');
	}

	public static function install()
	{
		include app_path() . '/Cms/Packages/Source/Comments/DB/install.php';
	}

	public static function uninstall()
	{
		include app_path() . '/Cms/Packages/Source/Comments/DB/uninstall.php';
	}

	public static function devSidebar()
	{
		return array();
	}

	public static function adminRoutes() {
		\Route::get('comments/export_all', [
			'as' => 'admin.comments.export_all',
			'uses' => 'Comments\Controllers\Admin\CommentsController@exportAll',
		]);
		\Route::get('comments/export_nonreaded', [
			'as' => 'admin.comments.export_nonreaded',
			'uses' => 'Comments\Controllers\Admin\CommentsController@exportNonreaded',
		]);
		\Route::resource('comments', 'Comments\Controllers\Admin\CommentsController');
	}

	public static function adminSidebar()
	{
		return array(
			'route_index' => 'comments.index',
			'route_check' => 'comments',
			'name' => 'Comments',
		);
	}

}