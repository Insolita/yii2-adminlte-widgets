<?php
/**
 * Created by PhpStorm.
 * User: Insolita
 * Date: 11.11.14
 * Time: 3:45
 */

namespace insolita\wgadminlte;


use yii\base\Object;

/**You can extend this object with any other property, getters and setters**/
class TimelineItem extends Object{
    public $time='';
    public $header='';
    public $body='';
    public $footer='';
    public $iconClass='';
    public $iconBg='';

}