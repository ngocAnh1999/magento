<?php

namespace TienIch\TyGia\Cron;

use Magento\Framework\Exception\CronException;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\HTTP\Client\Curl;
use TienIch\TyGia\Model\InsertRecord;
use TienIch\TyGia\Model\ResourceModel;
use Zend\Json\Decoder;
use Zend\Json\Json;
use Psr\Log\LoggerInterface;

class NgoaiTe
{
    private $objectManager;
    private $resource;
    private $_curl;

    public function __construct(
        ObjectManagerInterface $objectManager,
        ResourceModel\InsertRecord $resource,
        Curl $curl
    )
    {
        $this->objectManager = $objectManager;
        $this->resource = $resource;
        $this->_curl = $curl;
    }

    public function execute()
    {
        $rate = $this->getRateapi();

        if (null === $rate) {
            return $this;
        }

        try {
     
            $this->resource->save($rate);
        } catch (\Exception $e) {
            $this->objectManager->get(LoggerInterface::class)->error($e->getMessage());
        }

       
    }

    private function getRateapi(): ? InsertRecord
    {
        $uri = 'https://currencyapi.net/api/v1/rates';
        $client = new \Zend\Http\Client($uri, [
            'timeout' => 30
        ]);
          $client->setParameterGet(
            [
                'key' => 'dvTMfg5mC0d0JEH9C2maJKDp0JujtKMnHJLu'
            ]
        );

        try {
            $response = $client->send();
            $data = Decoder::decode($response->getBody(), Json::TYPE_ARRAY);

            if (200 !== $response->getStatusCode()) {
                $this->objectManager->get(LoggerInterface::class)->error($data['message']);
                throw new CronException($data['message']);
            }
        } catch (\Exception $e) {
            $this->objectManager->get(LoggerInterface::class)->error($e->getMessage());

            return null;
        }

        /** @var InsertRecord $rate */
        $rate = $this->objectManager->create(InsertRecord::class);
        
              $rate->setData(
            [
                // 'usd' =>$data['rates']['USD']
                'eur' =>$data['rates']['EUR'],
                'aud' =>$data['rates']['AUD'],
                'cad' =>$data['rates']['CAD'],
                'chf' =>$data['rates']['CHF'],
                'cny' =>$data['rates']['CNY'],
                'gbp' =>$data['rates']['GBP'],
                'jpy' =>$data['rates']['JPY'],
                'rub' =>$data['rates']['RUB'],
                'vnd' =>$data['rates']['VND']
            ]
        );
        

        return $rate;
    }
}