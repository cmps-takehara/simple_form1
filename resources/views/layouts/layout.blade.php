<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<!-- //require_once('head.php'); -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="robots" content="noindex , nofollow">
	<meta name="format-detection" content="telephone=no">
	<meta name="author" content="http://webthemez.com" />
	<meta name="csrf-token" content="{{csrf_token()}}">
	<!-- css -->
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('/css/style.css') }}">
	<link rel="stylesheet" href="{{asset('/css/contents.css')}}"/>
	<link rel="stylesheet" href="{{asset('/css/animate.css')}}"/>
	<link rel="stylesheet" href="{{asset('/css/app.css')}}"/>
</head>
<body>
<div id="wrapper">
	@include('/form/header')
	@yield('inner-headline')
	@yield('form-content')
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{asset('/js/jquery.js/')}}"></script>
	<script src="{{asset('/js/bootstrap.min.js/')}}"></script>
	<!-- Vendor Scripts -->
	<script src="{{asset('/js/modernizr.custom.js/')}}"></script>
	<script src="{{asset('/js/jquery.jpostal.js/')}}"></script>
	<script src="{{asset('/js/application.js/')}}"></script>


	<script>
	$(function(){
		
		// 郵便番号住所検索実行
		new appForm.insertAddress({
			zip_elm1    : "#user_zip1",
			zip_elm2    : "#user_zip2",
			pref        : "#pref",
			pref_kana   : "#pref_kana",
			city        : "#city",
			city_kana   : "#city_kana",
			address     : "#address1",
			address_kana: "#address1_kana"
		});
		
		
	});
	</script>


</div>

</body>

</html>

 
