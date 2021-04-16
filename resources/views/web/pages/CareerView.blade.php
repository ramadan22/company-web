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
                            <h1 class="page-title">Career</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Career</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->

<div class="section padding_layout_1 service_list">
    <div class="container">
        <div class="row">
            @foreach($data as $career)
            <div class="col-md-4 service_blog margin_bottom_50">
                <div class="full">
                    <div class="service_img"> <img class="img-responsive" src="{{ $career->image }}" alt="#" /> </div>
                    <div class="service_cont">
                        <h3 class="service_head">{{ $career->title }}</h3>
                        <p>{{ $career->description }}</p>
                        <div class="bt_cont"> <a class="btn sqaure_bt" href="{{ url('/career/apply/' . $career->opportunity_id) }}">Apply This Career</a> </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
