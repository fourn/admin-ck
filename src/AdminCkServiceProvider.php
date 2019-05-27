<?php

namespace Fourn\AdminCk;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Admin;
use Encore\Admin\Form;
use Fourn\AdminCk\CkEditor\CkEditor;

class AdminCkServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                // 富文本编辑器视图文件
                __DIR__.'/views' => resource_path('views/vendor/admin-ck'),
                // laravel-ckfinder配置文件
                __DIR__.'/config/ckfinder.php' => config_path('ckfinder.php'),
            ]);
        }

        // 载入富文本编辑器视图文件
        $this->loadViewsFrom(__DIR__.'/views', 'admin-ck');

        Admin::booting(function () {
            // 注册富文本编辑器方法到Form
            Form::extend('ckeditor', CkEditor::class);
        });
    }
}