<?php
/**
 * Created by PhpStorm.
 * User: Insolita
 * Date: 11.11.14
 * Time: 4:53
 */

namespace insolita\wgadminlte;

/**
 * It`s Example Customization TimelineItem Object
 **/

class ExampleTimelineItem extends TimelineItem {

    public $type='';

    public function init(){
        if(!$this->iconClass){
            $this->setIconClass();
        }
        if(!$this->iconBg){
            $this->setIconBg();
        }
        $this->setTime();
    }
    public function setTime(){
        $this->time= date('H:i',$this->time);
    }

    public function setIconClass(){
        $this->iconClass= $this->type==1?'fa fa-bomb':'fa fa-cloud';
    }

    public function setIconBg(){
        $m=date('n',$this->time);
        if($m==12 or ($m >=1 && $m <3)){
            $this->iconBg= Timeline::TYPE_AQUA;
        }elseif($m<=3 && $m<6){
            $this->iconBg=  Timeline::TYPE_LIME;
        }elseif($m<=6 && $m<9){
            $this->iconBg=  Timeline::TYPE_GREEN;
        }else{
            $this->iconBg=  Timeline::TYPE_ORANGE;
        }
    }
} 