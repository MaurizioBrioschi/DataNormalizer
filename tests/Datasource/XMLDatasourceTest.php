<?php
namespace ridesoft\Normalizer\Tests\Datasource;

use PHPUnit\Framework\TestCase;
use ridesoft\Normalizer\Datasource\XmlDataSource;

/**
 * Class XMLDatasourceTest
 *
 * PHP version 7.1
 *
 * @author    Maurizio Brioschi <maurizio.brioschi@ridesoft.org>
 * @copyright 2017 Maurizio Brioschi
 * @license   MIT   https://opensource.org/licenses/MIT
 * @link      https://github.com/MaurizioBrioschi
 *
 * (c) Maurizio Brioschi <maurizio.brioschi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class XMLDatasourceTest extends TestCase
{
    /**
     * @test
     * @dataProvider xmlFilesProviders
     *
     * @param $filePath
     */
    public function getContent($filePath)
    {
        $xmlDataSource = new XmlDataSource();
        $xmlDataSource->setSource($filePath);
        $this->assertTrue($xmlDataSource->getContent() instanceof \SimpleXMLElement);
    }

    /**
     * @test
     * @expectedException \ridesoft\Normalizer\Exception\DataSourceException
     */
    public function dataSourceNotSet()
    {
        $xmlDataSource = new XmlDataSource();
        $xmlDataSource->getContent();
    }

    /**
     * @test
     * @expectedException \ridesoft\Normalizer\Exception\DataSourceException
     */
    public function dataSourceException()
    {
        $xmlDataSource = new XmlDataSource();
        $xmlDataSource->setSource(__DIR__.'/fixtures/xmlFails.txt');
        $xmlDataSource->getContent();
    }

    public function xmlFilesProviders()
    {
        $objects = scandir(__DIR__.'/fixtures');
        $files = [];
        foreach ($objects as $object){
            echo $object;
            if('.'!==$object && '..'!==$object && 'xml'==pathinfo($object, PATHINFO_EXTENSION)){
                $files[] = __DIR__.'/fixtures/'.$object;
            }
        }

        return [
            $files
        ];
    }
}