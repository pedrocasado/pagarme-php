<?php

namespace Pagarme\SdkTests\BankAccount;

use PagarMe\Sdk\BankAccount\BankAccountHandler;

class BankAccountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
    **/
    public function mustReturnBankAccount()
    {
        $clientMock =  $this->getMockBuilder('PagarMe\Sdk\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $clientMock->method('send')
            ->willReturn(json_decode('{"object":"plan","id":70581,"amount":1337,"days":30,"name":"Plan Teste","trial_days":15,"date_created":"2016-10-31T19:06:11.258Z","payment_methods":["boleto","credit_card"],"color":"Silver","charges":13,"installments":26}'));

        $handler = new BankAccountHandler($clientMock);

        $this->assertInstanceOf(
            'Pagarme\Sdk\BankAccount\BankAccount',
            $handler->create(
                341,
                932,
                58054,
                1,
                'API BANK ACCOUNT',
                26268738888,
                5
            )
        );
    }
}
