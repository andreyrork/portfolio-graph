<?php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

date_default_timezone_set('Europe/Moscow');

$app = new Silex\Application();

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }

    $json = '{
        "type": "pamm",
        "startDate": "2014-03-01",
        "endDate": "2014-04-01",
        "currency": [
            "rur",
            "usd"
        ],
        "query": [
            {
                "broker": "panteon",
                "pamm": "123456"
            },
            {
                "broker": "fxtrend",
                "pamm": "654321"
            }
        ]
    }';

    $request->request->replace(json_decode($json, true));
});


/**

JSON, который приходит на вход:
{
    "type": "pamm",
    "startDate": "2014-03-01",
    "endDate": "2014-04-01",
    "currency": [
        "rur",
        "usd"
    ],
    "query": [
        {
            "broker": "panteon",
            "pamm": "123456"
        },
        {
            "broker": "fxtrend",
            "pamm": "654321"
        }
    ]
}

*/


$app->get('/api', function (Request $request) use ($app) {
    $type       = $request->request->get('type');
    $startDate  = $request->request->get('startDate');
    $endDate    = $request->request->get('endDate');
    $currencies = $request->request->get('currency');
    $query      = $request->request->get('query');

    $config     = new Masterfolio\Config(include 'config.php');
    switch ($type) {
        case 'broker' :
            $active = new Masterfolio\Broker($config);
            break;
        case 'pamm' :
            $active = new Masterfolio\Pamm($config);
            $active->setId(74478);
            $active->setName('Sven');
            break;
        case 'full' :
        default :
            $active = new Masterfolio\Portfolio($config);
            break;
    }


    $json = [];
    foreach ([$active] as $active) {
        $data = ['name' => $active->getName()];

        foreach ($currencies as $currency) {

            $timestamp = strtotime($startDate);
            $endOfTime = strtotime($endDate);

            $activeData = [];
            while ($timestamp < $endOfTime) {
                $date = date('Y-m-d', $timestamp);
                $activeData[] = [
                    "date"   => $date,
                    "value"  => $active->getProfit($date, $currency),
                    //"volume" => $active->getVolume($date, $currency),
                ];

                $timestamp += 86400;
            }

            $data[$currency] = $activeData;
        }

        $json[] = $data;
    }


    return $app->json($json, 201);
});

$app->run();


