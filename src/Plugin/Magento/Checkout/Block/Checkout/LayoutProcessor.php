<?php
/**
 * @author    Louis Bataillard <info@mobweb.ch>
 * @package    MobWeb_SwissAddressFormat
 * @copyright    Copyright (c) MobWeb GmbH (https://mobweb.ch)
 */

namespace MobWeb\SwissAddressFormat\Plugin\Magento\Checkout\Block\Checkout;

class LayoutProcessor
{
    /**
     * @param $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess($subject, array $jsLayout): array
    {
        $jsLayout = $this->moveZipBeforeLocality($jsLayout);

        return $jsLayout;
    }

    /**
     * @param array $jsLayout
     * @return array
     */
    private function moveZipBeforeLocality(array $jsLayout): array
    {
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
        ['children']['shippingAddress']['children']['shipping-address-fieldset']
        ['children']['postcode']['sortOrder'] = 75;

        return $jsLayout;
    }
}