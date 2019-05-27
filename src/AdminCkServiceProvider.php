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
                __DIR__.'/views/ckeditor.blade.php' => resource_path('views/vendor/admin-ck'),
//                __DIR__.'/config/ckfinder.php' => config_path('ckfinder.php'),
//                __DIR__.'/../resources/assets' => public_path('vendor/kindeditor')
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/views/ckeditor.blade.php', 'admin-ck');

        Admin::booting(function () {
            Form::extend('ckeditor', CkEditor::class);
        });
    }
}