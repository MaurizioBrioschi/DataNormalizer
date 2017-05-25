<?php
namespace ridesoft\Normalizer;

use MongoDB\Driver\Exception\ConnectionException;
use ridesoft\Normalizer\Configuration\ConfigurationInterface;
use ridesoft\Normalizer\Configuration\YamlConfiguration;
use ridesoft\Normalizer\Datasource\XmlDataSource;
use ridesoft\Normalizer\Exception\ConfigurationException;
use ridesoft\Normalizer\Exception\NormalizerNotSupportedException;
use ridesoft\Normalizer\Mapping\ArrayMapping;
use ridesoft\Normalizer\Mapping\ConfigurationFileMapping;

/**
 * Class AbstractFactoryNormalizer
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
abstract class AbstractNormalizerFactory
{
    /** @var  string */
    protected $configurationfile;

    /** @var  ConfigurationInterface */
    protected $configuration;

    /** @var  XmlNormalizer */
    protected $xmlNormalizer;

    public function gerNormalizer(): NormalizerInterface
    {
        if(null===$this->configurationfile){
            throw new ConnectionException('Configuration file not set');
        }

        switch (strtolower($this->getConfiguration()->getDataSourceType())){
            case 'xml';
                if(null===$this->xmlNormalizer){
                    $this->xmlNormalizer = new XmlNormalizer();
                    /** @var XmlDataSource $dataSource */
                    $dataSource = new XmlDataSource();
                    $dataSource->setSource($this->configuration->getSource());
                    $this->xmlNormalizer->setMapping(
                        new ArrayMapping($this->getConfiguration()->getMapping()))
                        ->setDataToNormalize($dataSource);
                }
                return $this->xmlNormalizer;
            default:
                throw new NormalizerNotSupportedException();
        }
    }



    /**
     * Set the configuration file path
     *
     * @param string $configurationPath
     *
     * @return $this
     *
     * @throws ConfigurationNotFoundException
     */
    public function setConfigurationFile(string $configurationPath)
    {
        if(!file_exists($configurationPath)){
            throw new ConfigurationException('Configuration file not fout at '.$configurationPath);
        }
        $this->configurationfile = $configurationPath;
        return $this;
    }

    /**
     * @return ConfigurationInterface
     */
    public function getConfiguration():  ConfigurationInterface
    {
        if(null===$this->configuration){
            $extension = pathinfo($this->configurationfile, PATHINFO_EXTENSION);
            switch (strtolower($extension)){
                case 'yaml':
                    $this->configuration = new YamlConfiguration($this->configurationfile);
                    break;
                default:
                    throw new ConfigurationException('Configuration file type not supported');
            }
        }
        return $this->configuration;
    }
}