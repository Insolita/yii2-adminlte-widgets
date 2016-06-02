CHANGELOG
---------

14.02.2015 Added: FlashAlerts Widget - widget for layout for show Yii flash messages in lte style and support multiple message in one style

07.03.2015 v1.1.0 Remove dependency of common\assets\AdminLTE (previous variant branched to stkit)

13.03.2015 v1.1.1 new Info-Box widget for AdminLte 2.0
           add with-border options to Box widget for AdminLte 2.0
           add ability to set left and right toolbar elements for box widget not only as string html code but also as array for yii\bootstrap\ButtonGroup $buttons
25.09.2015 v1.1.2 Fix collapse remember functional for Box and Tiles,
                  add new options for Box and Tile "collapseDefault" - if true, box will be collapsed by default
                  
19.05.2016 v 1.1.5 change composer jquery-cookie version, fix JCookieAsset path ![10x schmunk42](https://github.com/Insolita/yii2-adminlte-widgets/commit/6f99a85c83616621e23fd8ad60d95b2d43cd9f30)

03.06.2016  v 1.1.6 Fix FlashAlerts; support flashes added as array via Yii::$app->session->addFlash