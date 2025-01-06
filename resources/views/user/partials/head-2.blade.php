<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Play-With-Hero |Categories </title>
	<meta name="description" content="Categories">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/images/logo.svg') }}" type="image/svg+xml">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/prettyPhoto.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/customScrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
   <style>

:root {
    /**
     * colors
     */

    --raisin-black-1: hsl(234, 14%, 14%);
    --raisin-black-2: hsl(231, 12%, 12%);
    --raisin-black-3: hsl(228, 12%, 17%);
    --eerie-black: hsl(240, 11%, 9%);
    --light-gray: hsl(0, 0%, 80%);
    --platinum: hsl(0, 4%, 91%);
    --xiketic: hsl(275, 24%, 10%);
    --orange: hsl(45, 83%, 55%);
    --white: hsl(0, 0%, 100%);
    --onyx: hsl(240, 5%, 26%);

    /**
     * typography
     */

    --ff-refault: "Refault", Georgia;
    --ff-oswald: "Oswald", sans-serif;
    --ff-poppins: "Poppins", sans-serif;

    --fs-1: 54px;
    --fs-2: 34px;
    --fs-3: 30px;
    --fs-4: 26px;
    --fs-5: 22px;
    --fs-6: 20px;
    --fs-7: 18px;
    --fs-8: 15px;
    --fs-9: 14px;
    --fs-10: 13px;
    --fs-11: 12px;

    --fw-400: 400;
    --fw-500: 500;
    --fw-700: 700;

    /**
     * transition
     */

    --transition-1: 0.15s ease-in-out;
    --transition-2: 0.15s ease-in;
    --transition-3: 0.25s ease-out;

    /**
     * spacing
     */

    --section-padding: 60px;

    /**
     * clip path
     */

    --polygon-1: polygon(90% 0, 100% 34%, 100% 100%, 10% 100%, 0 66%, 0 0);
    --polygon-2: polygon(0 0, 100% 0%, 82% 100%, 0% 100%);
    --polygon-3: polygon(0 0, 100% 0%, 100% 100%, 18% 100%);
    --polygon-4: polygon(96% 0, 100% 36%, 100% 100%, 4% 100%, 0 66%, 0 0);
}
.btn {
    color: var(--white);
    font-family: var(--ff-oswald);
    font-size: var(--fs-6);
    font-weight: var(--fw-500);
    letter-spacing: 1px;
    text-transform: uppercase;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    padding: 13px 34px;
    clip-path: var(--polygon-1);
    transition: var(--transition-1);
    cursor: pointer;
}
.btn-primary {
    background: var(--orange);
    cursor: pointer;
}


.btn:hover, .btn:focus{
    background: var(--orange);
        color: #fff !important;
        cursor: pointer;
}


/* Responsive styles */
@media (max-width: 768px) {
    .btn {
        font-size: var(--fs-5); /* Adjust the font size for smaller screens */
        padding: 10px 20px;     /* Reduce padding */
        letter-spacing: 0.5px; /* Decrease letter spacing for better readability */
    }
}

@media (max-width: 576px) {
    .btn {
        font-size: var(--fs-8); /* Further adjust font size for very small screens */
        padding: 8px 16px;      /* Further reduce padding */
        text-align: center;     /* Ensure text is centered properly */
        gap: 5px;               /* Reduce gap between items inside the button */
    }
}


   </style>
	<!-- Scripts -->
