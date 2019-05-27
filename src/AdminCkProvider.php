<?php

namespace Fourn\AdminCk;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Admin;
use Encore\Admin\Form;
use Fourn\AdminCk\CkEditor\CkEditor;

class AdminCkProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/ckfinder.php' => config_path('ckfinder.php'),
//                __DIR__.'/../resources/assets' => public_path('vendor/kindeditor')
            ]);
        }

        Admin::booting(function () {
            Form::extend('ckeditor', CkEditor::class);
        });
    }
}