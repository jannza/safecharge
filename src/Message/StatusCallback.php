<?php
namespace Omnipay\Safecharge\Message;

use Omnipay\Common\Message\AbstractResponse;


class StatusCallback extends AbstractResponse
{
    const STATUS_SUCCESSFUL = 'approved';
    const STATUS_DECLINED = 'declined';
    const STATUS_ERROR = 'error';
    const STATUS_PENDING = 'pending';

    public function __construct(array $post)
    {
        $this->data = $post;
    }

    public function isSuccessful()
    {
        return (mb_strtolower($this->getStatus()) == self::STATUS_SUCCESSFUL ? true : false);
    }

    public function isDeclined()
    {
        return (mb_strtolower($this->getStatus()) == self::STATUS_DECLINED ? true : false);
    }

    public function isError()
    {
        return (mb_strtolower($this->getStatus()) == self::STATUS_ERROR ? true : false);
    }

    public function isPending()
    {
        return (mb_strtolower($this->getStatus()) == self::STATUS_PENDING ? true : false);
    }

    public function getCode()
    {
        return $this->getStatus();
    }

    public function getStatus()
    {
        return $this->data['Status'];
    }

    public function getAmount()
    {
        return $this->data['totalAmount'];
    }

    public function getCurrency()
    {
        return $this->data['Currency'];
    }

    public function getTimestamp()
    {
        return $this->data['responseTimeStamp'];
    }

    public function getTransactionId()
    {
        return $this->data['PPP_TransactionID'];
    }

    public function getProductId()
    {
        return $this->data['productId'];
    }

    public function getResponseChecksum()
    {
        return $this->data['advanceResponseChecksum'];
    }

    public function getCardMask()
    {
        return $this->data['cardNumber'];
    }

    public function getCardHolder()
    {
        return $this->data['nameOnCard'];
    }

    public function getReason(){
        return $this->data['Reason'];
    }

    public function getMessage(){
        return (isset($this->data['message']) ? $this->data['message'] : '');
    }


    public function CalculateChecksum($secret_word, $hashing_algo = 'md5'){
        $available = array('md5', 'sha256');

        $concat = $secret_word.$this->getAmount().$this->getCurrency().$this->getTimestamp().$this->getTransactionId().$this->getStatus().$this->getProductId();

        if(in_array($hashing_algo, $available)){
            $signature = hash($hashing_algo, $concat);
        }else{
            $signature = hash('md5', $concat);
        }
        return $signature;
    }

    public function ValidChecksum($secret_word){
        return ($this->CalculateChecksum($secret_word) == $this->getResponseChecksum() ? true : false);
    }
}
