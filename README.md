Виджеты AdminLte интерфейса
===========================
Виджеты AdminLte интерфейса

Box-widget with support collapse buttons and can save collapsed state in cookie

Usage
------

```
 <?php \insolita\wgadminlte\Box::begin([
            'type'=>\insolita\wgadminlte\Box::TYPE_PRIMARY,
            'solid'=>true,
            'tooltip'=>'Описание содаржимого',
            'title'=>'Управление пользователями',
            'footer'=>'Всего '.User::counter().' активных пользователей',
            'collapse'=>true,
             'collapse_remember'=>true
        ])?>
        ANY BOX CONTENT HERE
   <?php \insolita\wgadminlte\Box::end()?>
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

