<?php

namespace App\Http\Requests;

/**
 * お客様情報属性トレイト
 */
trait CustomerInformationAttributeTrait
{
    /**
     * お客様情報の項目
     */
    private $customerInformationAttributes = [
        'name_sei',
        'name_mei',
        'name_sei_kana',
        'name_mei_kana',
        'birthday_y',
        'birthday_m',
        'birthday_d',
        'tel1',
        'tel2',
        'tel3',
        'email',
        'zip1',
        'zip2',
        'adr1',
        'adr2',
        'adr3',
        'adr4',
    ];

    /**
     * お客様情報を取得します。
     */
    public function getCustomerInfoInputs(): array
    {
        $customerInformationInputs = [];

        foreach ($this->customerInformationAttributes as $attribute) {
            $customerInformationInputs[$attribute] = $this->input($attribute) ?: $this->old($attribute);
        }

        return $customerInformationInputs;
    }
}
