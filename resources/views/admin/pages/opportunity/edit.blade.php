@extends('admin.layout.main')

@section('css')
    <style media="screen">
        .input-label-answer {
            border: none;
            background-color: unset !important;
        }
    </style>
@endsection

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form action="{{ url('admin/opportunity__update/' . $data->opportunity_id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div id="login-alert" class="alert alert-danger col-sm-12">
                            <h4>{{$errors->first()}}</h4>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Opportunity Title</label>
                                <input type="text" name="opportunity_title" value="{{ request()->old('opportunity_title') ?? $data->title }}"
                                    required class="form-control" autocomplete="off"
                                />
                            </div>
                            <div class="form-group">
                                <label>Point Required</label>
                                <input type="number" name="opportunity_point" value="{{ request()->old('opportunity_point') ?? $data->point_required }}"
                                    required class="form-control" autocomplete="off"
                                />
                            </div>
                            <div class="form-group d-none" id="img-input">
                                <label>Opportunity Image</label>
                                <input style="padding:3px" type="file" name="opportunity_image" class="form-control" />
                                <div class="">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="cancelChangeImage()">Cancel</button>
                                </div>
                            </div>
                            <div class="form-group"  id="img-container">
                                <label>Opportunity Image</label>
                                <div class="pb-1">
                                    <img src="{{ $data->image }}" style="width:50%" />
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="changeImage()">Change Image</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Opportunity Description</label>
                                <textarea required name="opportunity_description" rows="5" cols="5" class="form-control">{{ request()->old('opportunity_description') ?? $data->description }}</textarea>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6">
                                <label>Interview Date Start</label>
                                <input type="date" name="interview_date_start" value="{{ request()->old('interview_date_start') ?? $data->interview_date_start }}"
                                required class="form-control" autocomplete="off"
                                />
                              </div>
                              <div class="form-group col-md-6">
                                <label>Interview Date End</label>
                                <input type="date" name="interview_date_end" value="{{ request()->old('interview_date_end') ?? $data->interview_date_end }}"
                                required class="form-control" autocomplete="off"
                                />
                              </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Opportunity Location</label>
                                <input type="text" name="opportunity_province" value="{{ request()->old('opportunity_province') ?? $data->other['location']['province'] }}"
                                    required class="form-control" placeholder="Province" autocomplete="off"
                                />
                                <br>
                                <input type="text" name="opportunity_city" value="{{ request()->old('opportunity_city') ?? $data->other['location']['city'] }}"
                                    required class="form-control" placeholder="City" autocomplete="off"
                                />
                                <br>
                                <textarea name="opportunity_address" required rows="5" cols="5" placeholder="Address" class="form-control">{{ request()->old('opportunity_address') ?? $data->other['location']['address'] }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Opportunity Total</label>
                                <input type="number" name="opportunity_total" value="{{ request()->old('opportunity_total') ?? $data->other['total_opportunity'] }}"
                                    required class="form-control" autocomplete="off"
                                />
                            </div>
                            <div class="form-group">
                                <label>Opportunity Expired</label>
                                <input type="date" name="job_expired" value="{{ request()->old('job_expired') ?? $data->job_expired }}"
                                    required class="form-control" autocomplete="off"
                                />
                            </div>
                        </div>
                        <!-- question -->
                        <div class="col-md-12">
                            <hr>
                        </div>
                        @foreach($data->question as $index => $question)
                            <input type="hidden" name="question_id[]" value="{{ $question['question_id'] }}">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Opportunity Question</label>
                                    <textarea required name="opportunity_question[]" rows="5" cols="5" class="form-control">{{ request()->old('opportunity_question')[0] ?? $question['question'] }}</textarea>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-5">
                                        <button type="button" onclick="addQuestion()" class="btn btn-sm btn-primary">Add More Question</button>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    @foreach($question['answer'] as $idx => $answer)
                                    <div class="form-group row" row_id="{{ $idx+1 }}-{{ $index }}">

                                        <input type="hidden" name="answer_id_{{ $index }}[]" value="{{ $answer['answer_id'] }}">

                                        <div class="col-md-1">
                                            @if($idx == 0)
                                            <label>Close</label>
                                            @endif
                                            <button type="button" onclick="deleteAnswer({{ $answer['answer_id'] }}, '{{ $idx+1 }}-{{ $index }}')" class="mt-1 btn btn-sm btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-9">
                                            @if($idx == 0)
                                            <label>Answer Is</label>
                                            @endif
                                            <input type="text" name="answer_{{ $index }}[]" value="{{ request()->old('answer')[0] ?? $answer['answer'] }}"
                                                required class="form-control" placeholder="answer" autocomplete="off"
                                            />
                                        </div>
                                        <div class="col-md-2">
                                            @if($idx == 0)
                                            <label>Point Reward</label>
                                            @endif
                                            <input type="number" name="point_{{ $index }}[]" value="{{ request()->old('point')[0] ?? $answer['point'] }}"
                                                required class="form-control" placeholder="reward" autocomplete="off"
                                            />
                                        </div>
                                    </div>
                                    @endforeach
                                    <span jq="more-answer" question="{{ $index }}" total-answer="{{ count($question['answer']) }}"></span>

                                    @if($index == 0)
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-5">
                                            <button type="button" onclick="addAnswer()" class="btn btn-sm btn-primary">Add More Answer</button>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-5">
                                            <button type="button" onclick="addAnswer({{ $index }})" class="btn btn-sm btn-primary">Add More Answer</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <span style="display:contents" jq="more-question" total-question="{{ $index }}"></span>
                        @endforeach

                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-7 offset-md-5">
                        <button type="submit" class="btn btn-sm btn-dark">Update</button>
                        <button type="button" onclick="window.location.assign('/admin/opportunity')" class="btn btn-sm btn-danger">Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section("js")
<script>
    $('li[parent="opportunity"]').addClass('nav-item menu-is-opening menu-open')
    $('a[menu="opportunity"]').addClass('active')
    $('a[menu="opportunity-list"]').addClass('active')
</script>
<script type="text/javascript">
    async function addAnswer(question = 0) {
        let totalAnswer   = $('span[jq="more-answer"][question="'+ question +'"]').attr('total-answer')
        let total = parseInt(1) + parseInt(totalAnswer)

        $('span[jq="more-answer"][question="'+ question +'"]').append(
            '<div class="form-group row" row_id="'+ total +'-'+ question +'">'
                +'<div class="col-md-1">'
                    +'<button type="button" onclick="removeAnswer('+ total + ',' + question +')" class="mt-1 btn btn-sm btn-danger">'
                        +'<i class="fas fa-times"></i>'
                    +'</button>'
                +'</div>'
                +'<div class="col-md-9">'
                    +'<input type="text" name="answer_'+ question +'[]" required '
                        +'class="form-control" placeholder="answer" autocomplete="off"'
                    +'/>'
                +'</div>'
                +'<div class="col-md-2">'
                    +'<input type="number" name="point_'+ question +'[]" required '
                        +'class="form-control" placeholder="reward" autocomplete="off"'
                    +'/>'
                +'</div>'
            +'</div>'
        ).attr('total-answer', total)
    }

    async function removeAnswer(id, question = 0) {
        let totalAnswer = $('span[jq="more-answer"][question="'+ question +'"]').attr('total-answer')
        let total = parseInt(1) - parseInt(totalAnswer)

        $('div[row_id="'+ id +'-'+ question +'"]').remove()
    }

    async function addQuestion() {
        let totalQuestion   = $('span[jq="more-question"]').attr('total-question')
        let total = parseInt(1) + parseInt(totalQuestion)

        $('span[jq="more-question"]').append(
            '<span question_id="'+ totalQuestion +'" style="display:contents">'
                +'<div class="col-md-12">'
                    +'<hr>'
                +'</div>'
                +'<div class="col-md-6">'
                    +'<div class="form-group">'
                        +'<label>Opportunity Question</label>'
                        +'<textarea name="opportunity_question[]" rows="5" cols="5" class="form-control" required></textarea>'
                    +'</div>'

                    +'<div class="form-group row">'
                        +'<div class="col-md-6 offset-md-5">'
                            +'<button type="button" onclick="removeQuestion('+ totalQuestion +')" class="btn btn-sm btn-danger">Remove</button>'
                        +'</div>'
                    +'</div>'
                +'</div>'
                +'<div class="col-md-6">'
                    +'<div class="form-group row">'
                        +'<div class="col-md-1">'
                            +'<label>&nbsp;</label>'
                            +'<input type="text" disabled value="A" class="input-label-answer form-control font-weight-bold"/>'
                        +'</div>'
                        +'<div class="col-md-9">'
                            +'<label>Answer Is</label>'
                            +'<input type="text" name="answer_'+ total +'[]" required '
                                +'class="form-control" placeholder="answer" autocomplete="off"'
                            +'/>'
                        +'</div>'
                        +'<div class="col-md-2">'
                            +'<label>Point Reward</label>'
                            +'<input type="number" name="point_'+ total +'[]" required '
                                +'class="form-control" placeholder="reward" autocomplete="off"'
                            +'/>'
                        +'</div>'
                    +'</div>'
                    +'<div class="form-group row">'
                        +'<div class="col-md-1">'
                            +'<input type="text" disabled value="B" class="input-label-answer form-control font-weight-bold"/>'
                        +'</div>'
                        +'<div class="col-md-9">'
                            +'<input type="text" name="answer_'+ total +'[]" required '
                                +'class="form-control" placeholder="answer" autocomplete="off"'
                            +'/>'
                        +'</div>'
                        +'<div class="col-md-2">'
                            +'<input type="number" name="point_'+ total +'[]" required '
                                +'class="form-control" placeholder="reward" autocomplete="off"'
                            +'/>'
                        +'</div>'
                    +'</div>'
                    +'<div class="form-group row">'
                        +'<div class="col-md-1">'
                            +'<input type="text" disabled value="C" class="input-label-answer form-control font-weight-bold"/>'
                        +'</div>'
                        +'<div class="col-md-9">'
                            +'<input type="text" name="answer_'+ total +'[]" required '
                                +'class="form-control" placeholder="answer" autocomplete="off"'
                            +'/>'
                        +'</div>'
                        +'<div class="col-md-2">'
                            +'<input type="number" name="point_'+ total +'[]" required '
                                +'class="form-control" placeholder="reward" autocomplete="off"'
                            +'/>'
                        +'</div>'
                    +'</div>'

                    +'<span jq="more-answer" question="'+ total +'" total-answer="1"></span>'

                    +'<div class="form-group row">'
                        +'<div class="col-md-6 offset-md-5">'
                            +'<button type="button" onclick="addAnswer('+ total +')" class="btn btn-sm btn-primary">Add More Answer</button>'
                        +'</div>'
                    +'</div>'
                +'</div>'
            +'</span>'
        ).attr('total-question', total)
    }

    async function removeQuestion(id) {
        let totalQuestion   = $('span[jq="more-question"]').attr('total-question')
        let total = parseInt(1) - parseInt(totalQuestion)

        $('span[question_id="'+ id +'"]').remove()
    }

    async function changeImage() {
        $('#img-container').addClass('d-none');
        $('#img-input').removeClass('d-none');
        $('input[type="file"]').attr('required', true)
    }

    async function cancelChangeImage() {
        $('#img-container').removeClass('d-none');
        $('#img-input').addClass('d-none');
        $('input[type="file"]').val('').attr('required', false)
    }

    async function deleteAnswer(id, row_id) {
        console.log(row_id)
        $.ajax({
            url: '/api/opportunity/remove-answer',
            type: 'GET',
            dataType: 'json',
            data: {
                answer_id: id
            },
            async: true,
            success: function(res){
                if (res.code === 200) {
                    $('div[row_id="'+ row_id +'"]').remove()
                }
            }
        })
    }
</script>
@endsection
