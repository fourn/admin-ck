<?php

namespace Fourn\AdminCK;

use Encore\Admin\Form\Field;

class CKUploader extends Field
{
    public static $js = [
        // 文件浏览器用的静态资源
        '/vendor/admin-ck/ckfinder/ckfinder.js',
    ];

    protected $view = 'admin-ck::ckuploader';

    public function render()
    {
        $this->script = <<<EOT
function selectFileWithCKFinder( elementId ) {
    CKFinder.popup( {
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                console.log(file);
                var output = document.getElementById( 'ckfinder-input-' + elementId );
                output.value = file.getUrl();
                var image = document.getElementById( 'ckfinder-image-' + elementId);
                image.src = file.getUrl();
            } );

            finder.on( 'file:choose:resizedImage', function( evt ) {
                var output = document.getElementById( 'ckfinder-input-' + elementId );
                output.value = evt.data.resizedUrl;
                var image = document.getElementById( 'ckfinder-image-' + elementId);
                image.src = evt.data.resizedUrl.getUrl();
            } );
        }
    } );
}
document.getElementById( 'ckfinder-popup-{$this->id}' ).onclick = function() {
    selectFileWithCKFinder('{$this->id}');
};
EOT;
        return parent::render();
    }
}