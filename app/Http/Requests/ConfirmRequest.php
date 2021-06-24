<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomerInformationAttributeTrait;
use Illuminate\Foundation\Http\FormRequest;

/**
 * お客様情報確認画面用リクエスト
 */
class ConfirmRequest extends FormRequest
{
    use CustomerInformationAttributeTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'name_sei'      => 'required' ,
            'name_mei'      => 'required' ,
            'name_sei_kana' => ['required', 'regex:/^([ァ-ン]|ー)+$/'] ,
            'name_mei_kana' => ['required', 'regex:/^([ァ-ン]|ー)+$/'],
            'birthday_y'    => 'required',
            'birthday_m'    => 'required',
            'birthday_d'    => 'required',
            'tel1'          => 'required|numeric',
            'tel2'          => 'required|numeric',
            'tel3'          => 'required|numeric',
            'email'         => 'required|email',
            'zip1'          => 'required|numeric',
            'zip2'          => 'required|numeric',
            'adr1'          => 'required',
            'adr2'          => 'required',
            'adr3'          => 'required',
        ];
    }


    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name_sei'      => '苗字' ,
            'name_mei'      => '名前' ,
            'name_sei_kana' => 'ミョウジ' ,
            'name_mei_kana' => 'ナマエ',
            'birthday_y'    => '生年月日の年',
            'birthday_m'    => '生年月日の月',
            'birthday_d'    => '生年月日の日',
            'tel1'          => 'TEL',
            'tel2'          => 'TEL',
            'tel3'          => 'TEL',
            'email'         => 'メールアドレス',
            'zip1'          => '郵便番号',
            'zip2'          => '郵便番号',
            'adr1'          => '都道府県',
            'adr2'          => '住所（番地）',
            'adr3'          => '建物',
        ];
    }

    public function messages()
    {
        return [
            'name_sei.required' => '名字を入力してください' ,
            // 'name_mei.required' => '名前を入力してください' ,
            // 'name_sei_kana.required'=>'名字のフリガナを入力してください',
            // 'name_sei_kana.regex'=>'フリガナはカタカナで入力してください',
            // 'name_mei_kana.required'=>'名前のフリガナを入力してください',
            // 'name_mei_kana.regex'=>'フリガナはカタカナで入力してください',
            // 'birthday_y.required'  => '誕生日（年）を入力してください',
            // 'birthday_m.required'  => '誕生日（月）を入力してください',
            // 'birthday_d.required'  => '誕生日（日）を入力してください',
            // 'tel1.required'  => '電話番号を入力してください',
            // 'tel1.numeric'  => '電話番号は数字で入力してください',
            // 'tel2.required'  => '電話番号を入力してください',
            // 'tel2.numeric'  => '電話番号は数字で入力してください',
            // 'tel3.required'  => '電話番号を入力してください',
            // 'tel3.numeric'  => '電話番号は数字で入力してください',
            // 'email.required'  => 'メールアドレスを入力してください',
            // 'email.email'  => 'メールアドレスではありません',
            // 'zip1.required'  => '郵便番号を入力してください',
            // 'zip1.numeric'  => '郵便番号は数字で入力してください',
            // 'zip2.required'  => '郵便番号を入力してください',
            // 'zip2.numeric'  => '郵便番号は数字で入力してください',
            // 'adr1.required'  => '住所を入力してください',
            // 'adr2.required'  => '住所を入力してください',
            // 'adr3.required'  => '住所を入力してください',
        ];
    }
}
