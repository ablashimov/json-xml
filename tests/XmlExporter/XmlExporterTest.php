<?php

namespace Tests\XmlExporter;

use App\XmlExporter\XmlExporter;
use PHPUnit\Framework\TestCase;

class XmlExporterTest extends TestCase
{
    /** @test */
    public function test_create_xml()
    {
        $content = [
            'version' => 'https://jsonfeed.org/version/1',
            'items' => [
                'item1',
                'item2'
            ]
        ];
        $expected = "<?xml version=\"1.0\"?>\n" .
            "<news>" .
            "<version>https://jsonfeed.org/version/1</version>" .
            "<items>" .
            "<item0>item1</item0>" .
            "<item1>item2</item1>" .
            "</items>" .
            "</news>\n";
        $xml = new XmlExporter();
        $xml->createXML($content);
        $actual = file_get_contents('C:\OSPanel\domains\localhost\exporter\src\XmlExporter\name.xml');
        $this->assertSame($expected, $actual);
    }
}
