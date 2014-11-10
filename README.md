Виджеты AdminLte интерфейса
===========================
Виджеты AdminLte интерфейса  (for https://github.com/trntv/yii2-starter-kit)

See http://www.bootstrapstage.com/demo/admin-lte/pages/widgets.html  examples

Box-widget with support collapse buttons and can save collapsed state in cookie
support solid style

Tile-widget - similar as box, with same options but with background

Usage
------

```
    <?php \insolita\wgadminlte\Box::begin([
             'type'=>\insolita\wgadminlte\Box::TYPE_PRIMARY,
             'solid'=>true,
             'left_tools'=>'<button class="btn btn-success btn-xs create_button" ><i class="fa fa-plus-circle"></i> Добавить</button>',
             'tooltip'=>'Описание содаржимого',
             'title'=>'Управление пользователями',
             'footer'=>'Всего '.User::counter().' активных пользователей',
             'collapse'=>true
         ])?>
        ANY BOX CONTENT HERE
   <?php \insolita\wgadminlte\Box::end()?>

   <?php \insolita\wgadminlte\Tile::begin([
               'type'=>\insolita\wgadminlte\Tile::TYPE_RED,
               'tooltip'=>'Useful information!',
               'title'=>'Attention!',
               'collapse'=>false
           ])?>
        ANY BOX CONTENT HERE
         ANY BOX CONTENT HERE
          ANY BOX CONTENT HERE
           ANY BOX CONTENT HERE
       <?php \insolita\wgadminlte\Tile::end()?>

```


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist insolita/yii2-adminlte-widgets "*"
```

or add

```
"insolita/yii2-adminlte-widgets": "*"
```

to the require section of your `composer.json` file.

