<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="icon" href="{{ asset('assets/images/fevicon/fevicon.png') }}" type="image/gif"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/career.css') }}">
</head>
<body>
    <div class="container mt-sm-5 my-1">
        <img src="{{ $data->image }}" class="w-100" />
    </div>

    @foreach($data->question as $index => $question)

<form action="{{ url('/career/apply') }}" method="post">
    @csrf
    <div class="container mt-sm-5 my-1">
        <div class="question ml-sm-5 pl-sm-5 pt-2">
            <div class="py-2 h5"><b>{{ $index + 1 }} {{ $question->question }}</b></div>
            <div class="pt-sm-0 pt-3" id="options_{{ $index }}">
                @foreach($question['answer'] as $idx => $answer)
                <label class="options">{{ $answer['answer'] }}
                    <input type="radio" name="opportunity_{{ $index }}" value="{{ $answer['point'] }}"> <span class="checkmark"></span>
                </label>
                @endforeach
            </div>
        </div>
    </div>

    @endforeach
    <input type="hidden" name="total_question" value="{{ count($data->question) }}">
    <input type="hidden" name="opportunity" value="{{ $data->opportunity_id }}">
    <div class="container mt-sm-5 my-1 text-center" style="background-color: transparent;">
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
