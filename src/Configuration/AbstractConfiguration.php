<?php
namespace ridesoft\Normalizer\Configuration;

/**
 * Class AbstractConfiguration
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
abstract class AbstractConfiguration implements ConfigurationInterface
{
    /** @var  string */
    protected $configuration;

    public function __construct(string $configuration)
    {
        $this->configuration = $configuration;
    }
}