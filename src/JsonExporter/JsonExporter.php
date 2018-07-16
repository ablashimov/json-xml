<?php

namespace App\JsonExporter;


class JsonExporter
{
    public function convertToJson($xml)
    {
        $fileContents = file_get_contents($xml);
        $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
        $fileContents = trim(str_replace('"', "'", $fileContents));
        $simpleXml = simplexml_load_string($fileContents);
        $json = json_encode($simpleXml);

        return $json;
    }
}