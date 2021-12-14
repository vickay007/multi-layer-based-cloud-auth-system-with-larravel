    @extends('front.layouts.master')
    @section('content')
    <section>
        <div class="block no-padding">
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-featured-sec">
                            <div class="new-slide-2">
                                <img src="{{ asset('/front/images/resource/vector-4.png') }}">
                            </div>
                            <div class="job-search-sec">
                                <div class="job-search">
                                    <h3>Multi-Layer Based Cloud <br>Authentication System</h3>
                                </div>
                            </div>
                            <div class="scroll-to">
                                <a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>How It Works</h2>
                            <span>A quick guide to a working process of this project
                            </span>
                        </div><!-- Heading -->
                        <div class="how-to-sec style2">
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-user"></i></span>
                                <h3>Register an account</h3>
                                <p>click the signup button to register an account</p>
                            </div>
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-file-archive-o"></i></span>
                                <h3>Enter Security Question</h3>
                                <p>Browse profiles, reviews, and proposals then interview top candidates. </p>
                            </div>
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-list"></i></span>
                                <h3>Enter Otp Token</h3>
                                <p>Use the Upwork platform to chat, share files, and collaborate from your desktop or on the go.</p>
                            </div>
                        </div>

                         <div class="how-to-sec style2 mt-5">
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-user"></i></span>
                                <h3>Generate Aes key</h3>
                                <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
                            </div>
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-file-archive-o"></i></span>
                                <h3>Supply Remote Access Token</h3>
                                <p>Browse profiles, reviews, and proposals then interview top candidates. </p>
                            </div>
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-list"></i></span>
                                <h3>Redirect to profile</h3>
                                <p>Use the Upwork platform to chat, share files, and collaborate from your desktop or on the go.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block double-gap-top double-gap-bottom">
            <div data-velocity="-.1" style="background: url(images/resource/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="simple-text-block">
                            <h3>Make a Difference with Your Online Projects!</h3>
                            <span>Create an account with us today!</span>
                            <a href="/register" title="">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>
    @endsection