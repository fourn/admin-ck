<?php

namespace Fourn\AdminCK;

use Encore\Admin\Form\Field;

class CKEditor extends Field
{
    public static $js = [
        // 编辑器用的网络资源
        'https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js',
        // 文件浏览器用的静态资源
        '/vendor/admin-ck/ckfinder/ckfinder.js',
    ];

    protected $view = 'admin-ck::ckeditor';

    public function render()
    {
        $this->script = <<<EOT
var editor = CKEDITOR.replace('{$this->id}');
CKFinder.config( { connectorPath: '/ckfinder/connector' } );
CKFinder.setupCKEditor( editor );
EOT;
        return parent::render();
    }
}