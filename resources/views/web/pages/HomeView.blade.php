@extends('web.layout.main')

@section('css')
    <style>
        .button-custom {
            min-width: unset !important;
            height: 14px !important;
            padding: 0px 6px !important;
            line-height: 12px !important;
            font-size: 10px !important;
            margin: 0 !important;
            text-transform: lowercase !important;
            margin-left: 10px !important;
            display: inline !important;
            border-radius: 10px !important;
        }
    </style>
@endsection

@section('page')
<!-- section -->
@component('web.layout.slider', ['banner' => [$data->banner]])@endcomponent
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1" id="aboutus">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="main_heading text_align_center">
              <h2>About Us</h2>
              <p class="large">Fastest repair service with best price!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30">
            <div class="center">
              <div class="icon"> <img src="{{ url('') }}/assets/images/it_service/i1.png" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Data recovery</h4>
            <p>Perspiciatis eos quos totam cum minima aut!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30">
            <div class="center">
              <div class="icon"> <img src="{{ url('') }}/assets/images/it_service/i2.png" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Computer repair</h4>
            <p>Perspiciatis eos quos totam cum minima aut!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30">
            <div class="center">
              <div class="icon"> <img src="{{ url('') }}/assets/images/it_service/i3.png" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Mobile service</h4>
            <p>Perspiciatis eos quos totam cum minima aut!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="full text_align_center margin_bottom_30 margin_0">
            <div class="center">
              <div class="icon"> <img src="{{ url('') }}/assets/images/it_service/i4.png" alt="#" /> </div>
            </div>
            <h4 class="theme_color">Network solutions</h4>
            <p>Perspiciatis eos quos totam cum minima aut!</p>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 35px">
        <div class="col-md-8">
          <div class="full margin_bottom_30">
            <div class="accordion border_circle">
              <div class="bs-example">
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-bar-chart" aria-hidden="true"></i> Complete Recovery from Local & External Drive<i class="fa fa-angle-down"></i></a> </p>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                          over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                          consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-plane"></i> Recovery Photo, Image, Video and Audio<i class="fa fa-angle-down"></i></a> </p>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                          over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                          consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-star"></i> Mobile Phone Recovery<i class="fa fa-angle-down"></i></a> </p>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="panel-body">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                          over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                          consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-bar-chart" aria-hidden="true"></i> Complete Recovery from Local & External Drive<i class="fa fa-angle-down"></i></a> </p>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                          over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                          consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="full" style="margin-top: 35px;">
            <h3>Need file recovery?</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et
              quasi architecto beatae vitae dicta sunt explicabo.. </p>
            <p><a class="btn main_bt" href="#">Read More</a></p>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- end section -->

<!-- section -->
<div class="section padding_layout_1" id="news">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="main_heading text_align_left">
              <h2>Latest from Our Blog</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($data->news as $row)
        <div class="col-md-4">
          <div class="full blog_colum">
            <div class="blog_feature_img"> <img src="{{ $row->news_image }}" alt="#" /> </div>
            <div class="post_time">
              <p><i class="fa fa-clock-o"></i> {{ date('F m, Y', strtotime($row->created_at)) }}</p>
            </div>
            <div class="blog_feature_head">
              <h4>{{ $row->news_title }}</h4>
            </div>
            <div class="blog_feature_cont">
              <p>{!! strlen(strip_tags($row->news_content)) > 100 ? substr(strip_tags($row->news_content), 0, 100)."...<a href='' class='btn btn-primary btn-sm button-custom'>See More</a>" : strip_tags($row->news_content) !!}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</div>
<!-- end section -->

<!-- section -->
<div class="section padding_layout_1 mb-5" id="contactus">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="full">
                <div class="main_heading text_align_center">
                    <h2>Contact Us</h2>
                    <p class="large">Fastest repair service with best price!</p>
                </div>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            <div class="full">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
                <div class="form_section p-0 m-0">
                  <form class="form_contant" method="POST" action="{{ url('contactus') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <fieldset>
                    <div class="row">
                      <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input class="field_custom" name="subject" placeholder="Subject" type="text" required />
                      </div>
                      <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input class="field_custom" name="email" placeholder="Email" type="email" required />
                      </div>
                      <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <textarea class="field_custom" name="message" placeholder="Messager" required ></textarea>
                      </div>
                      <div class="center"><button class="btn main_bt" type="submit">SUBMIT NOW</button></div>
                    </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- end section -->

  @endsection
