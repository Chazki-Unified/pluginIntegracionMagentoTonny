<?php
/**
 * Copyright © 2022 Chazki. All rights reserved.
 *
 * @category Class
 * @package  Chazki_ChazkiArg
 * @author   Chazki
 */

namespace Chazki\ChazkiArg\Plugin;

use Chazki\ChazkiArg\Model\ChazkiArg;
use Magento\Shipping\Block\Adminhtml\Order\Tracking;

class OrderTracking
{
    /**
     * @param Tracking $subject +
     * @param $result
     * @return mixed
     */
    public function afterGetCarriers(Tracking $subject, $result)
    {
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);

        $result[ChazkiArg::TRACKING_CODE] = __(ChazkiArg::TRACKING_LABEL);
        $logger->info(__METHOD__ . "-" . __LINE__ . ' El valor del $result ' . json_encode($result));

        return $result;
    }
}
