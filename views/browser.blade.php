<!DOCTYPE html>
<!--
Copyright (c) 2007-2018, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or https://ckeditor.com/sales/license/ckfinder
-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>CKFinder 3 - File Browser</title>
</head>
<body>

<script type="text/javascript" src="<?php echo asset('vendor/admin-ck/ckfinder/ckfinder.js') ?>"></script>
<script>
	CKFinder.config( { connectorPath: <?php echo json_encode(route('ckfinder-connector')) ?> } );
	CKFinder.start();
</script>

</body>
</html>

