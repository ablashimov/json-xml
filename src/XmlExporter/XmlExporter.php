<?php

namespace App\XmlExporter;

use SimpleXMLElement;

class XmlExporter
{
    public function createXML($json)
    {
        $response = json_decode($json, true);
        if (($response['version'] === "https://jsonfeed.org/version/1")) {
            $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
           $this->arrayToXml($response, $xml_data);
            $xml_data->asXML(__DIR__ . '/phpunit.xml');
        } else {
            echo 'wrong version';
        }

    }
    public function arrayToXml($data, &$xml_data)
    {
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item' . $key; //dealing with <0/>..<n/> issues
            }
            if (is_array($value)) {
                $subnode = $xml_data->addChild($key);
                $this->ArrayToXml($value, $subnode);
            } else {
                $xml_data->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}