<?php
/**
 * Created by solly [25.03.17 20:21]
 */

namespace insolita\wgadminlte;

use yii\web\View;
use yii\base\Widget;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * Class LteSetup - override default adminlte settings if you need
 * Register this widget with customized settings in layout
 *
 * @package insolita\wgadminlte
 */
class LteSetup extends Widget
{
    /**
     * Add slimscroll to navbar menus This requires you to load the slimscroll plugin in every page before app.js
     *
     * @see https://github.com/rochal/jQuery-slimScroll
     * @var bool
     */
    public $navbarMenuSlimscroll = true;
    
    /**
     * The width of the scroll bar
     *
     * @var string
     */
    public $navbarMenuSlimscrollWidth = "3px";
    
    /**
     * The height of the inner menu
     *
     * @var string
     */
    public $navbarMenuHeight = "200px";
    
    /**
     * General animation speed for JS animated elements such as box collapse/expand and sidebar treeview slide
     * up/down. This options accepts an integer as milliseconds,
     * //'fast', 'normal', or 'slow'
     *
     * @var int|string
     */
    public $animationSpeed = 500;
    
    /**
     * Sidebar push menu toggle button selector
     *
     * @var string
     */
    public $sidebarToggleSelector = "[data-toggle='offcanvas']";
    
    /**
     * Activate sidebar push menu
     *
     * @var bool
     */
    public $sidebarPushMenu = true;
    
    /**
     * Activate sidebar slimscroll if the fixed layout is set (requires SlimScroll Plugin)
     *
     * @var bool
     */
    public $sidebarSlimScroll = true;
    
    /**
     * Enable sidebar expand on hover effect for sidebar mini This option is forced to true if both the fixed layout
     * and sidebar mini are used together
     *
     * @var bool
     */
    public $sidebarExpandOnHover = false;
    
    /**
     * BoxRefresh Plugin
     *
     * @var bool
     */
    public $enableBoxRefresh = true;
    
    /**
     * Bootstrap.js tooltip
     *
     * @var bool
     */
    public $enableBSToppltip = true;
    
    /**
     * @var string
     */
    public $BSTooltipSelector = "[data-toggle='tooltip']";
    
    /**
     * Enable Fast Click. Fastclick.js creates a more native touch experience with touch devices.
     * If youchoose to enable the plugin, make sure you load the scriptbefore AdminLTE's app.js
     *
     * @var bool
     */
    public $enableFastclick = true;
    
    /**
     * Control Sidebar Tree Views
     *
     * @var bool
     */
    public $enableControlTreeView = true;
    
    /**
     * Control Sidebar Options
     *
     * @var array
     */
    public $controlSidebarOptions
        = [
            'toggleBtnSelector' => "[data-toggle='control-sidebar']",
            'selector'          => ".control-sidebar",
            'slide'             => true,
        ];
    
    /**
     * Box Widget Plugin. Enable this plugin to allow boxes to be collapsed and/or removed
     *
     * @var bool
     */
    public $enableBoxWidget = true;
    
    /**
     * Box Widget plugin options
     *
     * @var array
     */
    public $boxWidgetOptions
        = [
            'boxWidgetIcons'     => [
                //Collapse icon
                'collapse' => 'fa-minus',
                //Open icon
                'open'     => 'fa-plus',
                //Remove icon
                'remove'   => 'fa-times',
            ],
            'boxWidgetSelectors' => [
                //Remove button selector
                'remove'   => '[data-widget="remove"]',
                //Collapse button selector
                'collapse' => '[data-widget="collapse"]',
            ],
        ];
    
    /**
     * Direct Chat plugin options
     *
     * @var array
     */
    public $directChat
        = [
            'enable'                => true,
            'contactToggleSelector' => '[data-widget="chat-pane-toggle"]',
        ];
    
    /**
     * Define the set of colors to use globally around the website
     *
     * @var array
     */
    public $colors
        = [
            'lightBlue' => "#3c8dbc",
            'red'       => "#f56954",
            'green'     => "#00a65a",
            'aqua'      => "#00c0ef",
            'yellow'    => "#f39c12",
            'blue'      => "#0073b7",
            'navy'      => "#001F3F",
            'teal'      => "#39CCCC",
            'olive'     => "#3D9970",
            'lime'      => "#01FF70",
            'orange'    => "#FF851B",
            'fuchsia'   => "#F012BE",
            'purple'    => "#8E24AA",
            'maroon'    => "#D81B60",
            'black'     => "#222222",
            'gray'      => "#d2d6de",
        ];
    
    /**
     * The standard screen sizes that bootstrap uses.If you change these in the variables.less file, change them here
     * too.
     *
     * @var array
     */
    public $screenSize
        = [
            'xs' => 480,
            'sm' => 768,
            'md' => 992,
            'lg' => 1200,
        ];
    
    public function init()
    {
        parent::init();
        $options = get_object_vars($this);
        $this->getView()->registerJs(
            new JsExpression('var AdminLTEOptions = ' . Json::encode(get_object_vars($this))),
            View::POS_HEAD
        );
    }
}
