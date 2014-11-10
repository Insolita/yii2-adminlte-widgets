<?php

namespace insolita\wgadminlte;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\base\Widget;

/**
 * This is just an example.
 */
class SmallBox extends Widget
{
    const TYPE_NAVY = 'navy';
    const TYPE_LBLUE = 'light-blue';
    const TYPE_BLUE = 'blue';
    const TYPE_AQUA = 'aqua';
    const TYPE_RED = 'red';
    const TYPE_GREEN = 'green';
    const TYPE_YEL = 'yellow';
    const TYPE_PURPLE = 'purple';
    const TYPE_MAR = 'maroon';
    const TYPE_TEAL = 'teal';

    /**@var string $type color style of widget* */

    public $type = self::TYPE_LBLUE;

    /**@var string $head (Big text) * */
    public $head = '';

    /**@var string $text text under head * */
    public $text = '';

    /**@var string $icon icon class such as "ion ion-bag  or fa fa-beer"* */
    public $icon = '';

    /**@var string $footer text in footer**/
    public $footer = '';

    /**@var string $footer_link link for footer**/
    public $footer_link='#';


    public function run()
    {
        echo '<div class="small-box bg-' . $this->type . '">'
            . '<div class="inner">'
            . '<h3>' . $this->head . '</h3>'
            . '<p>' . $this->text . '</p>'
            . '</div>'
            . '<div class="icon"><i class="' . $this->icon . '"></i></div>'
            . Html::a($this->footer, $this->footer_link,['class'=>'small-box-footer'])
            . '</div>';
    }

}
