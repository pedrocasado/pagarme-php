<?php

namespace PagarMe\Sdk;

use GuzzleHttp\Exception\TransferException;

class ClientException extends PagarMeException
{
    /**
     * @param string $message
     * @param int $code
     */
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}
