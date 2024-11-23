<!DOCTYPE html>
<html lang="en">
    <head>
    @include('theme.partials.head')
    </head>
    
    <body class="sb-nav-fixed">
        @include('theme.partials.header')
        
    <div id="layoutSidenav">

             @include('theme.partials.sidebar')
        <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
        
              @yield('content')

            </div>  

        </main>

            @include('theme.partials.footer')
        </div>

    </div>
           
             @include('theme.partials.scripts')

    </body>
</html>       