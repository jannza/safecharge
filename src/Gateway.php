<?php

namespace Omnipay\Safecharge;

use Omnipay\Common\AbstractGateway;
use Omnipay\Safecharge\Message\PurchaseRequest;
use Omnipay\Safecharge\Message\CompletePurchaseRequest;

/**
 * Gate2shop Gateway
 *
 * @link
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Gate2shop';
    }

    public function getDefaultParameters()
    {
        return array(
            'merchantSiteId' => '',
            'merchantId'     => '',
            'secretKey'      => '',
            'customSiteName' => ''
        );
    }

    public function getMerchantSiteId()
    {
        return $this->getParameter('merchantSiteId');
    }

    public function setMerchantSiteId($value)
    {
        return $this->setParameter('merchantSiteId', $value);
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function getCustomSiteName()
    {
        return $this->getParameter('customSiteName');
    }

    public function setCustomSiteName($value)
    {
        return $this->setParameter('customSiteName', $value);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Safecharge\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Safecharge\Message\CompletePurchaseRequest', $parameters);
    }
}
