<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Requests\ConfirmRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\StoreRequest;
use App\Models\CustomerInformation;
use Hash;

/**
 * 連続した遷移のフォームのサンプル
 */
class ContinuousTransitionController extends Controller
{
    /**
     * お客様情報　入力画面
     */
    public function index(IndexRequest $request)
    {
        // お客様情報　入力値を取得します。
        $customerInfo = (object)$request->getCustomerInfoInputs();

        return view('form.index', compact('customerInfo'));
    }

    /**
     * お客様情報　確認画面
     */
    public function confirm(ConfirmRequest $request)
    {
        // お客様情報　入力値を取得します。
        $customerInfo = (object)$request->getCustomerInfoInputs();

        return view('form.conf', compact('customerInfo'));
    }

    /**
     * パスワード設定画面
     */
    public function password(PasswordRequest $request)
    {
        // お客様情報　入力値を取得します。
        $customerInfo = (object)$request->getCustomerInfoInputs();

        return view('form.password', compact('customerInfo'));
    }

    /**
     * データ登録・メール送信
     */
    public function store(StoreRequest $request)
    {
        /* DBにお客様情報・パスワード保存 */
        $customerInformation = new CustomerInformation();

        $customerInformation->fill($request->getCustomerInfoInputs());
        $customerInformation->password = Hash::make($request->input('password'));
        $customerInformation->save();

        /* メール送信 */

        // 完了画面へリダイレクト
        return redirect()->route('continuous_transition.complete');
    }


    /**
     * 登録完了画面
     */
    public function complete()
    {
        return view('form.complete');
    }
}
