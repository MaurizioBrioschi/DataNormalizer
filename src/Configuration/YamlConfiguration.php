<?php
namespace ridesoft\Normalizer\Configuration;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlConfiguration
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
class YamlConfiguration extends AbstractConfiguration
{
    /** @var  array */
    protected $yaml;

    /**
     * YamlConfiguration constructor.
     *
     * @param string $configuration
     */
    public function __construct($configuration)
    {
        parent::__construct($configuration);
        try {
            $this->yaml = Yaml::parse(file_get_contents($this->configuration));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }

    /**
     * @return string
     */
    public function getDataSourceType(): string
    {
        return $this->yaml['datasource']['type'];
    }

    /**
     * @return array
     */
    public function getMapping(): array
    {
        return $this->yaml['mapping'];
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->yaml['datasource']['source'];
    }
}