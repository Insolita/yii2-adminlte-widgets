<?php

namespace insolita\wgadminlte;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\web\JsExpression;

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


    /**@var boolean $withBorder add border after box header (for AdminLte 2.0)**/
    public $withBorder = false;

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

    public $header_tag='h3';


    private $_cid = null;

    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->_cid =$this->options['id'] = 'bc_'.$this->getId();
        }
        $this->registerJs();
        Html::addCssClass($this->options,'box');
        Html::addCssClass($this->options,'box-' . $this->type);
        if($this->solid){
            Html::addCssClass($this->options,'box-solid');
        }

        $custTools=($this->collapse?
                '<button class="btn btn-'.$this->type.' btn-xs" data-widget="collapse" id="'. $this->_cid . '_btn"><i class="fa fa-minus"></i></button>'
                :'').$this->custom_tools;
        $custTools=Html::tag('div',$custTools,['class'=>'box-tools pull-right']);

        $headerContent=(!$this->left_tools?'':'<div class="box-tools pull-left">'.$this->left_tools.'</div>');
        $headerContent.=(!$this->title ? '' : Html::tag($this->header_tag,$this->title,['class'=>'box-title']));
        $headerContent.=($this->custom_tools||$this->collapse)?$custTools:'';

        $headerOptions=['class'=>'box-header'];
        if($this->withBorder){
           Html::addCssClass($headerOptions,'with-border');
        }
        if($this->tooltip){
            $headerOptions=array_merge($headerOptions,[
                    'data-toggle'=>'tooltip',
                    'data-original-title'=>$this->tooltip,
                    'data-placement'=>$this->tooltip_placement
                ]);
        }
        $header=Html::tag('div',$headerContent,$headerOptions);


        echo '<div '.Html::renderTagAttributes($this->options).'>'
            . (!$this->title && !$this->collapse && !$this->custom_tools && !$this->left_tools
                ? ''
                : $header)
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
