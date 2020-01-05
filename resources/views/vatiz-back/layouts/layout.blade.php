<!DOCTYPE html>

@include('vatiz-back.layouts.header')
@yield('header')
<body>

@yield('content')

@include('vatiz-back.layouts.footer')

@yield('footer')
@include('partials.toastr')
</body>
</html>
