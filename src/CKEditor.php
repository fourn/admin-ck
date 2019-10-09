<?php

namespace Fourn\AdminCK;

use Encore\Admin\Form\Field;

class CKEditor extends Field
{
	protected static $js = [
        '/vendor/admin-ck/ckeditor/ckeditor.js',
        '/vendor/admin-ck/ckfinder/ckfinder.js',
    ];

    protected $view = 'admin-ck::ckeditor';

    public function render()
    {
        $filebrowserUploadUrl = route('ckfinder-connector');
        $filebrowserBrowseUrl = route('ckfinder-browser');
        $this->script = <<<EOT
var editor = CKEDITOR.replace('{$this->id}', {
    filebrowserBrowseUrl: '{$filebrowserBrowseUrl}?type=Files',
    filebrowserImageBrowseUrl: '{$filebrowserBrowseUrl}?type=Images',
    filebrowserUploadUrl: '{$filebrowserUploadUrl}?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '{$filebrowserUploadUrl}?command=QuickUpload&type=Images'
});
CKFinder.setupCKEditor( editor );
EOT;

        return parent::render();
    }
}