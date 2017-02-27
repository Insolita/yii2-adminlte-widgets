<?php
/**
 * Created by PhpStorm.
 * User: Insolita
 * Date: 11.11.14
 * Time: 0:50
 */

namespace insolita\wgadminlte;

use \yii\web\AssetBundle;

class JsCookieAsset  extends AssetBundle{
    public $sourcePath = '@bower/js-cookie';

    public $js
        = [
            'src/js.cookie.js',
        ];

    public $depends=[
        'yii\web\YiiAsset'
    ];
}

