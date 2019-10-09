<?php

namespace Fourn\AdminCK;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Kernel;
use Encore\Admin\Admin;
use Encore\Admin\Form;
use CKSource\CKFinder\CKFinder;

class AdminCKServiceProvider extends ServiceProvider
{

	public function register()
	{
		// 注册 CKFinder 服务
		$this->app->bind('CKConnector', function () {

			$ckfinder = new CKFinder(config('ckfinder', []));

			if (Kernel::MAJOR_VERSION >= 4) {
                $this->setupForV4PlusKernel($ckfinder);
            }

			return $ckfinder;
		});
	}

	public function boot()
	{
		if ($this->app->runningInConsole()) {
		    $this->publishes([
		        // CK 静态文件
		        __DIR__ . '/../public' => public_path('vendor/admin-ck'),
		        // CKFinder 配置文件
		        __DIR__ . '/config.php' => config_path('ckfinder.php')
		    ], 'admin-ck');
		}

		// 加载视图包
		$this->loadViewsFrom(__DIR__ . '/../views', 'admin-ck');

		// 加载路由
		$this->loadRoutesFrom(__DIR__ . '/routes.php');

		Admin::booting(function () {
		    // 注册富文本编辑器
		    Form::extend('ckeditor', CKEditor::class);
		    // 注册文件选择
		    Form::extend('ckuploader', CKUploader::class);
		});		
	}

	protected function setupForV4PlusKernel($ckfinder)
	{
	    $ckfinder['resolver'] = function () use ($ckfinder) {
	        $commandResolver = new \Fourn\AdminCK\Polyfill\CommandResolver($ckfinder);
	        $commandResolver->setCommandsNamespace(\CKSource\CKFinder\CKFinder::COMMANDS_NAMESPACE);
	        $commandResolver->setPluginsNamespace(\CKSource\CKFinder\CKFinder::PLUGINS_NAMESPACE);

	        return $commandResolver;
	    };

	    $ckfinder['kernel'] = function () use ($ckfinder) {
	        return new HttpKernel(
	            $ckfinder['dispatcher'],
	            $ckfinder['resolver'],
	            $ckfinder['request_stack'],
	            $ckfinder['resolver']
	        );
	    };
	}
}