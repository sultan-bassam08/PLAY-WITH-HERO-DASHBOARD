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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Show success messages
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    // Show error messages
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "{{ session('error') }}",
            confirmButtonText: 'OK'
        });
    @endif

    // Add confirmation for delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('form[action*="destroy"]');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    });
</script>
@endpush

    </body>
</html>       