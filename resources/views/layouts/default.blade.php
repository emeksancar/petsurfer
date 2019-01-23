<!DOCTYPE html>
<html>

<head>
    @include('partials.head')
</head>
<body>

@include('partials.header')

    <div class="container">

        <div class="row">


            @yield('content')


        </div>
    </div>

@include('partials.footer')

<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
    <i class="la la-arrow-up"></i>
</div>
</body>

</html>