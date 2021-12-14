<!DOCTYPE html>
<html lang="en">

<!-- header -->
<head>
  @include('admin.layouts.top')
</head>

<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <!-- <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div> -->
            <!-- end pre-loader -->
            <!-- begin app-header -->
            @include('admin.layouts.header')
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                @include('admin.layouts.navigation')
                <!-- end app-navbar -->
                <!-- begin app-main -->
                @yield('content')
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
            <!-- begin footer -->
            @include('admin.layouts.footer')
            <!-- end footer -->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <!-- plugins -->
    @include('admin.layouts.bottom')
</body>

</html>