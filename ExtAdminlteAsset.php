<?php
/**
 * Created by PhpStorm.
 * User: Insolita
 * Date: 11.11.14
 * Time: 0:50
 */

namespace insolita\wgadminlte;

use \yii\web\AssetBundle;

class ExtAdminlteAsset extends AssetBundle
{
    public $sourcePath = '@vendor/insolita/yii2-adminlte-widgets/js';

    public $js
        = [
            'admlteext.js',
        ];

    public $depends
        = [
            'yii\web\YiiAsset',
            'insolita\wgadminlte\JsCookieAsset'
        ];
}

