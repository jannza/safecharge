<?php

namespace Omnipay\Safecharge\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Safecharge\CustomFieldBag;
use Cake\Log\Log;

/**
 * Safecharge Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
    protected $liveEndpoint = 'https://secure.safecharge.com/ppp/purchase.do';
    protected $testEndpoint = 'https://ppp-test.safecharge.com/ppp/purchase.do';

    public function getTotalAmount()
    {
        $totalAmount = 0;

        foreach ($this->getItems() as $item) {
            $totalAmount += $item->getPrice();
        }

        return $this->formatCurrency($totalAmount);
    }

    public function getTimestamp()
    {
        return date('Y-m-d.h:i:s');
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

    public function getCustomData()
    {
        return $this->getParameter('customData');
    }

    public function setCustomData($value)
    {
        return $this->setParameter('customData', $value);
    }

    public function getCustomFields()
    {
        return $this->getParameter('customfields');
    }

    public function setCustomFields($customfields)
    {
        if ($customfields && !$customfields instanceof CustomFieldBag) {
            $customfields = new CustomFieldBag($customfields);
        }

        return $this->setParameter('customfields', $customfields);
    }

    public function getMerchantLocale()
    {
        $merchantLocales = array(
            'en'    => 'en_US',
            'it'    => 'it_IT',
            'es'    => 'Es_ES',
            'fr'    => 'fr_FR',
            'iw'    => 'iw_IL',
            'de'    => 'de_DE',
            'ar'    => 'ar_AA',
            'ru'    => 'ru_RU',
            'nl'    => 'nl_NL',
            'bg'    => 'bg_BG',
            'ja'    => 'ja_JP',
            'tr'    => 'tr_TR',
            'pt'    => 'pt_BR',
            'zh'    => 'zh_ZN',
            'lt'    => 'lt_LT',
            'sv'    => 'sv_SE',
            'sl'    => 'sl_SI',
            'da'    => 'da_DK',
            'pl'    => 'pl_PL',
            'sr'    => 'sr_RS',
            'hr'    => 'hr_HR',
            'ro'    => 'ro_RO'
        );

        return (isset($merchantLocales[$this->getParameter('merchantLocale')])) ?
            $merchantLocales[$this->getParameter('merchantLocale')] :
            $merchantLocales['en'];
    }

    public function setMerchantLocale($value)
    {
        return $this->setParameter('merchantLocale', $value);
    }

    public function getSkipBillingTab()
    {
        return $this->getParameter('skipBillingTab');
    }

    public function setSkipBillingTab($value)
    {
        return $this->setParameter('skipBillingTab', $value);
    }

    public function getSkipReviewTab()
    {
        return $this->getParameter('skipReviewTab');
    }

    public function setSkipReviewTab($value)
    {
        return $this->setParameter('skipReviewTab', $value);
    }

    public function getCustomSiteName()
    {
        return $this->getParameter('customSiteName');
    }

    public function setCustomSiteName($value)
    {
        return $this->setParameter('customSiteName', $value);
    }





    public function getUserToken()
    {
        return $this->getParameter('userToken');
    }

    public function setUserToken($value)
    {
        return $this->setParameter('userToken', $value);
    }

    public function getProductId()
    {
        return $this->getParameter('productId');
    }

    public function setProductId($value)
    {
        return $this->setParameter('productId', $value);
    }

    public function getFirstname()
    {
        return mb_substr($this->getParameter('firstname'), 0, 30);
    }

    public function setFirstname($value)
    {
        return $this->setParameter('firstname', $value);
    }

    public function getLastname()
    {
        return mb_substr($this->getParameter('lastname'), 0, 40);
    }

    public function setLastname($value)
    {
        return $this->setParameter('lastname', $value);
    }

    public function getAddress1()
    {
        return mb_substr($this->getParameter('address'), 0, 60);
    }

    public function getAddress2()
    {
        return mb_substr($this->getParameter('address'), 60, 60);
    }

    public function setAddress($value)
    {
        return $this->setParameter('address', $value);
    }

    public function getCity()
    {
        return mb_substr($this->getParameter('city'), 0, 30);
    }

    public function setCity($value)
    {
        return $this->setParameter('city', $value);
    }

    public function getZip()
    {
        return mb_substr($this->getParameter('zip'), 0, 10);
    }

    public function setZip($value)
    {
        return $this->setParameter('zip', $value);
    }

    public function getCountry()
    {
        return $this->getParameter('country');
    }

    public function setCountry($value)
    {
        return $this->setParameter('country', $value);
    }

    public function getClientEmail()
    {
        return $this->getParameter('client_email');
    }

    public function setClientEmail($value)
    {
        return $this->setParameter('client_email', $value);
    }

    public function getClientPhone()
    {
        return $this->getParameter('client_phone');
    }

    public function setClientPhone($value)
    {
        return $this->setParameter('client_phone', $value);
    }

    public function getClientId()
    {
        return $this->getParameter('client_id');
    }

    public function setClientId($value)
    {
        return $this->setParameter('client_id', $value);
    }

    public function getMerchantUniqueId()
    {
        return $this->getParameter('merchant_unique_id');
    }

    public function setMerchantUniqueId($value)
    {
        return $this->setParameter('merchant_unique_id', $value);
    }

    public function getSuccessUrl()
    {
        return $this->getParameter('success_url');
    }

    public function setSuccessUrl($value)
    {
        return $this->setParameter('success_url', $value);
    }

    public function getErrorUrl()
    {
        return $this->getParameter('error_url');
    }

    public function setErrorUrl($value)
    {
        return $this->setParameter('error_url', $value);
    }

    public function getPendingUrl()
    {
        return $this->getParameter('pending_url');
    }

    public function setPendingUrl($value)
    {
        return $this->setParameter('pending_url', $value);
    }

    public function getBackUrl()
    {
        return $this->getParameter('back_url');
    }

    public function setBackUrl($value)
    {
        return $this->setParameter('back_url', $value);
    }

    public function getNotifyUrl()
    {
        return $this->getParameter('notify_url');
    }

    public function setNotifyUrl($value)
    {
        return $this->setParameter('notify_url', $value);
    }


    public function getData()
    {
        //$this->validate('currency', 'items');

        $data = array();
        $data['encoding'] = 'utf-8';
        $data['merchant_id'] = $this->getMerchantId();
        $data['merchant_site_id'] = $this->getMerchantSiteId();
        $data['user_token_id'] = $this->getUserToken();
        $data['total_amount'] = $this->getTotalAmount();
        $data['currency'] = $this->getCurrency();
        $data['numberofitems'] = $this->getItems()->count();

        foreach ($this->getItems() as $n => $item) {
            ++$n;
            $data["item_name_$n"] = $item->getName();
            $data["item_amount_$n"] = $this->formatCurrency($item->getPrice());
            $data["item_quantity_$n"] = $item->getQuantity();
        }

        $data['productId'] = $this->getProductId();
        $data['time_stamp'] = $this->getTimestamp();
        $data['version'] = '4.0.0';
        $data['first_name'] = $this->getFirstname();
        $data['last_name'] = $this->getLastname();
        $data['address1'] = $this->getAddress1();
        $data['address2'] = $this->getAddress2();
        $data['city'] = $this->getCity();
        $data['zip'] = $this->getZip();
        $data['country'] = $this->getCountry();
        $data['email'] = $this->getClientEmail();
        $data['phone1'] = $this->getClientPhone();
        $data['userid'] = $this->getClientId();
        $data['merchantLocale'] = $this->getMerchantLocale();
        $data['merchant_unique_id'] = $this->getMerchantUniqueId();
        $data['success_url'] = $this->getSuccessUrl();
        $data['error_url'] = $this->getErrorUrl();
        $data['pending_url'] = $this->getPendingUrl();
        $data['back_url'] = $this->getBackUrl();
        $data['notify_url'] = $this->getNotifyUrl();


        $data['checksum'] = $this->createChecksum($data['time_stamp']);

        Log::write('debug', print_r($data,true));

        return $data;
    }

    public function createChecksum($timestamp)
    {
        $concat = $this->getSecretKey().'utf-8'.$this->getMerchantId().$this->getMerchantSiteId().$this->getUserToken().$this->getTotalAmount();
        $concat .= $this->getCurrency().$this->getItems()->count();
        foreach ($this->getItems() as $n => $item) {
            $concat .= $item->getName().$this->formatCurrency($item->getPrice()).$item->getQuantity();
        }
        $concat .= $this->getProductId().$timestamp.'4.0.0'.$this->getFirstname().$this->getLastname().$this->getAddress1();
        $concat .= $this->getAddress2().$this->getCity().$this->getZip().$this->getCountry().$this->getClientEmail().$this->getClientPhone();
        $concat .= $this->getClientId().$this->getMerchantLocale().$this->getMerchantUniqueId().$this->getSuccessUrl().$this->getErrorUrl();
        $concat .= $this->getPendingUrl().$this->getBackUrl().$this->getNotifyUrl();

        return md5($concat);
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }
}
