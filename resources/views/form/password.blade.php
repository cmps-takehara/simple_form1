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
					<div class="col-xs-4 bs-wizard-step complete">
						<div class="text-center bs-wizard-stepnum">登録</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step active">
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
				<form name="sentMessage" id="applicationForm" class="form-horizontal" action="/form/complete" method="post">
				@csrf
				<input type ="hidden"  name="name_sei" value="{{$form_data['name_sei']}}">
				<input type ="hidden"  name="name_mei" value="{{$form_data['name_mei']}}">
				<input type ="hidden"  name="name_sei_kana" value="{{$form_data['name_sei_kana']}}">
				<input type ="hidden"  name="name_mei_kana" value="{{$form_data['name_mei_kana']}}">
				<input type ="hidden"  name="birthday_y" value="{{$form_data['birthday_y']}}">
				<input type ="hidden"  name="birthday_m" value="{{$form_data['birthday_m']}}">
				<input type ="hidden"  name="birthday_d" value="{{$form_data['birthday_d']}}">
				<input type ="hidden"  name="tel1" value="{{$form_data['tel1']}}">
				<input type ="hidden"  name="tel2" value="{{$form_data['tel2']}}">
				<input type ="hidden"  name="tel3" value="{{$form_data['tel3']}}">
				<input type ="hidden"  name="email" value="{{$form_data['email']}}">
				<input type ="hidden"  name="zip1" value="{{$form_data['zip1']}}">
				<input type ="hidden"  name="zip2" value="{{$form_data['zip2']}}">
				<input type ="hidden"  name="adr1" value="{{$form_data['adr1']}}">
				<input type ="hidden"  name="adr2" value="{{$form_data['adr2']}}">
				<input type ="hidden"  name="adr3" value="{{$form_data['adr3']}}">
				<input type ="hidden"  name="adr4" value="{{$form_data['adr4']}}">
				<!-- @if(count($errors) > 0)
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				@endif -->
					<section class="panel">
					@if(count($errors) > 0)
						<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					@endif
						<header class="panel-heading form-heading">パスワード設定</header>
						<div class="panel-body form-body" id="js_showPass">
							
							<div class="form-group">
								<label class="col-sm-3 control-label">パスワード</label>
								<div class="col-sm-6">
									<input type="password" name="password" autocomplete="off" value="" class="form-control input new_password">
								</div>
								<div class="col-sm-3">
									<a href="#">表示する</a>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">確認パスワード</label>
								<div class="col-sm-6">
									<input type="password" name="password_confirmation" autocomplete="off" value="" class="form-control input">
								</div>
								<div class="col-sm-3">
									<a href="#">表示する</a>
								</div>
							</div>
							
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="button" class="btn btn-default btn-lg pull-left" onclick="history.back();">戻る</button>
						<button type="submit" class="btn btn-primary btn-lg">パスワードを設定する</button>
					</div>
				</form>
				
			</div>
		</div>
		
	</section>
	
</div>
@endsection