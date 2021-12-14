@extends('front.layouts.master')
@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(/front/images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>{{ $data->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 column">
                        <div class="job-single-sec style3">
                            <div class="job-head-wide">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="job-single-head3 emplye">
                                            <div class="job-thumb"> <img src="{{asset('/front/images/resource/sdf.png')}}" alt="" /></div>
                                            <div class="job-single-info3">
                                                <h3>{{ $data->name }}</h3>
                                                <span><i class="la la-user"></i>Uploaded By: {{$data->user->name}} </span>
                                                <span class="mx-3"><i class="la la-bars"></i> Item Type: Project Material</span>

                                                <span><i class="la la-book"></i> Pages: {{$data->pages}}</span>

                                                <span class="mx-3"><i class="la la-book"></i> chapters: {{$data->chapters}}</span>

                                                <ul class="tags-jobs">
                                                    <!-- <li><i class="la la-money"></i> Amount: 5000</li> -->
                                                    <!-- <li><i class="la la-calendar-o"></i> Post Date: July 29, 2017</li> -->
                                                    <li><a href="/download/{{$data->document}}"><i class="la la-download"></i>Project Download</a></li>
                                                </ul>
                                            </div>
                                        </div><!-- Job Head -->
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="job-wide-devider">
                                <div class="row">
                                    <div class="col-lg-8 column">       
                                        <div class="job-details">
                                            <p>{!! $data->body !!}</p>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-4 column">
                                        <div class="job-overview">
                                            <!-- <h3>Recent Projects</h3> -->
                                            <ul>
                                                <li><span><i class="la la-user"></i>Sold By: {{$data->user->name}} </span></li>

                                                <li><span class="mx-3"><i class="la la-bars"></i> Item Type: Project Material</span></li>

                                                <li><span><i class="la la-book"></i> Pages: {{$data->pages}}</span></li>

                                                <li><span class="mx-3"><i class="la la-book"></i> chapters: {{$data->chapters}}</span></li>
                                            </ul>
                                        </div><!-- Job Overview -->
                                        
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection