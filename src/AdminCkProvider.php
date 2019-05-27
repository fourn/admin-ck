<?php

namespace Fourn\AdminCk;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Form;
use Fourn\AdminCk\CkEditor\CkEditor;

class AdminCkProvider extends ServiceProvider
{
    public function register()
    {
        Form::extend('ckeditor', CkEditor::class);
    }

    public function boot()
    {

    }
}