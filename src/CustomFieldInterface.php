<?php

namespace Omnipay\Gate2shop;

/**
 * Custom Field interface
 */
interface CustomFieldInterface
{
    /**
     * Name of the custom field
     */
    public function getName();

    /**
     * Value of the custom field
     */
    public function getValue();
}
