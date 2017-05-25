<?php
namespace ridesoft\Normalizer\Datasource;

/**
 * Class AbstractDatasourceFactory
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
abstract class AbstractDatasourceFactory
{
    /**
     * @param string $type
     *
     * @return DataSourceInterface
     */
    public function getDatasource(string $type): DataSourceInterface
    {
        switch (strtolower($type)) {
            case 'xml':
                return new XmlDataSource();
        }
    }
}