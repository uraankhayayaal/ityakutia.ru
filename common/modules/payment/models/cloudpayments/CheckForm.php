<?php

namespace common\modules\payment\models\cloudpayments;

class CheckForm extends \yii\base\Model
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
    public $InvoiceId;
    public $AccountId;
    public $SubscriptionId;
    public $TokenRecipient;
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
            ], 'required'],
            [[
                'InvoiceId',
                'AccountId',
                'SubscriptionId',
                'TokenRecipient',
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
            ], 'safe']
        ];
    }
}