<?php

namespace PagarMe\Sdk\Subscription;

use PagarMe\Sdk\AbstractHandler;
use PagarMe\Sdk\Card\Card;
use PagarMe\Sdk\Customer\Customer;
use PagarMe\Sdk\Plan\Plan;
use PagarMe\Sdk\Subscription\Request\CardSubscriptionCreate;
use PagarMe\Sdk\Subscription\Request\BoletoSubscriptionCreate;

class SubscriptionHandler extends AbstractHandler
{
    /**
    * @param int $id
    * @param Plan $plan
    * @param Card $card
    * @param Customer $customer
    * @param string $postbackUrl
    * @param $metadata
    **/
    public function createCardSubscription(
        Plan $plan,
        Card $card,
        Customer $customer,
        $postbackUrl = null,
        $metadata = null
    ) {
        $request = new CardSubscriptionCreate(
            $plan,
            $card,
            $customer,
            $postbackUrl,
            $metadata,
            $extraData
        );

        $result = $this->client->send($request);

        return new Subscription(get_object_vars($result));
    }

    /**
    * @param int $id
    * @param Plan $plan
    * @param Customer $customer
    * @param string $postbackUrl
    * @param $metadata
    **/
    public function createBoletoSubscription(
        Plan $plan,
        Customer $customer,
        $postbackUrl = null,
        $metadata = null
    ) {
        $request = new BoletoSubscriptionCreate(
            $plan,
            $customer,
            $postbackUrl,
            $metadata,
            $extraData = []
        );

        $result = $this->client->send($request);

        return new Subscription(get_object_vars($result));
    }
}
