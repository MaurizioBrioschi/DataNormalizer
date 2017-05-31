<?php
namespace ridesoft\Normalizer\Tests\Configuration;

use PHPUnit\Framework\TestCase;
use ridesoft\Normalizer\Configuration\YamlConfiguration;

/**
 * Class YamlConfigurationTest
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
class YamlConfigurationTest extends TestCase
{
    /**
     * @test
     * @dataProvider    configurationFilesProviders
     */
    public function getDataSourceType($configurationFile)
    {
        $configuration = new YamlConfiguration($configurationFile);
        $this->assertNotNull($configuration->getDataSourceType());
    }

    /**
     * @test
     * @dataProvider    configurationFilesProviders
     */
    public function getMapping($configurationFile)
    {
        $configuration = new YamlConfiguration($configurationFile);
        $this->assertTrue(is_array($configuration->getMapping()));
    }

    /**
     * @test
     * @dataProvider    configurationFilesProviders
     */
    public function getSource($configurationFile)
    {
        $configuration = new YamlConfiguration($configurationFile);
        $this->assertNotNull($configuration->getSource());
    }

    public function configurationFilesProviders()
    {
        $objects = scandir(__DIR__.'/fixtures');
        $files = [];
        foreach ($objects as $object){
            echo $object;
            if('.'!==$object && '..'!==$object && 'yaml'==pathinfo($object, PATHINFO_EXTENSION)){
                $files[] = __DIR__.'/fixtures/'.$object;
            }
        }

        return [
            $files
        ];
    }
}