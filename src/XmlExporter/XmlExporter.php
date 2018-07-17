<?php

namespace App\XmlExporter;

use SimpleXMLElement;

class XmlExporter
{
    public function createXML(array $content): void
    {
        if (($content['version'] === "https://jsonfeed.org/version/1")) {
            $xml_data = new SimpleXMLElement('<news></news>');
            $this->arrayToXml($content, $xml_data);
            $xml_data->asXML(__DIR__ . '/name.xml');
        } else {
            echo 'wrong version';
        }

    }

    public function arrayToXml(array $content, SimpleXMLElement &$xml_data): void
    {
        foreach ($content as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item' . $key;
            }
            if (is_array($value)) {
                $subnode = $xml_data->addChild($key);
                $this->ArrayToXml($value, $subnode);
                continue;
            }
            $xml_data->addChild("$key", htmlspecialchars("$value"));
        }
    }
}