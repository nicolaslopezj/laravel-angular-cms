<?php namespace Cms\Library\Facades;

use Illuminate\Support\ServiceProvider;

class FacadesServiceProvider extends ServiceProvider {

	public function boot()
	{
		
	}

	public function register()
	{
		\App::bind('file_driver', function()
		{
			return new \Cms\Library\Drivers\FileDriver;
		});

		\App::bind('file_link_driver', function()
		{
			return new \Cms\Library\Drivers\FileLinkDriver;
		});

		\App::bind('folder_link_driver', function()
		{
			return new \Cms\Library\Drivers\FolderLinkDriver;
		});
		
		\App::bind('definition_driver', function()
		{
			return new \Cms\Library\Drivers\DefinitionDriver;
		});

		\App::bind('entity_driver', function()
		{
			return new \Cms\Library\Drivers\EntityDriver;
		});

		\App::bind('image_driver', function()
		{
			return new \Cms\Library\Drivers\ImageDriver;
		});

		\App::bind('public_route_driver', function()
		{
			return new \Cms\Library\Drivers\PublicRouteDriver;
		});

		\App::bind('public_view_driver', function()
		{
			return new \Cms\Library\Drivers\PublicViewDriver;
		});

		\App::bind('user_driver', function()
		{
			return new \Cms\Library\Drivers\UserDriver;
		});

		\App::bind('files_helper', function()
		{
			return new \Cms\Library\Helpers\FilesHelper;
		});

		\App::bind('packages_helper', function()
		{
			return new \Cms\Library\Helpers\PackagesHelper;
		});

		\App::bind('dict', function()
		{
			return new \Cms\Library\Helpers\Dict;
		});

	}

}