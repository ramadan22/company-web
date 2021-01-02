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
            <form action="{{ url('admin/opportunity__save') }}" enctype="multipart/form-data" method="post">
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
                                <input type="text" name="opportunity_title" value="{{ request()->old('opportunity_title') ?? '' }}"
                                    class="form-control" autocomplete="off"
                                />
                            </div>
                            <div class="form-group">
                                <label>Point Required</label>
                                <input type="number" name="opportunity_point" value="{{ request()->old('point_required') ?? '' }}"
                                    class="form-control" autocomplete="off"
                                />
                            </div>
                            <div class="form-group">
                                <label>Opportunity Image</label>
                                <input style="padding:3px" type="file" name="opportunity_image" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Opportunity Description</label>
                                <textarea name="opportunity_description" rows="5" cols="5" class="form-control">{{ request()->old('opportunity_description') ?? '' }}</textarea>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Opportunity Location</label>
                                <input type="text" name="opportunity_province" value="{{ request()->old('opportunity_province') ?? '' }}"
                                    class="form-control" placeholder="Province" autocomplete="off"
                                />
                                <br>
                                <input type="text" name="opportunity_city" value="{{ request()->old('opportunity_city') ?? '' }}"
                                    class="form-control" placeholder="City" autocomplete="off"
                                />
                                <br>
                                <textarea name="opportunity_address" rows="5" cols="5" placeholder="Address" class="form-control">{{ request()->old('opportunity_address') ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Opportunity Total</label>
                                <input type="text" name="opportunity_total" value="{{ request()->old('opportunity_total') ?? '' }}"
                                    class="form-control" autocomplete="off"
                                />
                            </div>
                        </div>
                        <!-- question -->
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Opportunity Question</label>
                                <textarea name="opportunity_question" rows="5" cols="5" class="form-control">{{ request()->old('opportunity_question') ?? '' }}</textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-5">
                                    <button type="button" onclick="addQuestion()" class="btn btn-sm btn-primary">Add More Question</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-md-1">
                                    <label>&nbsp;</label>
                                    <input type="text" disabled value="A" class="input-label-answer form-control font-weight-bold"/>
                                </div>
                                <div class="col-md-9">
                                    <label>Answer Is</label>
                                    <input type="text" name="point[]" value="{{ request()->old('opportunity_point') ?? '' }}"
                                        class="form-control" placeholder="answer" autocomplete="off"
                                    />
                                </div>
                                <div class="col-md-2">
                                    <label>Point Reward</label>
                                    <input type="number" name="answer[]" value="{{ request()->old('opportunity_point') ?? '' }}"
                                        class="form-control" placeholder="reward" autocomplete="off"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1">
                                    <input type="text" disabled value="B" class="input-label-answer form-control font-weight-bold"/>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="point[]" value="{{ request()->old('opportunity_point') ?? '' }}"
                                        class="form-control" placeholder="answer" autocomplete="off"
                                    />
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="answer[]" value="{{ request()->old('opportunity_point') ?? '' }}"
                                        class="form-control" placeholder="reward" autocomplete="off"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1">
                                    <input type="text" disabled value="C" class="input-label-answer form-control font-weight-bold"/>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="point[]" value="{{ request()->old('opportunity_point') ?? '' }}"
                                        class="form-control" placeholder="answer" autocomplete="off"
                                    />
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="answer[]" value="{{ request()->old('opportunity_point') ?? '' }}"
                                        class="form-control" placeholder="reward" autocomplete="off"
                                    />
                                </div>
                            </div>

                            <span jq="more-answer" question="0" total-answer="1"></span>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-5">
                                    <button type="button" onclick="addAnswer()" class="btn btn-sm btn-primary">Add More Answer</button>
                                </div>
                            </div>
                        </div>

                        <span style="display:contents" jq="more-question" total-question="0"></span>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-7 offset-md-5">
                        <button type="submit" class="btn btn-sm btn-dark">Save</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                        <button type="button" onclick="window.location.assign('/admin/opportunity')" class="btn btn-sm btn-danger">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section("js")
<script>
    $('li[parent="admin"]').addClass('nav-item menu-is-opening menu-open')
    $('a[menu="admin"]').addClass('active')
    $('a[menu="admin-list"]').addClass('active')
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
                    +'<input type="text" name="answer[]" value="{{ request()->old('opportunity_point') ?? '' }}"'
                        +'class="form-control" placeholder="answer" autocomplete="off"'
                    +'/>'
                +'</div>'
                +'<div class="col-md-2">'
                    +'<input type="number" name="point[]" value="{{ request()->old('opportunity_point') ?? '' }}"'
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
                        +'<textarea name="opportunity_description" rows="5" cols="5" class="form-control">{{ request()->old('opportunity_description') ?? '' }}</textarea>'
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
                            +'<input type="text" name="point[]" value="{{ request()->old('opportunity_point') ?? '' }}"'
                                +'class="form-control" placeholder="answer" autocomplete="off"'
                            +'/>'
                        +'</div>'
                        +'<div class="col-md-2">'
                            +'<label>Point Reward</label>'
                            +'<input type="number" name="answer[]" value="{{ request()->old('opportunity_point') ?? '' }}"'
                                +'class="form-control" placeholder="reward" autocomplete="off"'
                            +'/>'
                        +'</div>'
                    +'</div>'
                    +'<div class="form-group row">'
                        +'<div class="col-md-1">'
                            +'<input type="text" disabled value="B" class="input-label-answer form-control font-weight-bold"/>'
                        +'</div>'
                        +'<div class="col-md-9">'
                            +'<input type="text" name="point[]" value="{{ request()->old('opportunity_point') ?? '' }}"'
                                +'class="form-control" placeholder="answer" autocomplete="off"'
                            +'/>'
                        +'</div>'
                        +'<div class="col-md-2">'
                            +'<input type="number" name="answer[]" value="{{ request()->old('opportunity_point') ?? '' }}"'
                                +'class="form-control" placeholder="reward" autocomplete="off"'
                            +'/>'
                        +'</div>'
                    +'</div>'
                    +'<div class="form-group row">'
                        +'<div class="col-md-1">'
                            +'<input type="text" disabled value="C" class="input-label-answer form-control font-weight-bold"/>'
                        +'</div>'
                        +'<div class="col-md-9">'
                            +'<input type="text" name="point[]" value="{{ request()->old('opportunity_point') ?? '' }}"'
                                +'class="form-control" placeholder="answer" autocomplete="off"'
                            +'/>'
                        +'</div>'
                        +'<div class="col-md-2">'
                            +'<input type="number" name="answer[]" value="{{ request()->old('opportunity_point') ?? '' }}"'
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
</script>
@endsection
