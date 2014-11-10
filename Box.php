<?php

namespace insolita\wgadminlte;

use yii\base\InvalidConfigException;
use yii\web\JsExpression;
use yii\base\Widget;

/**
 * This is just an example.
 */
class Box extends Widget
{
    const TYPE_INFO = 'info';
    const TYPE_PRIMARY = 'primary';
    const TYPE_SUCCESS = 'success';
    const TYPE_DEFAULT = 'default';
    const TYPE_DANGER = 'danger';
    const TYPE_WARNING = 'warning';

    /**@var string $type color style of widget* */

    public $type = self::TYPE_DEFAULT;

    /**@var boolean $solid is solid box header* */
    public $solid = false;

    /**@var string $tooltip box -tooltip* */
    public $tooltip = '';

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

    private $cid = null;

    public function init()
    {
        $this->cid = 'bc_' . $this->getId();
        $this->registerJs();
        echo '<div class="box box-' . $this->type . (!$this->solid ? '' : ' box-solid') . '" id="' . $this->cid . '">'
            . (!$this->title && !$this->collapse && !$this->custom_tools
                ? ''
                : '<div class="box-header"'
                . (!$this->tooltip ? '' : 'data-toggle="tooltip" data-original-title="' . $this->tooltip . '"') . '>'
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
            $js = new JsExpression(
                'if($.cookie("' . $this->cid . '_state")==1){
                        var box = $("#' . $this->cid . '");
                        var bf = box.find(".box-body, .box-footer");
                        if (!box.hasClass("collapsed-box")) {
                            box.addClass("collapsed-box");
                            bf.slideUp();
                        }
                   }
                   $("[data-widget=\'collapse\']").click(function() {e.preventDefault();});
                   $("#' . $this->cid . '_btn").click(function(e){
                        e.preventDefault();
                        var box = $("#' . $this->cid . '");
                        var bf = box.find(".box-body, .box-footer");
                        if (!box.hasClass("collapsed-box")) {
                            box.addClass("collapsed-box");
                            $.cookie("' . $this->cid . '_state",1);
                            bf.slideUp();
                        } else {
                            box.removeClass("collapsed-box");
                            $.cookie("' . $this->cid . '_state",0);
                            bf.slideDown();
                        }
                   });
            '
            );
            $view->registerJs($js);
        }


    }
}
