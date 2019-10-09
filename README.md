<h1 align="center"> admin-ck </h1>

<p align="center">让laravel-admin能够方便的使用ckeditor和ckfinder</p>

![](http://ww2.sinaimg.cn/large/006tNc79gy1g3g13kk4tmg312y0mrdv8.gif)

## Installing

```shell
$ composer require fourn/admin-ck
```

## Usage

```shell
$ php artisan vendor:publish --tag=admin-ck
```

```php
$form->ckuploader('image', '封面图');
$form->ckeditor('content', '内容');
```

## Contributing

配置文件在config/ckfinder.php

## License
MIT
fourn@foxmail.com