<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<title>{{ $title ?? '' }}</title>
<link rel="icon" href="{{ asset('public/assets/images/fevicon/fevicon.png') }}" type="image/gif"/>
<link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/css/colors1.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/css/custom.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/revolution/css/settings.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/revolution/css/layers.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/revolution/css/navigation.css') }}" />
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@yield("css")
