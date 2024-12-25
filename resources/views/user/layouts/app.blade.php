<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.partials.head')
</head>
<body>
    @include('user.partials.header')

    
        @yield('content')
    

    @include('user.partials.footer')
    @include('user.partials.scripts')
</body>
</html>
    