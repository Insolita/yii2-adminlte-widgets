<?php

namespace insolita\wgadminlte;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * This is just an example.
 */
class Timeline extends Widget
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

    /**@var [] $items array of events
     *
     * @example
     *  'items'=>[
     *     '07.10.2014'=>[array of TimelineItems ],
     *     'some object'=>[array of TimelineItems ],
     *     '15.11.2014'=>[array of TimelineItems ],
     *     'some object'=>[array of TimelineItems ],
     *  ]
     *
     **/
    public $items = [];


    /**
     * string|\Closure that return string
     *
     * @example
     * 'defaultDateBg'=>function($data){
     *      if(is_string($data)){
     *          return insolita\wgadminlte\Timeline::TYPE_BLUE;
     *      }elseif($data->type==1){
     *          return insolita\wgadminlte\Timeline::TYPE_LBLUE;
     *      }else{
     *         return insolita\wgadminlte\Timeline::TYPE_TEAL;
     *      }
     * }
     **/
    public $defaultDateBg = self::TYPE_GREEN;

    /** callable function(obj) for prepare data
     *
     * @example
     * 'dateFunc'=>function($data){
     *     return date('d/m/Y', $data)
     * }
     *
     * @example
     * 'dateFunc'=>function($data){
     *     return is_object($data)?date('d/m/Y', $data->created):$data;
     * }
     *
     **/
    public $dateFunc = null;

    /**
     * If true, only list items without wrapper will be rendered
     * @var bool
     */
    public $itemsOnly = false;


    public function run()
    {
        if ($this->itemsOnly) {
            echo $this->renderItems();
        } else {
            echo Html::tag('ul', $this->renderItems(), ['class' => 'timeline', 'id' => $this->getId()]);
        }
    }

    public function renderItems()
    {
        $res = '';
        if (!empty($this->items)) {
            foreach ($this->items as $data => $events) {
                if (!empty($events)) {
                    $res .= $this->renderGroup($data);
                    foreach ($events as $event) {
                        $res .= $this->renderEvent($event);
                    }
                }
            }
        }
        return $res;
    }

    public function renderGroup($data)
    {
        $res = '';
        $realdata = is_null($this->dateFunc) ? $data : call_user_func($this->dateFunc, $data);
        if (is_string($this->defaultDateBg)) {
            $res = Html::tag('span', $realdata, ['class' => 'bg-' . $this->defaultDateBg]);
        } elseif (is_callable($this->defaultDateBg)) {
            $class = call_user_func($this->defaultDateBg, $data);
            $res = Html::tag('span', $realdata, ['class' => 'bg-' . $class]);
        }
        return Html::tag('li', $res, ['class' => 'time-label']);
    }

    public function renderEvent($ev)
    {
        $res = '';
        if ($ev instanceof TimelineItem) {
            $res .= '<i class="' . $ev->iconClass . ' bg-' . $ev->iconBg . '"></i>';
            $item = '';
            $clockIcon = $ev->showClockIcon ? Html::tag('i', '', ['class' => 'fa fa-clock-o']) . ' ' : '';
            if ($ev->time) {
                $item .= Html::tag('span', $clockIcon . $ev->time, ['class' => 'time']);
            }
            if ($ev->header) {
                $item .= Html::tag(
                    'h3',
                    $ev->header,
                    ['class' => 'timeline-header ' . (!$ev->body && !$ev->footer ? 'no-border' : '')]
                );
            }
            $item .= Html::tag('div', $ev->body, ['class' => 'timeline-body']);
            if ($ev->footer) {
                $item .= Html::tag('div', $ev->footer, ['class' => 'timeline-footer']);
            }
            $res .= Html::tag('div', $item, ['class' => 'timeline-item']);
        } else {
            throw new InvalidConfigException('event must be instanceof TimelineItem');
        }
        return Html::tag('li', $res);
    }
}

