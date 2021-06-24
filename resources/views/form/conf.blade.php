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
				{{ Form::open([
					'method' => 'post',
					'url'    => route(),
					'name'   => 'sentMessage',
					'id'     => 'applicationForm',
					'class'  => 'form-horizontal'
				]) }}
					<section class="panel">
						<header class="panel-heading form-heading">お客様情報のご登録 確認</header>
						<div class="panel-body form-body">
							<h3 class="form-intitle">お客様情報</h3>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">名前（漢字）</label>
								<div class="col-md-9 col-sm-8">
									{{ $customerInfo->name_sei }}&nbsp;{{$customerInfo->name_mei }}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">名前（フリガナ）</label>
								<div class="col-md-9 col-sm-8">
									{{ $customerInfo->name_sei_kana }}&nbsp;{{ $customerInfo->name_mei_kana }}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">生年月日</label>
								<div class="col-md-9 col-sm-8">
									{{$form_data['birthday_y']}}年{{$form_data['birthday_m']}}月{{$form_data['birthday_d']}}日
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">TEL</label>
								<div class="col-md-9 col-sm-8">
									{{$form_data['tel1']}}-{{$form_data['tel2']}}-{{$form_data['tel3']}}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">メールアドレス</label>
								<div class="col-md-9 col-sm-8">
									{{$form_data['email']}}
								</div>
							</div>
							<h3 class="form-intitle">現住所(ご登録住所)</h3>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">郵便番号</label>
								<div class="col-md-9 col-sm-8">
									{{$form_data['zip1']}}-{{$form_data['zip2']}}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">都道府県</label>
								<div class="col-sm-5">
									{{$form_data['adr1']}}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">市区町村</label>
								<div class="col-md-9 col-sm-8">
									{{$form_data['adr2']}}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">住所（番地）</label>
								<div class="col-md-9 col-sm-8">
									{{$form_data['adr3']}}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">建物</label>
								<div class="col-md-9 col-sm-8">
									{{$form_data['adr4']}}
								</div>
							</div>
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="submit" class="btn btn-primary btn-lg">登録する</button>
						<button type="button" class="btn btn-default btn-lg pull-left" onclick="history.back();">戻る</button>
					</div>
					@foreach($customerInfo as $key => $value)
					<input type ="hidden"  name="{{ $key }}" value="{{ $value }}">
					@endforeach
				{{ Form::close() }}
			</div>
		</div>
		
	</section>
	
</div>
@endsection