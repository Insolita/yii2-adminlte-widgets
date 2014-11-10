Timeline Widget
===========================

example -  http://www.bootstrapstage.com/demo/admin-lte/pages/UI/timeline.html

Usage
------


```
<?= \insolita\wgadminlte\Timeline::widget(
        [
            'defaultDateBg' => \insolita\wgadminlte\Timeline::TYPE_PURPLE, //default background for deate label
            'items' => [
					'1381767094'=>[
					     Yii::createObject(
                                     [
                                         'class' => \insolita\wgadminlte\TimelineItem::className(),
                                         'time' => 1381767094,
                                         'header' =>'SOME HEADER',
                                         'body' => 'Well, i`m informative body'
                                         'iconClass'=>'fa fa-beer',
                                         'iconBg'=>'orange'
                                     ]
                                 ),
                         Yii::createObject(
                                      [
                                          'class' => \insolita\wgadminlte\TimelineItem::className(),
                                          'time' => 1381767098,
                                          'header' =>'SOME HEADER',
                                          'iconClass'=>'fa fa-beer',
                                          'iconBg'=>'green'
                                      ]
                                          )

					],
					'1400880100'=>[
					      Yii::createObject(
                                    [
                                        'class' => \insolita\wgadminlte\TimelineItem::className(),
                                        'time' => 1400880100,
                                        'body' => 'Well, i`m informative body'
                                        'iconClass'=>'fa fa-cloud',
                                        'iconBg'=>insolita\wgadminlte\Timeline::TYPE_BLUE'
                                    ]
                                ),
                                 ],
				    '1353182717'=>[....],
					'1331361126'=>[....],
            ],
            'dataFunc' => function ($data) { return date('d.m, Y', $data); }
        ]
    ) ?>
```

Example TimeLine Generator

```
<?php
$timeline_items=[];
for ($i = 0; $i < 5; $i++) {
    $time = (time() - mt_rand(3600, 3600 * 24 * 7 * 30 * 5));
    $objcnt = mt_rand(1, 6);
    $events = [];
    for ($j = 0; $j < $objcnt; $j++) {
        $isFoot = mt_rand(0, 1);
        $footer='something in foot '.$i.'_'.$j;
        $obj = Yii::createObject(
            [
                'class' => \insolita\wgadminlte\ExampleTimelineItem::className(),  //Example of customization TimelineItem Object
                'time' => $time - mt_rand(0, 3600 * 11),
                'header' =>'HEADER NUMBER '.$i.'_'.$j,
                'body' => 'Well, i`m informative body '.$i.'_'.$j,
                'type' => mt_rand(0, 1),
                'footer' => $isFoot?$footer:''
            ]
        );
        $events[] = $obj;
    }
    $timeline_items[$time] = $events;
}


//Next we can show its in our widget

echo \insolita\wgadminlte\Timeline::widget(
             [
                 'defaultDateBg' => function ($data) {
                     $d = date('j', $data);
                     if ($d <= 10) {
                         return \insolita\wgadminlte\Timeline::TYPE_FUS;
                     } elseif ($d <= 20) {
                         return \insolita\wgadminlte\Timeline::TYPE_MAR;
                     } else {
                         return \insolita\wgadminlte\Timeline::TYPE_PURPLE;
                     }
                 },
                 'items' => $timeline_items,
                 'dateFunc' => function ($data) { return date('d.m, Y', $data); }
             ]
         )

```