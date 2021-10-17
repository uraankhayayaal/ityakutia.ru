<?php

namespace common\modules\payment\models\cloudpayments;

class PayForm extends \yii\base\Model
{
    public $TransactionId;
    public $Amount;
    public $Currency;
    public $DateTime;
    public $CardFirstSix;
    public $CardLastFour;
    public $CardType;
    public $CardExpDate;
    public $TestMode;
    public $Status;
    public $OperationType;
    public $GatewayName;
    public $InvoiceId;
    public $AccountId;
    public $SubscriptionId;
    public $Name;
    public $Email;
    public $IpAddress;
    public $IpCountry;
    public $IpCity;
    public $IpRegion;
    public $IpDistrict;
    public $Issuer;
    public $IssuerBankCountry;
    public $Description;
    public $Data;
    public $Token;
    public $TotalFee;
    public $CardProduct;
    public $PaymentMethod;
    public $FallBackScenarioDeclinedTransactionId;

    public function rules()
    {
        return [
            [[
                'TransactionId',
                'Amount',
                'Currency',
                'DateTime',
                'CardFirstSix',
                'CardLastFour',
                'CardType',
                'CardExpDate',
                'TestMode',
                'Status',
                'OperationType',
                'GatewayName',
                'TotalFee',
            ], 'required'],
            [[
                'InvoiceId',
                'AccountId',
                'SubscriptionId',
                'Name',
                'Email',
                'IpAddress',
                'IpCountry',
                'IpCity',
                'IpRegion',
                'IpDistrict',
                'Issuer',
                'IssuerBankCountry',
                'Description',
                'Data',
                'Token',
                'CardProduct',
                'PaymentMethod',
                'FallBackScenarioDeclinedTransactionId',
            ], 'safe']
        ];
    }
}