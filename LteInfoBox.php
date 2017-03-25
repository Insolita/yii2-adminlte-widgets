<?php
/**
 * Created by solly [25.03.17 21:53]
 */

namespace insolita\wgadminlte;

use yii\bootstrap\Widget;

/**
 * Class LteInfoBox
 *
 * @package insolita\wgadminlte
 */
class LteInfoBox extends Widget
{
    /**
     * @var string
     */
    public $icon = 'fa fa-bullhorn';
    
    /**
     * @var string
     */
    public $bgIconColor = LteConst::COLOR_BLUE;
    /**
     * if empty -  content block will be white
     * @var string
     */
    public $bgColor = '';
    /**
     * @var
     */
    public $text;
    
    /**
     * @var
     */
    public $number;
    
    /**
     * @var bool
     */
    public $showProgress = false;
    
    /**
     * @var string
     */
    public $description = '';
    
    /**
     * @var int
     */
    public $progressNumber = 0;
    
    /**
     * @var string
     */
    public $template
        = <<<HTML
<div class="info-box {bgColor}">
  <span class="info-box-icon {bgIconColor}">{icon}</span>
  <div class="info-box-content">
    <span class="info-box-text">{text}</span>
    <span class="info-box-number">{number}</span>
    {progress}
  </div>
</div>
HTML;
    
    /**
     * @var string
     */
    public $progressTemplate
        = <<<HTML
<div class="progress">
      <div class="progress-bar {options}" style="width: {number}% "></div>
    </div>
    <span class="progress-description">
      {text}
    </span>
HTML;
    
    
    public function init(){
        parent::init();
    }
    /**
     * @return string
     */
    public function run()
    {
        $progress = '';
        if ($this->showProgress) {
            $progress = strtr(
                $this->progressTemplate,
                [
                    '{number}' => $this->progressNumber,
                    '{text}'   => $this->description,
                    '{options}'=>!$this->bgColor?'bg-'.$this->bgIconColor:''
                ]
            );
        }
        
        return strtr(
            $this->template,
            [
                '{icon}'     => '<i class="'.$this->icon.'"></i>',
                '{text}'     => $this->text,
                '{bgColor}'  => $this->bgColor?'bg-'.$this->bgColor:'',
                '{bgIconColor}'  => $this->bgIconColor?'bg-'.$this->bgIconColor:'',
                '{number}'   => $this->number,
                '{progress}' => $progress?:$this->description,
            ]
        );
    }
    
}
