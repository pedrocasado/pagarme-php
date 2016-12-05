<?php

namespace PagarMe\Sdk\BankAccount;

use PagarMe\Sdk\AbstractHandler;
use PagarMe\Sdk\BankAccount\Request\BankAccountCreate;

class BankAccountHandler extends AbstractHandler
{
    /**
     * @param $bankCode int
     * @param $agencia int
     * @param $conta int
     * @param $contaDv int
     * @param $documentNumber string
     * @param $legalName string
     * @param $agenciaDv int
    **/
    public function create(
        $bankCode,
        $agencia,
        $conta,
        $contaDv,
        $documentNumber,
        $legalName,
        $agenciaDv = null
    ) {
        $request = new BankAccountCreate(
            $bankCode,
            $agencia,
            $conta,
            $contaDv,
            $documentNumber,
            $legalName,
            $agenciaDv
        );

        $result = $this->client->send($request);

        return new BankAccount(get_object_vars($result));
    }
}
