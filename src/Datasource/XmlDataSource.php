<?php
namespace ridesoft\Normalizer\Datasource;

use ridesoft\Normalizer\Exception\DataSourceException;
use DOMDocument;

/**
 * Class XmlDataSource
 *
 * PHP version 7.1
 *
 * @author    Maurizio Brioschi <maurizio.brioschi@gmail.com>
 * @copyright 2017 Maurizio Brioschi
 * @license   MIT   https://opensource.org/licenses/MIT
 * @link      https://github.com/MaurizioBrioschi
 *
 * (c) Maurizio Brioschi <maurizio.brioschi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class XmlDataSource implements DataSourceInterface
{
    /** @var  string */
    protected $xmlFilePath;

    /**
     * {@inheritdoc}
     *
     * @return \SimpleXMLElement
     *
     * @throws DataSourceException
     */
    public function getContent(): \SimpleXMLElement
    {
        if (null === $this->xmlFilePath) {
            throw new DataSourceException('Xml file not set for XmlDataSource');
        }
        if($this->isXmlValid()) {
            return simplexml_load_file($this->xmlFilePath, \SimpleXMLElement::class);
        }
    }

    /**
     * Set the source for the data
     * This could be a mysql connection or a path to a file
     *
     * @param string $source
     *
     * @return DataSourceInterface
     */
    public function setSource(string $source): DataSourceInterface
    {
        $this->xmlFilePath = $source;
        return $this;
    }

    /**
     * Check if the XML is valid
     * @todo check against an xsd
     *
     * @return bool
     *
     * @throws DataSourceException
     */
    protected function isXmlValid()
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $doc->loadXML($this->xmlFilePath);
        $errors = libxml_get_errors();

        if(empty($errors)){
            return true;
        }
        throw new DataSourceException('File'.$this->xmlFilePath.' is not a valid xml:'.print_r($errors, true));
    }
}