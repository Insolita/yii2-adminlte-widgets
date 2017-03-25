<?php

namespace insolita\wgadminlte;

use yii\bootstrap\Widget;
use yii\helpers\Html;

/**
 * LteChatMessage
 *
 * @example
 * <?php
 * echo LteChatBox::begin(['type'=>'info']);
 * echo LteChatMessage::widget([
 * 'author'=>'Jane Smith',
 * 'message'=>'Hi guys! How are you?',
 * 'image'=>'http://site.ru/images/123.jpg',
 * 'imageAlt'=>'some text',
 * 'createdAt'=>'2017-03-29 23:33',
 * 'isRight'  =>false
 * ']);
 * echo LteChatMessage::widget([
 * 'author'=>'Artur Green',
 * 'message'=>'Look this cool video',
 * 'image'=>'http://site.ru/images/321.jpg',
 * 'createdAt'=>'2017-03-29 23:18',
 * 'isRight'  =>true
 * ']);
 * echo LteChatBox::end();
 * ?>
 *
 */
class LteChatMessage extends Widget
{
    
    /**
     * @var string
     */
    public $author = '';
    
    /**
     * @var string
     */
    public $message = '';
    
    /**
     * @var string
     */
    public $image = '';
    
    /**
     * @var string - alternative image text
     */
    public $imageAlt = '';
    
    /**
     * @var string
     */
    public $createdAt;
    
    /**
     * @var bool right-oriented
     */
    public $isRight = false;
    
    /**
     * @var string
     */
    public $template
        = <<<HTML
<div {options}>
        <div class="direct-chat-info clearfix">
          <span class="direct-chat-name pull-{direction1}">{author}</span>
          <span class="direct-chat-timestamp pull-{direction2}">{createdAt}</span>
        </div>
        <img class="direct-chat-img" src="{image}" alt="{imageAlt}">
        <div class="direct-chat-text">
          {message}
        </div>
</div>
HTML;
    
    /**
     * @return string
     */
    public function run()
    {
        Html::addCssClass($this->options, 'direct-chat-msg');
        if($this->isRight){
            Html::addCssClass($this->options, 'right');
        }
        
        return strtr(
            $this->template,
            [
                '{options}' => Html::renderTagAttributes($this->options),
                '{author}'   => $this->author,
                '{message}'    => $this->message,
                '{createdAt}'  => $this->createdAt,
                '{image}'    => $this->image,
                '{imageAlt}'    => $this->imageAlt,
                '{direction1}' =>$this->isRight?'right':'left',
                '{direction2}' =>$this->isRight?'left':'right',
            ]
        );
    }
    
}
