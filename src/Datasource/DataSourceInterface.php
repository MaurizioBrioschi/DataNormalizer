<?php
namespace ridesoft\Normalizer\Datasource;

/**
 * Class DataSourceInterface
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
interface DataSourceInterface
{
    /**
     * Get the content of the source
     *
     * @return mixed
     */
    public function getContent();

    /**
     * Set the source for the data
     * This could be a mysql connection or a path to a file
     *
     * @param string $source
     *
     * @return DataSourceInterface
     */
    public function setSource(string $source): DataSourceInterface;
}