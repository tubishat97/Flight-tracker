<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Fligh tracker</title>
    <meta name="description"
        content="This is a free Bootstrap landing page theme created for BootstrapZero. Feature video background and one page design." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" />
    <style>
        @import url(https://fonts.googleapis.com/css?family=Questrial);
        @import url(http://fonts.googleapis.com/css?family=Dancing+Script:700);

        html,
        body {
            width: 100%;
            height: 100%;
        }

        body {
            font-family: 'Questrial', 'Helvetica Neue', Arial, sans-serif;
            background-color: #282828;
            color: #d3d3d3;
            webkit-tap-highlight-color: #222;
        }

        hr {
            max-width: 80px;
            border-width: 3px;
            opacity: 0.09;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        hr.light {
            border-color: #fff;
        }

        a {
            color: #9c27b0;
            -webkit-transition: all .35s;
            -moz-transition: all .35s;
            transition: all .35s;
        }

        a:hover,
        a:focus {
            color: #9c27c1;
            outline: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Questrial', 'Helvetica Neue', Arial, sans-serif;
        }

        p {
            font-size: 17px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .wide-space {
            letter-spacing: 1.6px;
        }

        .icon-lg {
            font-size: 50px;
            line-height: 18px;
        }

        .bg-primary {
            background-color: #333;
        }

        .bg-dark {
            color: #eee;
            background-color: #222;
        }

        .cursive {
            font-family: 'Dancing Script', cursive;
            text-transform: none;
        }

        .text-faded {
            color: rgba(245, 245, 245, 0.7);
        }

        .text-dark {
            color: #111;
        }

        .text-primary {
            color: #9c27b0;
        }

        .modal-content {
            background-color: #1d1d1d;
        }

        section {
            padding: 70px 0;
        }

        aside {
            padding: 50px 0;
        }

        footer {
            padding: 15px;
        }

        .no-padding {
            padding: 0;
        }

        .navbar-default {
            border-color: rgba(35, 35, 35, .05);
            font-family: 'Questrial', 'Helvetica Neue', Arial, sans-serif;
            background-color: #222;
            -webkit-transition: all .4s;
            -moz-transition: all .4s;
            transition: all .4s;
        }

        .navbar-header>.navbar-brand {
            font-family: 'Questrial', 'Helvetica Neue', Arial, sans-serif;
            color: #9c27b0;
            padding: 15px;
            -webkit-transition: padding .2s ease-in;
            -moz-transition: padding .2s ease-in;
            transition: padding .2s ease-in;
        }

        .navbar-header>.navbar-brand:hover,
        .navbar-header>.navbar-brand:focus {
            color: #8b27b0;
        }

        .navbar-default .navbar-toggle:focus,
        .navbar-default .navbar-toggle:hover {
            background-color: #181818;
        }

        .navbar-default .navbar-toggle,
        .navbar-default .navbar-collapse {
            border-color: transparent;
        }

        .navbar-default .nav>li>a,
        .navbar-default .nav>li>a:focus {
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 700;
            color: #eee;
        }

        .navbar-default .nav>li>a:hover,
        .navbar-default .nav>li>a:focus:hover {
            color: #9c27b0;
        }

        .navbar-default .nav>li.active>a,
        .navbar-default .nav>li.active>a:focus {
            color: #9c27b0 !important;
            background-color: transparent;
        }

        .navbar-default .nav>li.active>a:hover,
        .navbar-default .nav>li.active>a:focus:hover {
            background-color: transparent;
        }


        @media(min-width:768px) {
            .navbar-default {
                border-color: transparent;
                background-color: transparent;
                min-height: 60px;
            }

            .navbar-header>.navbar-brand {
                color: rgba(255, 255, 255, 0.7);
                padding: 19px;
            }

            .navbar-default .navbar-header .navbar-brand:hover,
            .navbar-default .navbar-header .navbar-brand:focus {
                color: #f4f4f4;
            }

            .navbar-default .nav>li>a,
            .navbar-default .nav>li>a:focus {
                color: rgba(255, 255, 255, 0.8);
                padding: 20px;
                letter-spacing: 1.1px;
                text-shadow: 1px 1px 1px rgba(60, 60, 60, 0.7);
            }

            .navbar-default .nav>li>a:hover,
            .navbar-default .nav>li>a:focus:hover {
                color: #fefefe;
            }

            .navbar-default.affix {
                border-color: rgba(34, 34, 34, .05);
                background-color: #222;
            }

            .navbar-default.affix .navbar-header .navbar-brand {
                font-size: 15px;
                color: #9c27b0;
                padding: 20px;
                letter-spacing: 1px;
            }

            .navbar-default.affix .navbar-header .navbar-brand:hover,
            .navbar-default.affix .navbar-header .navbar-brand:focus {
                color: #8b27b0;
            }

            .navbar-default.affix .nav>li>a,
            .navbar-default.affix .nav>li>a:focus {
                color: #ddd;
                text-shadow: 1px 1px 1px rgba(30, 30, 30, 0.7);
            }

            .navbar-default.affix .nav>li>a:hover,
            .navbar-default.affix .nav>li>a:focus:hover {
                color: #9c27b0;
            }
        }

        header {
            position: relative;
            min-height: auto;
            text-align: center;
            color: #fff;
            width: 100%;
            background-color: #ffffff;
        }

        header .header-content {
            position: relative;
            width: 100%;
            padding: 100px 15px;
            text-align: center;
            z-index: 2;
        }

        header .header-content .inner h1 {
            margin-top: 0;
            margin-bottom: 0;
        }

        header .header-content .inner p {
            margin-bottom: 50px;
            font-size: 16px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.7);
        }

        #video-background {
            position: absolute;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 1;
        }

        #video-background.collapsing {
            display: none;
        }

        footer {
            background-color: #2d2d2d;
        }

        @media(min-width:768px) {
            .icon-lg {
                font-size: 80px;
            }

            header {
                min-height: 100%;
            }

            header .header-content {
                position: absolute;
                top: 50%;
                padding: 0 50px;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }

            header .header-content .inner {
                margin-right: auto;
                margin-left: auto;
                max-width: 1000px;
            }

            header .header-content .inner h1 {
                font-size: 53px;
            }

            header .header-content .inner p {
                margin-right: auto;
                margin-left: auto;
                max-width: 80%;
                font-size: 18px;
            }

            section {
                min-height: 600px;
                padding: 100px 0;
            }

        }

        .form-control {
            display: block;
            width: 100%;
            height: 35px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.5;
            color: #eee;
            background-color: #36333d;
            background-image: none;
            border: 1px solid #36333d;
            border-radius: 4px;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }

        .form-control:focus {
            color: #222;
            background-color: #ccc;
            box-shadow: none;
        }

        textarea {
            resize: none;
        }

        .margin-top-0 {
            margin-top: 0;
        }

        .feature {
            margin: 50px auto 0;
            max-width: 400px;
        }

        @media(min-width:992px) {
            .feature {
                margin: 20px auto 0;
            }
        }

        .feature p {
            margin-bottom: 0;
        }

        .call-to-action h2 {
            margin: 0 auto 20px;
        }

        .gallery-box {
            display: block;
            position: relative;
            margin: 0 auto;
            max-width: 650px;
            overflow: hidden;
        }

        .gallery-box .gallery-box-caption {
            display: block;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100%;
            text-align: center;
            color: #fff;
            opacity: 0;
            background: rgba(44, 44, 44, .8);
            -webkit-transition: all .35s;
            -moz-transition: all .35s;
            transition: all .35s;
        }

        .gallery-box .gallery-box-caption .gallery-box-content {
            position: absolute;
            top: 50%;
            width: 100%;
            text-align: center;
            transform: translateY(-50%);
        }

        .gallery-box:hover .gallery-box-caption {
            opacity: 1;
        }

        .gallery-box:hover img {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }

        .gallery-box img {
            -webkit-transition: all 300ms ease-in-out;
            transition: all 300ms ease-in-out;
        }

        .no-gutter>[class*=col-] {
            padding-right: 0;
            padding-left: 0;
        }

        .btn-default {
            border-color: #fff;
            color: #222;
            background-color: #fff;
            -webkit-transition: all .35s;
            -moz-transition: all .35s;
            transition: all .35s;
        }

        .btn-default:hover,
        .btn-default:focus,
        .btn-default.focus,
        .btn-default:active,
        .btn-default.active,
        .open>.dropdown-toggle.btn-default {
            border-color: #ededed;
            color: #222;
            background-color: #f2f2f2;
            opacity: 0.7;
        }

        .btn-default:active,
        .btn-default.active,
        .open>.dropdown-toggle.btn-default {
            background-image: none;
        }

        .btn-default.disabled,
        .btn-default[disabled],
        fieldset[disabled] .btn-default,
        .btn-default.disabled:hover,
        .btn-default[disabled]:hover,
        fieldset[disabled] .btn-default:hover,
        .btn-default.disabled:focus,
        .btn-default[disabled]:focus,
        fieldset[disabled] .btn-default:focus,
        .btn-default.disabled.focus,
        .btn-default[disabled].focus,
        fieldset[disabled] .btn-default.focus,
        .btn-default.disabled:active,
        .btn-default[disabled]:active,
        fieldset[disabled] .btn-default:active,
        .btn-default.disabled.active,
        .btn-default[disabled].active,
        fieldset[disabled] .btn-default.active {
            border-color: #fff;
            background-color: #fff;
            opacity: 0.7;
        }

        .btn-default .badge {
            color: #fff;
            background-color: #222;
        }

        .btn.btn-primary {
            background-color: transparent;
            border: 1px solid #f0f0f0;
            border-color: #f0f0f0;
            -webkit-transition: all .35s;
            -moz-transition: all .35s;
            transition: all .35s;
        }

        .btn.btn-primary:hover {
            opacity: 0.7;
        }

        .btn {
            border: 0;
            border-radius: 290px;
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }

        .btn-xl {
            padding: 15px 30px;
            font-size: 20px;
        }

        ::-moz-selection {
            text-shadow: none;
            color: #fff;
            background: #222;
        }

        ::selection {
            text-shadow: none;
            color: #fff;
            background: #222;
        }

        img::selection {
            color: #fff;
            background: 0 0;
        }

        img::-moz-selection {
            color: #fff;
            background: 0 0;
        }
    </style>
</head>

<body>
    <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
        </div>
    </nav>
    <header id="first">
        <div class="header-content">
            <div class="inner">
                <img src="{{ asset('img/logo.jpg') }}" alt="Smile">
            </div>
        </div>
    </header>
</body>
</html>
