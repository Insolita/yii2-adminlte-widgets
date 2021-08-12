<?php

namespace insolita\wgadminlte;

use yii\bootstrap\Widget;
use yii\helpers\Html;

/**
 * SmallBox for AdminLte
 *
 * @example
 * <?php
 * LteSmallBox::widget([
 * 'title'=>'New Regisrations',
 * 'text'=>126,
 * 'icon'=>'fa fa-users',
 * 'footer'=>'See All',
 * 'link'=>Url::to("/user/list")]);
 * ?>
 * @see http://joxi.ru/4AkvMeNFR8gd2q
 */
class LteSmallBox extends Widget
{
    /**
     * @var string $type color style of widget  @see LteConst COLOR_*
     */
    public $type = LteConst::COLOR_AQUA;
    
    /**
     * @var string $title (Big text) *
     */
    public $title = '';
    
    /**
     * @var string $text text under head *
     */
    public $text = '';
    
    /**
     * @var string $icon icon class such as "ion ion-bag  or fa fa-beer"*
     */
    public $icon = '';
    
    /**
     * @var string $footer text in footer*
     */
    public $footer = '';
    
    /**
     * @var string $link link for footer*
     */
    public $link = '#';

    /**@var array additional link options*/
    public $linkOptions = [];
    /**
     * @var string
     */
    public $template
        = <<<HTML
<div {options}>
            <div class="inner">
              <h3>{title}</h3>
              <p>{text}</p>
            </div>
            <div class="icon">
              {icon}
            </div>
            <a href="{link}" {linkOptions} >
              {footer} <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
HTML;
    
    /**
     * @return string
     */
    public function run()
    {
        Html::addCssClass($this->options, 'small-box');
        Html::addCssClass($this->options, 'bg-' . $this->type);
        Html::addCssClass($this->linkOptions, 'small-box-footer');
        return strtr(
            $this->template,
            [
                '{options}'=>Html::renderTagAttributes($this->options),
                '{title}'  => $this->title,
                '{text}'   => $this->text,
                '{icon}'   => '<i class="' . $this->icon . '"></i>',
                '{footer}' => $this->footer,
                '{link}'   => $this->link,
                '{linkOptions}'=>Html::renderTagAttributes($this->linkOptions),
            ]
        );
    }
    
}
