<?php
/**
 * Created by solly [25.03.17 17:44]
 */

namespace insolita\wgadminlte;

use yii\bootstrap\ButtonGroup;
use yii\helpers\Html;

/**
 * Class CollapseBox
 *
 * @package insolita\wgadminlte
 */
class CollapseBox extends LteBox
{
    
    /**
     * @var string
     */
    public $collapsIconClass = "fa-minus";
    
    /**
     * @var string
     */
    public $expandIconClass = "fa-plus";
    
    /**
     * @var boolean $collapseRemember - set cookies for rememer collapse stage*
     */
    public $collapseRemember = false;
    
    /**
     * @var boolean $collapseDefault - show in collapsed mode inititally
     */
    public $collapseDefault = true;
    
    public $collapseButtonTemplate
        = <<<HTML
<button class="btn btn-{type} btn-xs" data-widget="collapse" id="{uniq}_btn"><i class="fa {iconClass}"></i></button>
HTML;
    
    protected $uniqId;
    
    /**
     *
     */
    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->uniqId = $this->options['id'] = 'bc_' . $this->getId();
        }
        if ($this->collapseDefault and !$this->collapseRemember) {
            Html::addCssClass($this->options, 'collapsed-box');
        }
        if($this->collapseRemember){
            Html::addCssClass($this->options, 'remember');
        }
        $this->registerJs();
        parent::init();
    }
    
    /**
     *
     */
    public function run()
    {
        parent::run();
    }
    
    protected function registerJs()
    {
        if ($this->collapseRemember) {
            $view = $this->getView();
            JsCookieAsset::register($view);
            CollapseBoxAsset::register($view);
        }
    }
    
    /**
     * @return string
     */
    protected function prepareBoxTools()
    {
        $boxTools = '';
        $collapseButton = strtr(
            $this->collapseButtonTemplate,
            [
                '{type}'      => $this->type,
                '{uniq}'      => $this->uniqId,
                '{iconClass}' => ($this->collapseDefault && !$this->collapseRemember) ? $this->expandIconClass :
                    $this->collapsIconClass,
            ]
        );
        if (!empty($this->boxTools)) {
            if (is_array($this->boxTools)) {
                $boxTools[] = $collapseButton;
                $boxTools = ButtonGroup::widget(
                    [
                        'buttons'      => $this->boxTools,
                        'encodeLabels' => false,
                    ]
                );
            } else {
                $boxTools = $this->boxTools . $collapseButton;
            }
        } else {
            $boxTools = $collapseButton;
        }
        return Html::tag('div', $boxTools, ['class' => 'box-tools pull-right']);
    }
}
