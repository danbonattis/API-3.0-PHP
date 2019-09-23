<?php

namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Environment;
use Cielo\API30\Merchant;

use Psr\Log\LoggerInterface;

/**
 * Class UpdateSaleRequest
 *
 * @package Cielo\API30\Ecommerce\Request
 */
class UpdateSaleRecurrencyRequest extends AbstractRequest {

    /**
     * @var Environment
     */
    private $environment;

    /**
     * UpdateSaleRequest constructor.
     *
     * @param Merchant $type
     * @param Merchant $merchant
     * @param Environment $environment
     * @param LoggerInterface|null $logger
     */
    public function __construct(Merchant $merchant, Environment $environment, LoggerInterface $logger = null) {

        parent::__construct($merchant, $logger);

        $this->environment = $environment;

    }

    /**
     * @param $recurrentPaymentId
     *
     * @return null
     * @throws \Cielo\API30\Ecommerce\Request\CieloRequestException
     * @throws \RuntimeException
     */
    public function executeDeactivate($recurrentPaymentId) {

        $url    = $this->environment->getApiUrl() . "1/RecurrentPayment/{$recurrentPaymentId}/Deactivate";

        return $this->sendRequest('PUT', $url);

    }

    /**
     * @param $recurrentPaymentId
     *
     * @return null
     * @throws \Cielo\API30\Ecommerce\Request\CieloRequestException
     * @throws \RuntimeException
     */
    public function executeReactivate($recurrentPaymentId) {

        $url    = $this->environment->getApiUrl() . "1/RecurrentPayment/{$recurrentPaymentId}/Reactivate";

        return $this->sendRequest('PUT', $url);

    }

    /**
     * @param $recurrentPaymentId
     * @param $amount
     * @return mixed
     *
     * @throws CieloRequestException
     */
    public function executeAmount($recurrentPaymentId, $amount) {

        $url    = $this->environment->getApiUrl() . "1/RecurrentPayment/{$recurrentPaymentId}/Amount";

        return $this->sendRequest('PUT', $url, json_encode($amount));

    }

    /**
     * @param $json
     *
     * @return Payment
     */
    protected function unserialize($json) {

        return Payment::fromJson($json);

    }

    /**
     * @return mixed
     */
    public function getServiceTaxAmount() {

        return $this->serviceTaxAmount;

    }

    /**
     * @param $serviceTaxAmount
     *
     * @return $this
     */
    public function setServiceTaxAmount($serviceTaxAmount) {

        $this->serviceTaxAmount = $serviceTaxAmount;

        return $this;

    }

    /**
     * @return mixed
     */
    public function getAmount() {

        return $this->amount;

    }

    /**
     * @param $amount
     *
     * @return $this
     */
    public function setAmount($amount) {

        $this->amount = $amount;

        return $this;

    }

    /**
     * @param $param
     *
     * @return mixed
     */
    public function execute($param)
    {
        // TODO: Implement execute() method.
    }

}
