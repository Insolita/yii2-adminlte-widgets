<?php

namespace insolita\wgadminlte;

use yii\bootstrap\Widget;
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
    const TYPE_DANGER = 'danger';
    const TYPE_INFO = 'info';
    const TYPE_SUCCESS = 'success';
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
    
    private $_classes;
    
    private $_keyparts;
    
    private $_icons;
    
    private $_titles;
    
    public function init()
    {
        $this->_classes = ['success' => 'success', 'error' => 'danger', 'info' => 'info', 'warning' => 'warning'];
        $this->_keyparts = array_keys($this->_classes);
        $this->_icons = [
            'success' => $this->successIcon,
            'error'   => $this->errorIcon,
            'info'    => $this->infoIcon,
            'warning' => $this->warningIcon,
        ];
        $this->_titles = [
            'success' => $this->successTitle,
            'error'   => $this->errorTitle,
            'info'    => $this->infoTitle,
            'warning' => $this->warningTitle,
        ];
    }
    
    public function run()
    {
        $allflash = \Yii::$app->session->getAllFlashes();
        $msg = '';
        foreach ($allflash as $key => $mess) {
            $fk = 'info';
            foreach ($this->_keyparts as $kp) {
                if (strpos($key, $kp) !== false) {
                    $fk = $kp;
                    break;
                }
            }
            
            Html::addCssClass($this->options, 'alert');
            Html::addCssClass($this->options, 'alert-' . $this->_classes[$fk]);
            if ($this->closable) {
                Html::addCssClass($this->options, 'alert-dismissable');
            }
            if (is_array($mess)) {
                foreach ($mess as $submess) {
                    $msg .= $this->buildMessage($fk, $submess);
                }
            } elseif ($mess) {
                $msg .= $this->buildMessage($fk, $mess);
            }
        }
        return $msg;
    }
    
    protected function buildMessage($fk, $text)
    {
        $text = !$this->encode ? $text : Html::encode($text);
        return Html::tag(
            'div',
            $this->_icons[$fk]
            . (!$this->closable ? ''
                : '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>')
            . ($this->_titles[$fk] ? Html::tag('b', $this->_titles[$fk]) : '') . ' '
            . (!$this->bold ? $text : Html::tag('b', $text))
            ,
            $this->options
        );
    }
    
}
