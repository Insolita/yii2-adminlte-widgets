<?php

namespace insolita\wgadminlte;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\base\Widget;

/**
 * This is just an example.
 */
class Callout extends Widget
{
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';
    const TYPE_INFO = 'info';
    const TYPE_DEFAULT = 'default';

    /**@var string $type color style of widget* */

    public $type = self::TYPE_INFO;

    /**@var string $head **/
    public $head = '';

    /**@var string $text your message* */
    public $text = '';



    public function run()
    {
        echo '<div class="callout callout-' . $this->type . '">'
            . '<h4>'.$this->head.'</h4>'
            . '<p>'.$this->text.'</p>'
            . '</div>';
    }

}
