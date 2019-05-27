<?php

namespace Fourn\AdminCk\CkEditor;

use Encore\Admin\Form\Field;

class CkEditor extends Field
{
    public static $js = [
        '//cdn.ckeditor.com/4.11.4/standard/ckeditor.js'
    ];

    protected $view = 'admin.ckeditor';

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