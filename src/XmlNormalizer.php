<?php
namespace ridesoft\Normalizer;

use ridesoft\Normalizer\Datasource\DataSourceInterface;
use ridesoft\Normalizer\Datasource\XmlDataSource;
use ridesoft\Normalizer\Exception\IncompatibleDataTypeException;
use ridesoft\Normalizer\Mapping\MappingInterface;

/**
 * Class XmlNormalizer
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
class XmlNormalizer extends AbstractNormalizer
{
    /** @var  XmlDataSource */
    protected $dataSource;
    /** @var  MappingInterface */
    protected $mapping;

    /**
     * Normalize data
     *
     * @return array normalized array
     */
    function normalize(): array
    {
        /** @var \SimpleXMLElement $content */
        $content = $this->dataSource->getContent();
        //here the logic to normalize xml to php array using the mapping
    }

    /**
     * @param MappingInterface $mapping
     *
     * @return NormalizerInterface
     */
    function setMapping(MappingInterface $mapping): NormalizerInterface
    {
        $this->mapping = $mapping;
    }

    /**
     * @param  DataSourceInterface $data
     *
     * @return NormalizerInterface
     *
     * @throws IncompatibleDataTypeException
     */
    function setDataToNormalize(DataSourceInterface $data): NormalizerInterface
    {
        if ($data instanceof XmlDataSource) {
            $this->dataSource = $data;
        }
        throw new IncompatibleDataTypeException('XmlDataSource object required');
    }
}