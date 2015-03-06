<?php
/**
 * Created by PhpStorm.
 * User: Insolita
 * Date: 11.11.14
 * Time: 0:50
 */

namespace insolita\wgadminlte;

use \yii\web\AssetBundle;
class CalendarAsset  extends AssetBundle{
    public $sourcePath = '@vendor/insolita/yii2-adminlte-widgets/js';

    public $js
        = [
            'calendar.js',
        ];

    public $depends=[
        'yii\web\YiiAsset'
    ];
}

