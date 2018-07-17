<?php

namespace Tests\JsonExporter;

use App\JsonExporter\JsonExporter;
use PHPUnit\Framework\TestCase;

class XmlExporterTest extends TestCase
{
    /** @test */
    public function test_convert_to_json()
    {
        $path ='C:\OSPanel\domains\localhost\exporter\src\XmlExporter\name.xml';
        $xml = new JsonExporter();
        $result = $xml->convertToJson($path);
        $actual = '{"version":"https:\/\/jsonfeed.org\/version\/1","items":{"item0":"item1","item1":"item2"}}';
        $this->assertSame($result, $actual);
    }
}
