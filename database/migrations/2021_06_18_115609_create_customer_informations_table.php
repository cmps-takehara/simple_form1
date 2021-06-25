<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_informations', function (Blueprint $table) {
            $table->increments('id')                  ->comment('ID');
            $table->string('name_sei')                ->comment('名前（漢字）苗字');
            $table->string('name_mei')                ->comment('名前（漢字）名前');
            $table->string('name_sei_kana')           ->comment('名前（フリガナ）ミョウジ');
            $table->string('name_mei_kana')           ->comment('名前（フリガナ）ナマエ');
            $table->integer('birthday_y')             ->comment('生年月日　年');
            $table->integer('birthday_m')             ->comment('生年月日　月');
            $table->integer('birthday_d')             ->comment('生年月日　日');
            $table->integer('tel1')                   ->comment('TEL');
            $table->integer('tel2')                   ->comment('TEL');
            $table->integer('tel3')                   ->comment('TEL');
            $table->string('email')                   ->comment('メールアドレス');
            $table->integer('zip1')                   ->comment('郵便番号');
            $table->integer('zip2')                   ->comment('郵便番号');
            $table->string('adr1')                    ->comment('都道府県');
            $table->string('adr2')                    ->comment('市区町村');
            $table->string('adr3')                    ->comment('住所（番地）');
            $table->string('adr4')        ->nullable()->comment('建物');
            $table->string('password')                ->comment('パスワード');
            $table->datetime('created_at')            ->comment('作成日時');
            $table->datetime('deleted_at')->nullable()->comment('削除日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_informations');
    }
}
