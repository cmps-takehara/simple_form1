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
				{{ Form::open([
					'method' => 'post',
					'url'    => route('continuous_transition.store'),
					'name'   => 'sentMessage',
					'id'     => 'applicationForm',
					'class'  => 'form-horizontal'
				]) }}
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
					@foreach($customerInfo as $key => $value)
					<input type ="hidden"  name="{{ $key }}" value="{{ $value }}">
					@endforeach
				{{ Form::close() }}
				</form>
			</div>
		</div>
	</section>
</div>
@endsection
