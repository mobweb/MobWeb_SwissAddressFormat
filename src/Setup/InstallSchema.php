<?php
/**
 * @author    Louis Bataillard <info@mobweb.ch>
 * @package    MobWeb_SwissAddressFormat
 * @copyright    Copyright (c) MobWeb GmbH (https://mobweb.ch)
 */

namespace MobWeb\SwissAddressFormat\Setup;

use Magento\Framework\App\Config\ConfigResource\ConfigInterface as ResourceConfig;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Store\Model\Store;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @var ResourceConfig
     */
    private $resourceConfig;

    /**
     * @param ResourceConfig $resourceConfig
     */
    public function __construct(
        ResourceConfig $resourceConfig
    ) {
        $this->resourceConfig = $resourceConfig;
    }

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $this->setBaseConfig();

        $installer->endSetup();
    }

    /**
     * @param array $config
     */
    private function saveConfig(array $config)
    {
        foreach ($config as $code => $value) {
            $this->resourceConfig->saveConfig(
                $code,
                $value,
                ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
                Store::DEFAULT_STORE_ID
            );
        }
    }

    /**
     * 
     */
    private function setBaseConfig()
    {
        $config = [
            'customer/address_templates/html' => '{{depend company}}{{var company}}<br />{{/depend}}
            {{depend prefix}}{{var prefix}} {{/depend}}{{var firstname}} {{depend middlename}}{{var middlename}} {{/depend}}{{var lastname}}{{depend suffix}} {{var suffix}}{{/depend}}{{depend firstname}}<br />{{/depend}}
            {{if street1}}{{var street1}}<br />{{/if}}
            {{depend street2}}{{var street2}}<br />{{/depend}}
            {{depend street3}}{{var street3}}<br />{{/depend}}
            {{depend street4}}{{var street4}}<br />{{/depend}}
            {{if postcode}}{{var postcode}}{{/if}} {{if city}}{{var city}}{{/if}}<br />
            {{var country}}<br />'
        ];

        $this->saveConfig($config);
    }
}
