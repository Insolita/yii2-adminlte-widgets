<?php
/**
 * Created by solly [26.03.17 0:30]
 */

namespace insolita\wgadminlte;

use yii\helpers\Html;

/**
 * Class LteChatBox
 * @example
 * <?php
 * echo LteChatBox::begin(['type'=>'info']);
 * 
 * echo LteChatMessage::widget([
 * 'author'=>'Jane Smith',
 * 'message'=>'Hi guys! How are you?',
 * 'image'=>'http://site.ru/images/123.jpg',
 * 'imageAlt'=>'some text',
 * 'createdAt'=>'2017-03-29 23:33',
 * 'isRight'  =>false
 * ']);
 *
 * echo LteChatMessage::widget([
 * 'author'=>'Artur Green',
 * 'message'=>'Look this cool video',
 * 'image'=>'http://site.ru/images/321.jpg',
 * 'createdAt'=>'2017-03-29 23:18',
 * 'isRight'  =>true
 * ']);
 *
 * echo LteChatBox::end();
 * ?>
 * @package insolita\wgadminlte
 */
class LteChatBox extends LteBox
{
    /**
     * @var string
     */
    public $topTemplate
        = <<<HTML
<div {options}>
<div {headerOptions}><h3 class="box-title">{title}</h3>{box-tools}</div>
<div class="box-body">
<div class="direct-chat-messages">
HTML;
    
    /**
     * @var string
     */
    public $bottomTemplate
        = <<<HTML
</div>
</div>
<div class="box-footer {footerOptions}">{footer}</div>
</div>
HTML;
    /**
     *
     */
    public function init()
    {
        Html::addCssClass($this->options,'direct-chat');
        Html::addCssClass($this->options,'direct-chat-'.$this->type);
        parent::init();
    }
}
