<?php
/**
 * Copyright © 2022 Chazki. All rights reserved.
 *
 * @category Class
 * @package  Chazki_ChazkiArg
 * @author   Chazki
 */

namespace Chazki\ChazkiArg\Setup;

use Magento\Directory\Helper\Data;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * @var Data
     */
    protected $directoryData;

    /**
     * InstallData constructor.
     * @param Data $directoryData
     */
    public function __construct(Data $directoryData)
    {
        $this->directoryData = $directoryData;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [];

        foreach ($data as $row) {
            $bind = [
                'country_id' => $row['country_id'],
                'code' => $row['code'],
                'default_name' => $row['default_name']
            ];

            $setup->getConnection()->insert(
                $setup->getTable('directory_country_region'),
                $bind
            );

            $regionId = $setup->getConnection()->lastInsertId(
                $setup->getTable('directory_country_region')
            );

            $bind = [
                'locale' => 'en_US',
                'region_id' => $regionId,
                'name' => $row['default_name']
            ];

            $setup->getConnection()->insert(
                $setup->getTable('directory_country_region_name'),
                $bind
            );
        }
    }
}
