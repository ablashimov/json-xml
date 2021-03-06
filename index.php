<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use App\JsonExporter\JsonExporter;
use App\XmlExporter\XmlExporter;
use App\Downloader\Downloader;

$urls = ['laravel-news.com/feed/json', 'laravel-news.com/feed/json', 'laravel-news.com/feed/json'];

$exporter = new XmlExporter;
$client = new Downloader(new Client());
/*

$urls = $client->download($urls);

foreach ($urls as $content) {
    $json = json_decode($content, true);
    $exporter->createXML($json);
}
*/

$convert = new JsonExporter();
$json = $convert->convertToJson('C:\OSPanel\domains\localhost\exporter\src\XmlExporter\name.xml');
var_dump($json);
