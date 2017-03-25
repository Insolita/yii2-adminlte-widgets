<?php

namespace insolita\wgadminlte;

use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is just an example.
 */
class Alert extends Widget
{
    /**
     * @deprecated use LteConst instead
     */
    const TYPE_SUCCESS = 'success';
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
    
    /**@var string $type color style of widget* */
    
    public $type = LteConst::TYPE_SUCCESS;
    
    /**@var boolean $closable show or not close button* */
    public $closable = true;
    
    /**@var string $text your message* */
    public $text = '';
    
    public $title;
    
    /**@var string $icon icon class such as "ion ion-bag  or fa fa-beer"* */
    public $icon;
    
    public $templateWithTitle = <<<HTML
    <div {options}>{close}<h4><i class="{icon}"></i> {title}</h4>{message}</div>
HTML;
    
    public $template = <<<HTML
    <div {options}>{close}<i class="{icon}"></i> {message}</div>
HTML;

    /**
     * @var array
     */
    public $iconMap
        = [
            LteConst::TYPE_DANGER  => 'fa fa-lg fa-ban',
            LteConst::TYPE_INFO    => 'fa fa-lg fa-info-circle',
            LteConst::TYPE_WARNING => 'fa fa-lg fa-warning',
            LteConst::TYPE_SUCCESS => 'fa fa-lg fa-check',
        ];
    
    /**
     *
     */
    public function init()
    {
        parent::init();
        if (!$this->icon) {
            $this->icon = ArrayHelper::getValue($this->iconMap, $this->type, 'fa fa-question');
        }
    }
    
    /**
     *
     */
    public function run()
    {
        Html::addCssClass($this->options, 'alert');
        Html::addCssClass($this->options, 'alert-' . $this->type);
        if ($this->closable) {
            Html::addCssClass($this->options, 'alert-dismissable');
        }
        $template = $this->title?$this->templateWithTitle:$this->template;
        return strtr($template,[
            '{options}'=>Html::renderTagAttributes($this->options),
            '{close}'=>$this->closable
                ?'<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>':'',
            '{title}'=>$this->title,
            '{icon}'=>$this->icon,
            '{message}'=>$this->text,
        ]);
    }
    
}
