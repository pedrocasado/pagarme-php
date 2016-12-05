<?php

namespace PagarMe\SdkTest\BankAccount\Request;

use PagarMe\Sdk\BankAccount\Request\BankAccountList;

class BankAccountListTest extends \PHPUnit_Framework_TestCase
{
    const PATH            = 'bank_accounts';
    const METHOD          = 'GET';

    public function bankAccountListParams()
    {
        return [
            [null, null],
            [1, null],
            [null, 2],
            [3, 4],
        ];
    }

    /**
     * @dataProvider bankAccountListParams
     * @test
    **/
    public function mustContentBeCorrect($page, $count)
    {
        $cardCreate = new BankAccountList(
            $page,
            $count
        );

        $this->assertEquals(self::METHOD, $cardCreate->getMethod());
        $this->assertEquals(self::PATH, $cardCreate->getPath());
        $this->assertEquals(
            [
                'page'  => $page,
                'count' => $count
            ],
            $cardCreate->getPayload()
        );
    }
}
