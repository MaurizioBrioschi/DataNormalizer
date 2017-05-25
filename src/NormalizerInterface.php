<?php
namespace ridesoft\Normalizer;
use ridesoft\Normalizer\Configuration\ConfigurationInterface;
use ridesoft\Normalizer\Datasource\DataSourceInterface;
use ridesoft\Normalizer\Mapping\MappingInterface;

/**
 * Interface NormalizerInterface
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
interface NormalizerInterface
{
    /**
     * Normalize data
     *
     * @return array normalized array
     */
    function normalize(): array;

    /**
     * @param MappingInterface $mapping
     *
     * @return NormalizerInterface
     */
    function setMapping(MappingInterface $mapping): NormalizerInterface;

    /**
     * @param $data
     *
     * @return NormalizerInterface
     */
    function setDataToNormalize(DataSourceInterface $data): NormalizerInterface;
}