<?php

namespace PagarMe\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;

class BankAccountContext extends BasicContext
{
    private $bankCode;
    private $office;
    private $accountNumber;
    private $accountDigit;
    private $document;
    private $name;
    private $officeDigit;

    private $bankAccount;

    /**
     * @Given following account data :bankCode, :office, :accountNumber, :accountDigit, :document, :name and :officeDigit
     */
    public function followingAccountDataAnd(
        $bankCode,
        $office,
        $accountNumber,
        $accountDigit,
        $document,
        $name,
        $officeDigit
    ) {
        $this->bankCode      = $bankCode;
        $this->office        = $office;
        $this->accountNumber = $accountNumber;
        $this->accountDigit  = $accountDigit;
        $this->document      = $document;
        $this->name          = $name;
        $this->officeDigit   = $officeDigit;

        if ($officeDigit == 'null') {
            $this->officeDigit = null;
        }
    }

    /**
     * @When register the bank account
     */
    public function registerTheBankAccount()
    {
        $this->bankAccount = self::getPagarMe()
            ->bankAccount()
            ->create(
                $this->bankCode,
                $this->office,
                $this->accountNumber,
                $this->accountDigit,
                $this->document,
                $this->name,
                $this->officeDigit
            );
    }

    /**
     * @Then a account must be created
     */
    public function aAccountMustBeCreated()
    {
        assertInstanceOf(
            'PagarMe\Sdk\BankAccount\BankAccount',
            $this->bankAccount
        );
    }

    /**
     * @Then must account contain same data
     */
    public function mustAccountContainSameData()
    {
        assertEquals($this->bankCode, $this->bankAccount->getBankCode());
        assertEquals($this->office, $this->bankAccount->getAgencia());
        assertEquals($this->accountNumber, $this->bankAccount->getConta());
        assertEquals($this->accountDigit, $this->bankAccount->getContaDv());
        assertEquals($this->document, $this->bankAccount->getDocumentNumber());
        assertEquals($this->name, $this->bankAccount->getLegalName());
        assertEquals($this->officeDigit, $this->bankAccount->getAgenciaDv());
    }
}
