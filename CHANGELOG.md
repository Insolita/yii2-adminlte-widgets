CHANGELOG
---------
04.11.2017 v3.0
 - php7,2 and yii >=2.0.13 support
 - Remove deprecated classes

26.03.2017 v2.0
 Replaced: abandoned jquery-cookie library has been replaced with js-cookie (official replacement)
 - refactor Alert; Callout; FlashAlerts; 
 - Add LteConst - class with all constants; Constants in classes mark as deprecated
 - Add CollapseBoxAsset and collapsebox.js; ExtAdminLteAsset mark as deprecated;
 - Add widgets LteBox; CollapseBox;  Widgets Box and Tile mark as deprecated
 - Add widgets LteInfoBox; LteSmallBox; Widgets InfoBox and SmallBox mark as deprecated
 - Add LteChatbox, LteChatBoxMessage widgets
 - Add LteSetupWidget
 
 
 03.06.2016  v 1.1.6 Fix FlashAlerts; support flashes added as array via Yii::$app->session->addFlash
 
 19.05.2016 v 1.1.5 change composer jquery-cookie version, fix JCookieAsset path ![10x schmunk42](https://github.com/Insolita/yii2-adminlte-widgets/commit/6f99a85c83616621e23fd8ad60d95b2d43cd9f30)
 
25.09.2015 v1.1.2 Fix collapse remember functional for Box and Tiles,
                  add new options for Box and Tile "collapseDefault" - if true, box will be collapsed by default
                  
 13.03.2015 v1.1.1 new Info-Box widget for AdminLte 2.0
            add with-border options to Box widget for AdminLte 2.0
            add ability to set left and right toolbar elements for box widget not only as string html code but also as array for yii\bootstrap\ButtonGroup $buttons

07.03.2015 v1.1.0 Remove dependency of common\assets\AdminLTE (previous variant branched to stkit)

14.02.2015 Added: FlashAlerts Widget - widget for layout for show Yii flash messages in lte style and support multiple message in one style





