<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use App\JsonExporter\JsonExporter;
use App\XmlExporter\XmlExporter;
use App\Downloader\Downloader;


$r = new JsonExporter();
$json = $r->json(__DIR__ . '/name.xml');


$urls = ['laravel-news.com/feed/json', 'laravel-news.com/feed/json', 'laravel-news.com/feed/json'];
$exporter = new XmlExporter;
$client = new Downloader(new Client());
$urls = $client->download($urls);
$count = 0;
foreach ($urls as $url) {
    $response = json_decode($url, true);
    if (($response['version'] === "https://jsonfeed.org/version/1")) {
        $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        $exporter->arrayToXml($response, $xml_data);
        $result = $xml_data->asXML(__DIR__ . '/name' . $count . 'xml');
        $count++;
    } else {
        echo 'wrong version';
    }
}

