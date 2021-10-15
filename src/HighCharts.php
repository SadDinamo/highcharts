<?php
namespace saddinamo\highcharts;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * HighCharts widget renders a HighCharts JS chart
 *
 * @author SadDinamo <SadDinamo@gmail.com>
 * @package saddinamo\highcharts
 */
class HighCharts1 extends Widget
{
    /**
     * @var array the HTML attributes for the links container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /**
     * @var array the options for the HighCharts plugin. Default options have exporting enabled.
     * Please refer to the HighCharts plugin Web page for possible options.
     * @see http://api.highcharts.com/highcharts
     */
    public $clientOptions = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        $this->clientOptions = ArrayHelper::merge(
            [
                'exporting' => [
                    'enabled' => true
                ]
            ],
            $this->clientOptions
        );
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (empty($this->_renderTo)) {
            echo Html::tag('div', '', $this->options);
            $this->clientOptions['chart']['renderTo'] = $this->options['id'];
        }
        // $this->registerClientScript();
    }

    /**
     * Registers the script for the plugin
     */
    // public function registerClientScript()
    // {
    //     $view = $this->getView();

    //     $bundle = HighChartsAsset::register($view);
    //     $id = str_replace('-', '_', $this->options['id']);
    //     $options = $this->clientOptions;

    //     if ($this->enable3d) {
    //         $bundle->js[] = YII_DEBUG ? 'highcharts-3d.src.js' : 'highcharts-3d.js';
    //     }

    //     if ($this->enableMore) {
    //         $bundle->js[] = YII_DEBUG ? 'highcharts-more.src.js' : 'highcharts-more.js';
    //     }

    //     foreach ($this->modules as $module) {
    //         $bundle->js[] = "modules/{$module}";
    //     }

    //     if ($theme = ArrayHelper::getValue($options, 'theme')) {
    //         $bundle->js[] = "themes/{$theme}.js";
    //     }

    //     $options = Json::encode($options);

    //     $view->registerJs(";var highChart_{$id} = new Highcharts.Chart({$options});");
    // }
}
