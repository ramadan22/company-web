@extends('web.layout.main')

@section('page')

<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="title-holder">
              <div class="title-holder-cell text-left">
                <h1 class="page-title">Contact Us</h1>
                <ol class="breadcrumb">
                  <li><a href="index.html">Home</a></li>
                  <li class="active">Contact Us</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- end inner page banner -->

<div class="section padding_layout_1">
    <div class="container">
      <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            <div class="full">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
                <h4>GET IN TOUCH</h4>
                <p>Our goal is to provide the best customer service and to answer all of your questions in a timely manner.</p>
                <div class="form_section">
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

@endsection
