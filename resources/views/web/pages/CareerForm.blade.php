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

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            var formValue = 1;
            $(".add").click(function() {
                formValue = formValue+1;
                $(".file-add").append('<input type="file" required class="form-control mb-1" id="file-form-'+formValue+'" />');
            });
            $(".remove").click(function() {
                if(formValue > 1){
                    $(".file-add input#file-form-"+formValue).remove();
                    formValue = formValue-1;
                }
            });
        })
    </script>

    <style>
        .clear-border {
            border: none;
        }
    </style>
</head>
<body>
    <div class="container mt-sm-5 my-1">
        <img src="{{ $data->image }}" class="w-100" />
    </div>
    <form enctype="multipart/form-data" action="{{ url('/career/apply') }}" method="post">
        @csrf
        @foreach($data->question as $index => $question)
        <div class="container mt-sm-5 my-1">
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>{{ $index + 1 }} {{ $question->question }}</b></div>
                <div class="pt-sm-0 pt-3" id="options_{{ $index }}">
                    @foreach($question['answer'] as $idx => $answer)
                    <label class="options">{{ $answer['answer'] }}
                        <input required type="radio" name="opportunity_{{ $index }}" value="{{ $answer['point'] }}"> <span class="checkmark"></span>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>

    @endforeach
    <input type="hidden" name="total_question" value="{{ count($data->question) }}">
    <input type="hidden" name="opportunity" value="{{ $data->opportunity_id }}">
    <div class="container mt-sm-5 my-1 text-center" style="background-color: transparent;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalSupport">Process</button>
    </div>

    <div class="modal fade in" id="modalSupport" tabindex="-1" role="dialog" aria-labelledby="modalSupportLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header clear-border">
              <h5 class="modal-title" id="modalSupportLongTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="m-2">Email</div>
                <div class="m-2"><input type="email" name="email" placeholder="jhon@gmail.com" required class="form-control" /></div>
                <div class="mt-4 m-2">
                    Additional Document ( e.g : CV, Certificate )
                    <button type="button" class="btn btn-primary add" value="1" style="width: 20px; padding: 0; float: right;">+</button>
                    <button type="button" class="btn btn-primary remove" value="1" style="width: 20px; padding: 0; float: right;">-</button>
                </div>
                <div class="m-2 file-add">
                    <input type="file" name="attachment[]" class="form-control mb-1" id="file-form-1" />
                </div>
            </div>
            <div class="modal-footer clear-border">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
    </div>

</form>

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
