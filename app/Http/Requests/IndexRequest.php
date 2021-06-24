<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomerInformationAttributeTrait;
use Illuminate\Foundation\Http\FormRequest;

/**
 * お客様情報入力画面用リクエスト
 */
class IndexRequest extends FormRequest
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
        return [];
    }
}
