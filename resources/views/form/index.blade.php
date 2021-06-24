@extends('layouts.layout')
@section('title', '登録フォーム | sample')
@section('inner-headline')
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">登録フォーム</h2>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('form-content')
	<section id="content">
		<div class="container">
			<div class="row form-container">
				<div class="row bs-wizard">
					<div class="col-xs-4 bs-wizard-step active">
						<div class="text-center bs-wizard-stepnum">登録</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">パスワード入力</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">登録完了</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
				</div>
				<!-- Form itself -->
				{{-- <form name="sentMessage" id="applicationForm" class="form-horizontal" action="/form/conf" method="post"> --}}
				{{ Form::open([
					'method' => 'post',
					'url'    => route(),
					'name'   => 'sentMessage',
					'id'     => 'applicationForm',
					'class'  => 'form-horizontal'
				]) }}
					<section class="panel">
					@if(count($errors) > 0)
						<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					@endif
						<header class="panel-heading form-heading">お客様情報のご登録</header>
						<div class="panel-body form-body">
							<h3 class="form-intitle">お客様情報</h3>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">名前（漢字）<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<input type="text" class="form-control input -col-2" placeholder="苗字" name="name_sei" value="{{ $customerInfo->name_sei }}">
									<input type="text" class="form-control input -col-2" placeholder="名前" name="name_mei" value="{{ $customerInfo->name_mei }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">名前（フリガナ）<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<input type="text" class="form-control input -col-2" placeholder="ミョウジ" name="name_sei_kana" value="{{ $customerInfo->name_sei_kana }}">
									<input type="text" class="form-control input -col-2" placeholder="ナマエ" name="name_mei_kana" value="{{ $customerInfo->name_mei_kana }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">生年月日<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<select name="birthday_y" class="select form-control m-b-10">
										<option value="">----</option>
										@for($i = 1997; $i >=1942; $i--)
											<option value="{{ $i }}" @if($customerInfo->birthday_y == $i)selected="selected"@endif>{{ $i }}</option>
										@endfor
									</select><span>年</span>
									<select name="birthday_m" class="select form-control m-b-10">
										<option value="">--</option>
										@for($i = 1; $i <= 12; $i++)
											<option value="{{ $i }}" @if($customerInfo->birthday_m == $i)selected="selected"@endif>{{ $i }}</option>
										@endfor
									</select><span>月</span>
									<select name="birthday_d" class="select form-control m-b-10">
										<option value="">--</option>
										@for($i = 1; $i <= 31; $i++)
											<option value="{{ $i }}" @if($customerInfo->birthday_d == $i)selected="selected"@endif>{{ $i }}</option>
										@endfor
									</select><span>日</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">TEL<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<input type="text" class="form-control input -col-tel" name="tel1" value="{{ $customerInfo->tel1 }}"><span>－</span>
									<input type="text" class="form-control input -col-tel" name="tel2" value="{{ $customerInfo->tel2 }}"><span>－</span>
									<input type="text" class="form-control input -col-tel" name="tel3" value="{{ $customerInfo->tel3 }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">メールアドレス<span class="form-icon-required">必須</span></label>
								<div class="col-md-9 col-sm-8">
									<input type="text" class="form-control" id="mail" name="email" value="{{ $customerInfo->email }}">
								</div>
							</div>
							<h3 class="form-intitle">現住所(ご登録住所)</h3>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">郵便番号<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">						
									<input type="text" name="zip1" value="{{ $customerInfo->zip1 }}" class="form-control input -col-post js_numOnry size_post" maxlength="3" id="user_zip1"><span>－</span>
									<input type="text" name="zip2" value="{{ $customerInfo->zip2 }}" class="form-control input -col-post js_numOnry size_post" maxlength="4" id="user_zip2">
									<button type="button" class="btn btn-primary" id="zip_btn"> 住所変換 </button>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">都道府県<span class="form-icon-required">必須</span></label>
								<div class="col-sm-5">
									<select name="adr1" class="select form-control m-b-10" id="pref">
										<option value="">選択してください</option>
										@foreach(trans('prefecture') as $prefecture)
											<option value="{{ $prefecture }}" @if($customerInfo->adr1 == $prefecture)selected="selected"@endif>{{ $prefecture }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">市区町村<span class="form-icon-required">必須</span></label>
								<div class="col-md-9 col-sm-8">
									<input type="text" name="adr2" value="{{ $customerInfo->adr2 }}" maxlength="30" class="form-control input" id="city" placeholder="例）新宿区">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">住所（番地）<span class="form-icon-required">必須</span></label>
								<div class="col-md-9 col-sm-8">
									<input type="text" name="adr3" value="{{ $customerInfo->adr3 }}" class="form-control input" id="address1" maxlength="40" placeholder="例）○○○1-2-3">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">建物</label>
								<div class="col-md-9 col-sm-8">
									<input type="text" name="adr4" value="{{ $customerInfo->adr4 }}" class="form-control input" maxlength="40" placeholder="例）メゾンドハイツ105">
								</div>
							</div>
						</div>
					</section>
					<div class="row text-center">
						<div class="col-md-12">
							<p id="overlapResult" data-result=""></p>
						</div>
					</div>
					<div class="text-center submit-area">
						<button type="submit" class="btn btn-primary btn-lg">入力内容を確認する</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</section>
@endsection