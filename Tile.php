<?php

namespace insolita\wgadminlte;

use yii\web\JsExpression;
use yii\bootstrap\Widget;
use yii\helpers\Html;

/**
 * This is just an example.
 */
class Tile extends Widget
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

    /**@var string $type color style of widget* */

    public $type = self::TYPE_LBLUE;

    /**@var string $tooltip box -tooltip* */
    public $tooltip = '';

    /**@var string $tooltip_placement -top/bottom/left/or right **/
    public $tooltip_placement='bottom';

    /**@var string $title * */
    public $title = '';

    /**@var string $footer * */
    public $footer = '';

    /**@var boolean $collapse show or not Box - collapse button* */
    public $collapse = false;

    /**@var boolean $collapse_remember - set cookies for rememer collapse stage* */
    public $collapse_remember = true;

    /**@var string $custom_tools code of custom box toolbar**/
    public $custom_tools = '';

    /**@var string $left_tools code of custom box toolbar in left corner**/
    public $left_tools = '';


    private $_cid = null;

    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->_cid =$this->options['id'] = 'tilec_'.$this->getId();
        }


        Html::addCssClass($this->options,'box');
        Html::addCssClass($this->options,'box-' . $this->type);
        Html::addCssClass($this->options,'box-solid');
        $this->registerJs();
        echo '<div '.Html::renderTagAttributes($this->options).'>'
            . (!$this->title && !$this->collapse && !$this->custom_tools && !$this->left_tools
                ? ''
                : '<div class="box-header"'
                . (!$this->tooltip ? '' : 'data-toggle="tooltip" data-original-title="' . $this->tooltip . '" data-placement="'.$this->tooltip_placement.'"') . '>'
                . (!$this->left_tools?'':'<div class="box-tools pull-left">'.$this->left_tools.'</div>')
                . (!$this->title ? '' : '<h3 class="box-title">' . $this->title . '</h3>')
                . (!$this->collapse
                    ? ''
                    :
                    (!$this->custom_tools ?
                        '<div class="box-tools pull-right"><button class="btn btn-primary btn-xs" data-widget="collapse" id="'
                        . $this->cid . '_btn"><i class="fa fa-minus"></i></button></div>' : ''))
                . (!$this->custom_tools
                    ? ''
                    : '<div class="box-tools pull-right">' . $this->custom_tools
                    . (!$this->collapse
                        ? ''
                        : '<button class="btn btn-primary btn-xs" data-widget="collapse" id="' . $this->cid . '_btn">
                                   <i class="fa fa-minus"></i></button>')
                    . '</div>')
                . '</div>')
            . '<div class="box-body">';
    }

    public function run()
    {
        echo '</div>'
            . (!$this->footer ? '' : "<div class='box-footer'>" . $this->footer . "</div>")
            . '</div>';
    }

    public function registerJs()
    {
        if ($this->collapse_remember && $this->collapse) {
            $view = $this->getView();
            JCookieAsset::register($view);
            ExtAdminlteAsset::register($view);
            $js = new JsExpression(
                'if($.cookie("' . $this->_cid . '_state")=="hide"){
                        var box = $("#' . $this->_cid . '");
                        var bf = box.find(".box-body, .box-footer");
                        if (!box.hasClass("collapsed-box")) {
                            box.addClass("collapsed-box");
                            bf.hide();
                        }
                   }

            '
            );
            $view->registerJs($js);
        }


    }
}
