<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="icon" href="{{ asset('assets/images/fevicon/fevicon.png') }}" type="image/gif"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body {
            background-color: #333
        }

        .container {
            background-color: #555;
            color: #ddd;
            border-radius: 10px;
            padding: 20px;
            font-family: 'Montserrat', sans-serif;
            max-width: 700px
        }

        .container>p {
            font-size: 32px
        }

        .question {
            width: 75%
        }

        .options {
            position: relative;
            padding-left: 40px
        }

        #options label {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            cursor: pointer
        }

        .options input {
            opacity: 0
        }

        .checkmark {
            position: absolute;
            top: -1px;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #555;
            border: 1px solid #ddd;
            border-radius: 50%
        }

        .options input:checked~.checkmark:after {
            display: block
        }

        .options .checkmark:after {
            content: "";
            width: 10px;
            height: 10px;
            display: block;
            background: white;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 300ms ease-in-out 0s
        }

        .options input[type="radio"]:checked~.checkmark {
            background: #21bf73;
            transition: 300ms ease-in-out 0s
        }

        .options input[type="radio"]:checked~.checkmark:after {
            transform: translate(-50%, -50%) scale(1)
        }

        .btn-primary {
            background-color: #555;
            color: #ddd;
            border: 1px solid #ddd
        }

        .btn-primary:hover {
            background-color: #21bf73;
            border: 1px solid #21bf73
        }

        .btn-success {
            padding: 5px 25px;
            background-color: #21bf73
        }

        @media(max-width:576px) {
            .question {
                width: 100%;
                word-spacing: 2px
            }
        }
    </style>
</head>
<body>
    <div class="container mt-sm-5 my-1">
        <img src="{{ asset('assets/images/banner_pencils.png') }}" class="w-100" />
    </div>

    <div class="container mt-sm-5 my-1">
        <div class="question ml-sm-5 pl-sm-5 pt-2">
            <div class="py-2 h5"><b>1. which option best describes your job role?</b></div>
            <div class="pt-sm-0 pt-3" id="options"> <label class="options">Small Business Owner or Employee <input type="radio" name="radio"> <span class="checkmark"></span> </label> <label class="options">Nonprofit Owner or Employee <input type="radio" name="radio"> <span class="checkmark"></span> </label> <label class="options">Journalist or Activist <input type="radio" name="radio"> <span class="checkmark"></span> </label> <label class="options">Other <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
        </div>
    </div>

    <div class="container mt-sm-5 my-1">
        <div class="question ml-sm-5 pl-sm-5 pt-2">
            <div class="py-2 h5"><b>2. which option best describes your job role?</b></div>
            <div class="pt-sm-0 pt-3" id="options"> <label class="options">Small Business Owner or Employee <input type="radio" name="radio"> <span class="checkmark"></span> </label> <label class="options">Nonprofit Owner or Employee <input type="radio" name="radio"> <span class="checkmark"></span> </label> <label class="options">Journalist or Activist <input type="radio" name="radio"> <span class="checkmark"></span> </label> <label class="options">Other <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
        </div>
    </div>

    <div class="container mt-sm-5 my-1 text-center" style="background-color: transparent;">
        <button class="btn btn-success">Simpan</button>
    </div>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
