<?php

namespace insolita\wgadminlte;

use yii\bootstrap\Widget;
use yii\helpers\Html;

/**
 * Class Callout
 *
 * @example
 * <?php
 * Callout::widget(['type'=>'info','head'=>'Soma Head','text'=>'some message']);
 * ?>
 * Also possible
 * <?php Callout::begin(['type'=>'info','head'=>'Soma Head'])?>
 *    Some body content
 * <?php Callout::end();?>
 * @package insolita\wgadminlte
 */
class Callout extends Widget
{
    /**
     * @deprecated use LteConst instead
     */
    const TYPE_WARNING = 'warning';
    /**
     * @deprecated use LteConst instead
     */
    const TYPE_DANGER = 'danger';
    /**
     * @deprecated use LteConst instead
     */
    const TYPE_INFO = 'info';
    /**
     * @deprecated use LteConst instead
     */
    const TYPE_DEFAULT = 'default';
    
    /**
     * @var string $type color style of widget
     */
    
    public $type = LteConst::TYPE_INFO;
    
    /**
     * @var string $head *
     */
    public $head = '';
    
    /**
     * @var string $text your message
     **/
    public $text = '';
    
    /**
     * @var string
     */
    public $topTemplate
        = <<<HTML
       <div {options}><h4>{head}</h4><p>
HTML;
    
    /**
     * @var string
     */
    public $endTemplate
        = <<<HTML
       </p></div>
HTML;
    
    /**
     * @inheritdoc
     */
    public $options = [];
    
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'callout');
        Html::addCssClass($this->options, 'callout-' . $this->type);
        echo strtr(
            $this->topTemplate,
            [
                '{options}' => Html::renderTagAttributes($this->options),
                '{head}'    => $this->head,
            ]
        );
        if ($this->text) {
            echo $this->text;
        }
    }
    
    /**
     *
     */
    public function run()
    {
        return $this->endTemplate;
    }
    
}
