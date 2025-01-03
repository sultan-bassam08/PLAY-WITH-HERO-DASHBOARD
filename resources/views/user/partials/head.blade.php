<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Play With Hero')</title>

  <!-- Meta tags for SEO -->
  
  <meta property="og:image" content="{{ asset('assets/images/logo.svg') }}">
  <meta property="og:url" content="{{ url()->current() }}">

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/images/logo.svg') }}" type="image/svg+xml">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/Style.css') }}">


  <link rel="stylesheet" href="{{ asset('assets/css/edit-profile.css') }}">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- Google Fonts -->
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap" onload="this.rel='stylesheet'">
</head>
