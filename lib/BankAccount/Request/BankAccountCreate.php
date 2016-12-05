<?php

namespace PagarMe\Sdk\BankAccount\Request;

use PagarMe\Sdk\Request;

class BankAccountCreate implements Request
{
    /**
     * @var int | Valor identificador do código do banco
     */
    private $bankCode;

    /**
     * @var int | Valor identificador da agência a qual a conta pertence
     */
    private $agencia;

    /**
     * @var int | Dígito verificador da agência
     */
    private $agenciaDv;

    /**
     * @var int | Número da conta bancária
     */
    private $conta;

    /**
     * @var int | Dígito verificador da conta
     */
    private $contaDv;

    /**
     * @var int | Tipo do documento do titular da conta
     */
    private $documentNumber;

    /**
     * @var string | Nome completo (se pessoa física) ou Razão Social (se pessoa jurídica)
     */
    private $legalName;

    /**
     * @param int $bankCode
     * @param int $agencia
     * @param int $conta
     * @param int $contaDv
     * @param int $documentNumber
     * @param int $legalName
     * @param string $agenciaDv
     */
    public function __construct(
        $bankCode,
        $agencia,
        $conta,
        $contaDv,
        $documentNumber,
        $legalName,
        $agenciaDv
    ) {
        $this->bankCode       = $bankCode;
        $this->agencia        = $agencia;
        $this->conta          = $conta;
        $this->contaDv        = $contaDv;
        $this->documentNumber = $documentNumber;
        $this->legalName      = $legalName;
        $this->agenciaDv      = $agenciaDv;
    }

    /**
     * @return array
     */
    public function getPayload()
    {
        return [
            'bank_code'       => $this->bankCode,
            'agencia'         => $this->agencia,
            'conta'           => $this->conta,
            'conta_dv'        => $this->contaDv,
            'document_number' => $this->documentNumber,
            'legal_name'      => $this->legalName,
            'agencia_dv'      => $this->agenciaDv
        ];
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return 'bank_accounts';
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
