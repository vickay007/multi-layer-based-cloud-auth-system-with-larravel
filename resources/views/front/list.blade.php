@extends('front.layouts.master')
@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(/front/images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Projects</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block less-top">
            <div class="container">
                 <div class="row">
                    <aside class="col-lg-12 column margin_widget">
                        <div class="widget">
                            <div class="search_widget_job">
                                <div class="field_w_search">
                                    <form method="GET" action="{{ route('project-list') }}">
                                        <input type="text" name="search" placeholder="Search Keywords" value="{{ request()->query('search') }}" />
                                        <i class="la la-search"></i>
                                    </form>
                                </div><!-- Search Widget -->
                            </div>
                        </div>
                    </aside>
                    <div class="col-lg-12 column">
                        <div class="emply-list-sec">
                            <div class="row" id="masonry">
                                @forelse($data as $row)
                                @if($row->approval_status == 1)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="emply-list box">
                                        <div class="emply-list-thumb">
                                            <a href="#" title=""><img src="{{ asset('/front/images/resource/em1.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="emply-list-info">
                                            <h3><a href="#" title="">{{ $row->name }}</a></h3>

                                            @if(file_exists(public_path('/document/').$row->document))
                                            <h4>{{$row->document}}</h4>
                                            @endif

                                            <span>{{$row->department}}</span>

                                            <a href="/list/details/{{$row->id}}" class="btn btn-light">View</a>
                                        </div>
                                    </div><!-- Employe List -->
                                </div>
                                

                                @endif
                                
                                @empty
                                <div class="col-12">
                                    <h4 class="text-center">
                                        No result found for this query <strong>{{ request()->query('search') }}</strong>
                                    </h4>
                                </div>

                                @endforelse

                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center">
                                        {{ $data->appends(['search' => request()->query('search')])->links('pagination::bootstrap-4') }}
                                    </div><!-- Pagination -->
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
@endsection