<?php

namespace insolita\wgadminlte;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * This is just an example.
 */
class Callout extends Widget
{
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';
    const TYPE_INFO = 'info';
    const TYPE_DEFAULT = 'default';

    /**
     * @var string $type color style of widget
     */

    public $type = self::TYPE_INFO;

    /**@var string $head * */
    public $head = '';

    /**
     * @var string $text your message
     **/
    public $text = '';

    /**
     * @inheritdoc
     */
    public $options = [];


    public function run()
    {
        Html::addCssClass($this->options, 'callout');
        Html::addCssClass($this->options, 'callout-' . $this->type);
        echo Html::tag(
            'div', '<h4>' . $this->head . '</h4>'
            . '<p>' . $this->text . '</p>', $this->options
        );
    }

}
