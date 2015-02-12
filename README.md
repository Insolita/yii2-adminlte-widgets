Widgets for AdminLte theme
===========================
Widgets for AdminLte theme
(for https://github.com/trntv/yii2-starter-kit by default)
if you use other AdminLte integration -   replace by AssetManager in class ExtAdminlteAsset
depends from 'common\assets\AdminLTE' to your AdminLTE asset path


```php
'components'=>[
//--------
     'assetManager'=>[
                 'class'=>'yii\web\AssetManager',
                 'bundles'=>[
                 //--------
                     'insolita\wgadminlte\ExtAdminlteAsset'=>[
                         'depends'=>[
                             'yii\web\YiiAsset',
                             'path\to\AdminLteAsset'
                         ]
                     ]

             ],
//--------

]

```

See http://www.bootstrapstage.com/demo/admin-lte/pages/widgets.html  and http://www.bootstrapstage.com/demo/admin-lte/pages/UI/general.html examples

Box-widget with support collapse buttons and can save collapsed state in cookie
support solid style

Tile-widget - similar as box, with same options but with background

Smallbox-widget
Alert-widget
Callout-widget

Also Timeline Widget - see more info about it in file Timeline.md

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

   <?php echo \insolita\wgadminlte\SmallBox::widget([
	                    'type'=>\insolita\wgadminlte\SmallBox::TYPE_PURPLE,
	                    'head'=>'90%',
	                    'text'=>'Free Space',
	                    'icon'=>'fa fa-cloud-download',
	                    'footer'=>'Подробнее <i class="fa fa-hand-o-right"></i>',
	                    'footer_link'=>'#'
	                ]);?>

   <?=\insolita\wgadminlte\Alert::widget([
              'type'=>\insolita\wgadminlte\Alert::TYPE_SUCCESS,
              'text'=>'Operation Complete',
              'closable'=>true
          ]);?>

   <?=\insolita\wgadminlte\Callout::widget([
            'type'=>\insolita\wgadminlte\Alert::TYPE_WARNING,
            'head'=>'Operation Complete',
            'text'=>'Something text bla-bla-bla bla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-bla'
        ]);?>

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

