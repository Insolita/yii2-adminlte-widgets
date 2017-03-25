<?php

namespace insolita\wgadminlte;

use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 *  Flash messages with AdminLte style and support multiple flash similar style
 *
 * @example
 *    add in layout
 *    <?=\insolita\wgadminlte\FlashAlerts::widget([]);?>
 *   In controllers
 *    Yii::$app->session->setFlash('warning','Message1',true);
 *    Yii::$app->session->setFlash('warning-order','Message2');
 *    Yii::$app->session->setFlash('info1','Message3',true);
 *    Yii::$app->session->setFlash('info2','Message4',true);
 */
class FlashAlerts extends Widget
{
    /**
     * @deprecated use LteConst instead
     */
    const TYPE_DANGER = 'danger';
    /**
     * @deprecated use LteConst instead
     */
    const TYPE_INFO = 'info';
    /**
     * @deprecated use LteConst instead
     */
    const TYPE_SUCCESS = 'success';
    /**
     * @deprecated use LteConst instead
     */
    const TYPE_WARNING = 'warning';
    
    /**@var boolean - Show close button for alert* */
    public $closable = true;
    
    /**@var boolean - Encode flash messages?* */
    public $encode = true;
    
    /**@var boolean - Wrap message in <b> tag?* */
    public $bold = true;
    
    public $successIcon = '<i class="fa fa-lg fa-smile-o"></i>';
    
    public $errorIcon = '<i class="fa fa-lg fa-frown-o"></i>';
    
    public $warningIcon = '<i class="fa fa-lg fa-volume-up"></i>';
    
    public $infoIcon = '<i class="fa fa-lg fa-info-circle"></i>';
    
    public $successTitle = 'Успешно!';
    
    public $errorTitle = 'Ошибка!';
    
    public $warningTitle = 'Внимание!';
    
    public $infoTitle = 'К сведению!';
    
    private $classes;
    
    private $styleParts;
    
    private $icons;
    
    /**
     * @var
     */
    private $titles;
    
    /**
     *
     */
    public function init()
    {
        $this->classes = ['success' => 'success', 'error' => 'danger', 'info' => 'info', 'warning' => 'warning'];
        $this->styleParts = array_keys($this->classes);
        $this->icons = [
            'success' => $this->successIcon,
            'error'   => $this->errorIcon,
            'info'    => $this->infoIcon,
            'warning' => $this->warningIcon,
        ];
        $this->titles = [
            'success' => $this->successTitle,
            'error'   => $this->errorTitle,
            'info'    => $this->infoTitle,
            'warning' => $this->warningTitle,
        ];
    }
    
    /**
     * @return string
     */
    public function run()
    {
        $allflash = \Yii::$app->session->getAllFlashes();
        $messages = '';
        foreach ($allflash as $key => $message) {
            $flashStyle = 'info';
            foreach ($this->styleParts as $kp) {
                if (strpos($key, $kp) !== false) {
                    $flashStyle = $kp;
                    break;
                }
            }
            
            Html::addCssClass($this->options, 'alert');
            Html::addCssClass($this->options, 'alert-' . ArrayHelper::getValue($this->classes, $flashStyle,'info'));
            if ($this->closable) {
                Html::addCssClass($this->options, 'alert-dismissable');
            }
            if (is_array($message)) {
                foreach ($message as $submess) {
                    $messages .= $this->buildMessage($flashStyle, $submess);
                }
            } elseif ($message) {
                $messages .= $this->buildMessage($flashStyle, $message);
            }
        }
        return $messages;
    }
    
    /**
     * @param $flashStyle
     * @param $text
     *
     * @return string
     */
    protected function buildMessage($flashStyle, $text)
    {
        $text = !$this->encode ? $text : Html::encode($text);
        return Html::tag(
            'div',
            ArrayHelper::getValue($this->icons, $flashStyle,'')
            . (!$this->closable ? ''
                : '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">
<i class="fa fa-times"></i></button>')
            . (isset($this->titles[$flashStyle]) ? Html::tag('b', $this->titles[$flashStyle]) : '') . ' '
            . (!$this->bold ? $text : Html::tag('b', $text))
            ,
            $this->options
        );
    }
    
}
