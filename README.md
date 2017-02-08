Widgets for AdminLte theme
===========================

 * Box-widget with support collapse buttons and can save collapsed state in cookie support solid style
 * Tile-widget - similar as box, with same options but with background
 * Smallbox-widget
 * Alert-widget
 * Callout-widget
 * Infobox-widget
 * Flash-Alerts
 * [Timeline Widget] (http://almsaeedstudio.com/themes/AdminLTE/pages/UI/timeline.html) - see more info about it in file [Timeline.md](https://github.com/Insolita/yii2-adminlte-widgets/blob/master/Timeline.md)

See http://almsaeedstudio.com/themes/AdminLTE/pages/widgets.html  and http://almsaeedstudio.com/themes/AdminLTE/pages/UI/general.html examples

[CHANGELOG](https://github.com/Insolita/yii2-adminlte-widgets/blob/master/CHANGELOG.md)

Independent of any AdminLte AssetBundles
If you want use cookie collapsing boxes, set correct dependencies in AssetManager

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
                             'path\to\AdminLteAsset',
                             'insolita\wgadminlte\JsCookieAsset'
                         ]
                     ],
                     'insolita\wgadminlte\JsCookieAsset'=>[
                           'depends'=>[
                               'yii\web\YiiAsset',
                               'path\to\AdminLteAsset'
                          ]
                     ],

             ],
     ]
//--------

]

```



Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist insolita/yii2-adminlte-widgets "~1.1"
```

or add

```
"insolita/yii2-adminlte-widgets": "~1.1"
```

to the require section of your `composer.json` file.



Usage
------
 * Box

```php
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
```
 * Tile

```php
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
 * SmallBox

 ```php
   <?php echo \insolita\wgadminlte\SmallBox::widget([
	                    'type'=>\insolita\wgadminlte\SmallBox::TYPE_PURPLE,
	                    'head'=>'90%',
	                    'text'=>'Free Space',
	                    'icon'=>'fa fa-cloud-download',
	                    'footer'=>'Подробнее <i class="fa fa-hand-o-right"></i>',
	                    'footer_link'=>'#'
	                ]);?>
```

 * InfoBox

 ```php
   <?php echo \insolita\wgadminlte\InfoBox::widget([
                       'boxBg'=>\insolita\wgadminlte\InfoBox::TYPE_AQUA,
                       'iconBg'=>\insolita\wgadminlte\InfoBox::TYPE_GREEN,
                       'number'=>100500,
                       'text'=>'Test Three',
                       'icon'=>'fa fa-bolt',
                       'progress'=>66,
                       'progressText'=>'Something about this'
                   ])?>
```
 * Callout
```php
   <?=\insolita\wgadminlte\Callout::widget([
            'type'=>\insolita\wgadminlte\Alert::TYPE_WARNING,
            'head'=>'Operation Complete',
            'text'=>'Something text bla-bla-bla bla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-bla'
        ]);?>

```
 * Alert
```php
   <?=\insolita\wgadminlte\Alert::widget([
              'type'=>\insolita\wgadminlte\Alert::TYPE_SUCCESS,
              'text'=>'Operation Complete',
              'closable'=>true
          ]);?>
```


Add in layout

```php
<?=\insolita\wgadminlte\FlashAlerts::widget([
                'errorIcon'=>'<i class="fa fa-warning"></i>',
                'successIcon'=>'<i class="fa fa-check"></i>',
                'successTitle'=>'Done!',
                'closable'=>true,
                'encode'=>false,
                'bold'=>false
                ]);?>
```

And set flash messages anywhere

```php
Yii::$app->session->setFlash('info1','Message1');
Yii::$app->session->setFlash('info2','Message2');
Yii::$app->session->setFlash('info3','Message3');
Yii::$app->session->setFlash('success-first','Message');
Yii::$app->session->setFlash('success-second','Message');
```



