<?php
/**
 * Created by PhpStorm.
 * User: Insolita
 * Date: 11.11.14
 * Time: 0:50
 */

namespace insolita\wgadminlte;

use \yii\web\AssetBundle;

/**
 * Class ExtAdminlteAsset
 *
 * @deprecated
 * @package insolita\wgadminlte
 */
class ExtAdminlteAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/insolita/yii2-adminlte-widgets/js';
    
    /**
     * @var array
     */
    public $js
        = [
            'admlteext.js',
        ];
    
    /**
     * @var array
     */
    public $depends
        = [
            'yii\web\YiiAsset',
            'insolita\wgadminlte\JsCookieAsset',
        ];
}

