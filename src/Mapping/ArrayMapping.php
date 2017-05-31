<?php
namespace ridesoft\Normalizer\Mapping;

/**
 * Class ConfigurationFileMapping
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
class ArrayMapping implements MappingInterface
{
    /** @var  array */
    protected $mapping;

    public function __construct(array $mapping)
    {
        $this->mapping = $mapping;
    }
}