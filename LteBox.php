<?php
/**
 * Created by solly [25.03.17 16:18]
 */

namespace insolita\wgadminlte;

use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Widget;
use yii\helpers\Html;

/**
 * Class LteBox
 *
 * @package insolita\wgadminlte
 */
class LteBox extends Widget
{
    /**
     * @var string $type color style of widget*
     */
    
    public $type = LteConst::TYPE_DEFAULT;
    
    /**
     * @var boolean $solid is solid box header*
     */
    public $solid = false;
    
    /**
     * @var boolean $withBorder add border after box header (for AdminLte 2.0)*
     */
    public $withBorder = false;
    
    /**
     * @var string $tooltip box -tooltip*
     */
    public $tooltip = '';
    
    /**
     * @var string $tooltipPlacement -top/bottom/left/or right *
     */
    public $tooltipPlacement = 'bottom';
    
    /**
     * @var string $title *
     */
    public $title = '';
    
    /**
     * @var string
     */
    public $body = '';
    
    /**
     * @var array|string
     */
    public $boxTools;
    
    /**
     * @var string $footer *
     */
    public $footer = '';
    
    /**
     * @var string
     */
    public $topTemplate
        = <<<HTML
<div {options}>
<div {headerOptions}><h3 class="box-title">{title}</h3>{box-tools}</div>
<div class="box-body">
HTML;
    
    /**
     * @var string
     */
    public $bottomTemplate
        = <<<HTML
</div>
<div class="box-footer">{footer}</div>
</div>
HTML;
    
    /**
     *
     */
    public function init()
    {
        Html::addCssClass($this->options, 'box');
        Html::addCssClass($this->options, 'box-' . $this->type);
        if ($this->solid) {
            Html::addCssClass($this->options, 'box-solid');
        }
        echo strtr(
            $this->topTemplate,
            [
                '{options}'       => Html::renderTagAttributes($this->options),
                '{headerOptions}' => Html::renderTagAttributes($this->prepareHeaderOptions()),
                '{title}'         => $this->title,
                '{box-tools}'     => $this->prepareBoxTools(),
            ]
        ).$this->body;
    }
    
    /**
     *
     */
    public function run()
    {
        if($this->footer){
            echo strtr(
                $this->bottomTemplate,
                [
                    '{footer}' => $this->footer,
                ]
            );
        }else{
            echo '</div></div>';
        }
        
    }
    
    /**
     * @return array
     */
    protected function prepareHeaderOptions()
    {
        $headerOptions = ['class' => 'box-header'];
        if ($this->withBorder) {
            Html::addCssClass($headerOptions, 'with-border');
        }
        if ($this->tooltip) {
            $headerOptions = array_merge(
                $headerOptions,
                [
                    'data-toggle'         => 'tooltip',
                    'data-original-title' => $this->tooltip,
                    'data-placement'      => $this->tooltipPlacement ?: 'bottom',
                ]
            );
        }
        return $headerOptions;
    }
    
    /**
     * @return string
     */
    protected function prepareBoxTools()
    {
        $boxTools = '';
        if (!empty($this->boxTools)) {
            if (is_array($this->boxTools)) {
                $boxTools = ButtonGroup::widget(
                    [
                        'buttons'      => $this->boxTools,
                        'encodeLabels' => false,
                    ]
                );
            } else {
                $boxTools = $this->boxTools;
            }
        }
        return $boxTools ? Html::tag('div', $boxTools, ['class' => 'box-tools pull-right']) : '';
    }
}
