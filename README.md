Widgets for AdminLte theme
===========================

#### Warning! 2.0 version can break compatibilities. For existed projects - recommend stay on 1x branch
See ChangeLog for more information

 * Box-widget with support collapse buttons and can save collapsed state in cookie support solid style
 * Tile-widget - similar as box, with same options but with background
 * Smallbox-widget
 * Alert-widget
 * Callout-widget
 * Infobox-widget
 * Flash-Alerts
 * [Timeline Widget] (http://almsaeedstudio.com/themes/AdminLTE/pages/UI/timeline.html) - see more info about it in file [Timeline.md](https://github.com/Insolita/yii2-adminlte-widgets/blob/master/Timeline.md)
 * ChatBox since 2.0
 * LteSetup since 2.0

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
php composer.phar require --prefer-dist insolita/yii2-adminlte-widgets "~2.0"
```

or add

```
"insolita/yii2-adminlte-widgets": "~2.0"
```

to the require section of your `composer.json` file.



Usage
------
 * Box

```php
    <?php \insolita\wgadminlte\LteBox::begin([
             'type'=>\insolita\wgadminlte\LteConst::TYPE_INFO,
             'isSolid'=>true,
             'boxTools'=>'<button class="btn btn-success btn-xs create_button" ><i class="fa fa-plus-circle"></i> Add</button>',
             'tooltip'=>'this tooltip description',
             'title'=>'Manage users',
             'footer'=>'total 44 active users',
         ])?>
        ANY BOX CONTENT HERE
    <?php \insolita\wgadminlte\LteBox::end()?>
```
 * Tile

```php
   <?php \insolita\wgadminlte\LteBox::begin([
               'type'=>\insolita\wgadminlte\LteConst::COLOR_MAROON,
               'tooltip'=>'Useful information!',
               'title'=>'Attention!',
               'isTile'=>true
           ])?>
        ANY BOX CONTENT HERE
         ANY BOX CONTENT HERE 
   <?php \insolita\wgadminlte\LteBox::end()?>
```
 * Box with content as property
  ```php
     <?php \insolita\wgadminlte\LteBox::widget([
                 'type'=>\insolita\wgadminlte\LteConst::COLOR_MAROON,
                 'tooltip'=>'Useful information!',
                 'title'=>'Attention!',
                 'isTile'=>true,
                 'body'=>'Some Box content'
             ])?>
  ```

 * CollapseBox (Based on LteBox)
```php
    <?php \insolita\wgadminlte\CollapseBox::begin([
             'type'=>\insolita\wgadminlte\LteConst::TYPE_INFO,
             'collapseRemember' => true,
             'collapseDefault' => false,
             'isSolid'=>true,
             'boxTools'=>'<button class="btn btn-success btn-xs create_button" ><i class="fa fa-plus-circle"></i> Добавить</button>',
             'tooltip'=>'Описание содаржимого',
             'title'=>'Управление пользователями',
         ])?>
        ANY BOX CONTENT HERE
    <?php \insolita\wgadminlte\LteBox::end()?>
```

 * SmallBox

 ```php
   <?php echo \insolita\wgadminlte\LteSmallBox::widget([
	                    'type'=>\insolita\wgadminlte\LteConst::COLOR_LIGHT_BLUE,
	                    'title'=>'90%',
	                    'text'=>'Free Space',
	                    'icon'=>'fa fa-cloud-download',
	                    'footer'=>'See All <i class="fa fa-hand-o-right"></i>',
	                    'link'=>Url::to("/user/list")
	                ]);?>
```

 * InfoBox

 ```php
   <?php echo \insolita\wgadminlte\LteInfoBox::widget([
                       'bgIconColor'=>\insolita\wgadminlte\LteConst::COLOR_AQUA,
                       'bgColor'=>'',
                       'number'=>100500,
                       'text'=>'Test Three',
                       'icon'=>'fa fa-bolt',
                       'showProgress'=>true,
                       'progressNumber'=>66,
                       'description'=>'Something about this'
                   ])?>
```
 * Callout
```php
   <?php \insolita\wgadminlte\Callout::widget([
            'type'=>\insolita\wgadminlte\LteConst::TYPE_WARNING,
            'head'=>'Operation Complete',
            'text'=>'Something text bla-bla-bla bla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-bla'
        ]);?>
 <?php \insolita\wgadminlte\Callout::begin([
            'type'=>\insolita\wgadminlte\LteConst::TYPE_WARNING,
            'head'=>'Operation Complete'
        ]);?>
<?php \insolita\wgadminlte\Callout::end()?>

```
 * Alert
```php
   <?=\insolita\wgadminlte\Alert::widget([
              'type'=>\insolita\wgadminlte\LteConst::TYPE_SUCCESS,
              'text'=>'Operation Complete',
              'closable'=>true
          ]);?>
    <?php
    \insolita\wgadminlte\Alert::begin([
                 'type'=>\insolita\wgadminlte\LteConst::TYPE_SUCCESS,
                 'closable'=>true
             ]);?>
    Some alert message
    <?php \insolita\wgadminlte\Alert::end()?>


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

Since 2.0

* ChatBox
```php
<?php 
   \insolita\wgadminlte\LteChatBox::begin([
       'type' => \insolita\wgadminlte\LteConst::TYPE_PRIMARY,
       'footer'=>'<input type="text" name="newMessage">',
       'title'=>'Messages',
       'boxTools' => '<button class="btn btn-xs"><i class="fa fa-refresh"></i></button>'
       ]);
      echo \insolita\wgadminlte\LteChatMessage::widget([
          'isRight' => false,
          'author' => 'Artur Green',
          'message' => 'Some message bla-bla',
          'image'=>'https://almsaeedstudio.com/themes/AdminLTE/dist/img/user3-128x128.jpg',
          'createdAt' => '5 minutes ago'
]);
      echo  \insolita\wgadminlte\LteChatMessage::widget([
                'isRight' => true,
                'author' => 'Jane Smith',
                'message' => 'Some message bla-bla',
                'image'=>'https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg',
                'createdAt' => '2017-23-03 17:33'
      ]);
   \insolita\wgadminlte\LteChatBox::end();
?>
```

Widget for configure lte settings

Add in layout
```php
<?php
   \insolita\wgadminlte\LteSetup::widget([
       'animationSpeed' => 'fast',
       'enableFastclick' => false,
       'navbarMenuSlimscroll'=>false
       //etc...
]);
?>
```

![Example](http://dl4.joxi.net/drive/2017/03/25/0008/3019/551883/83/9bb0d4748a.jpg)