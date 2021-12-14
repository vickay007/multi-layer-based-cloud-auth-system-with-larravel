<!DOCTYPE html>
<html>
<head>
    @include('front.layouts.top')
    
</head>
<body>

<div class="theme-layout" id="scrollup">
    
    @include('front.layouts.header')

    @yield('content')

    @include('front.layouts.footer')

</div>


@include('front.layouts.modal')

@include('front.layouts.bottom')

</body>
</html>

