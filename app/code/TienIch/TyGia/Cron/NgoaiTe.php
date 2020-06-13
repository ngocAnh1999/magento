<?php

namespace Vietcombank\TyGia\Cron;

class NgoaiTe
{

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @param Magento\Framework\HTTP\Client\Curl $curl
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        Magento\Framework\HTTP\Client\Curl $curl,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->curl = $curl;
        $this->logger = $logger;
    }

    /**
     * Customer newsletter subscription
     *
     * @return void
     */
    public function execute()
    {
        try {
            // get method
            $this->curl->get($url);

            // output of curl request
            $result = $this->curl->getBody();
        } catch (\Exception $e) {
            $this->logger->info($e);
        }
        
    }
}