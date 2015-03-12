<?php

namespace insolita\wgadminlte;

use yii\helpers\Html;
use yii\bootstrap\Widget;

/**
 * InfoBox for AdminLte
 * @see http://joxi.ru/LmG8bDkSnNEJ2l
 */
class InfoBox extends Widget
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
    const TYPE_OLIVE = 'olive';
    const TYPE_LIME = 'lime';
    const TYPE_ORANGE = 'orange';
    const TYPE_FUS = 'fuchsia';
    const TYPE_BLACK = 'black';
    const TYPE_GRAY = 'gray';

    /**
     * @var string|null $boxBg color style of all widget*
     */

    public $boxBg = null;

    /**
     * @var string|null $iconBg color style of icon-part widget*
     */

    public $iconBg = null;

    /**
     * @var string $number (Number text) *
     */
    public $number = '';

    /**
     * @var string $text text under head *
     */
    public $text = '';

    /**
     * @var string $icon icon class such as "ion ion-bag  or fa fa-beer"*
     */
    public $icon = '';

    /**
     * @var integer|null $progress percentage of progressbar width or null, if not needed *
     */
    public $progress = null;

    /**
     * @var string $progressText text under progressBar or footer text *
     */
    public $progressText = '';


    public function run()
    {
        Html::addCssClass($this->options, 'info-box');
        if($this->boxBg){
            Html::addCssClass($this->options, 'bg-' . $this->boxBg);
        }
        $icon=Html::tag('span','<i class="' . $this->icon . '"></i>',['class'=>'info-box=icon'.($this->iconBg?' bg-'.$this->iconBg:'')]);
        $content=($this->text?Html::tag('span',$this->text,['class'=>'info-box-text']):'');
        $content.=($this->number?Html::tag('span',$this->number,['class'=>'info-box-number']):'');
        $content.=(!is_null($this->progress)?Html::tag('div','<div class="progress-bar" style="width: '.$this->progress.'%"></div>>',['class'=>'progress']):'');
        $content.=($this->progressText?Html::tag('span',$this->progressText,['class'=>'progress-description']):'');
        $inner=Html::tag('div',$content,['class'=>'info-box-content']);

        echo Html::tag(
            'div', $icon.$inner, $this->options
        );
    }

}
