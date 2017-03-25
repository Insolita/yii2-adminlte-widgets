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
 * @example
 * <?php
 * LteBox::begin(['type'=>'success','tooltip'=>'my cool box','title'=>'TheTitle','footer'=>'theFooter']);
 * ?>
 *    some long content
 * <?php
 * LteBox::end();
 * ?>
 * Also support variant
 * <?php
 * LteBox::widget(['type'=>'success',
 * 'tooltip'=>'my cool box',
 * 'title'=>'TheTitle',
 * 'body'=>'Inline body definition',
 * 'footer'=>'theFooter']);
 * ?>
 * @package insolita\wgadminlte
 */
class LteBox extends Widget
{
    /**
     * @var string $type color style of widget
     * Default variants =info,success,warning,danger,default, + widget(full white)
     * if isTile true = background color variants - blue,navy,green,red,maroon...etc (@see LteConst COLOR_)
     */
    public $type = LteConst::TYPE_DEFAULT;
    /**
     * @var boolean $isTile true for box with background
     */
    public $isTile = false;
    /**
     * @var boolean $isSolid  true for solid box header*
     */
    public $isSolid = false;
    
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
<div class="box-footer {footerOptions}">{footer}</div>
</div>
HTML;
    
    /**
     *
     */
    public function init()
    {
        Html::addCssClass($this->options, 'box');
        if(!$this->isTile){
            Html::addCssClass($this->options, 'box-' . $this->type);
        }else{
            Html::addCssClass($this->options, 'bg-' . $this->type);
        }
        if ($this->isSolid || $this->isTile) {
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
            return strtr(
                $this->bottomTemplate,
                [
                    '{footer}' => $this->footer,
                    '{footerOptions}' => $this->isTile?'bg-'.$this->type:'',
                ]
            );
        }else{
            return '</div></div>';
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
