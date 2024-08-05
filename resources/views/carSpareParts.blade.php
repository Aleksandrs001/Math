<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background Image with Header and Footer</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            position: relative; /* Ensures that absolute positioning works correctly */
            background-color: #d3d3d3; /* Light grey background color */
            z-index: -2;
        }
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            object-fit: cover;
            z-index: -1; /* Background image should be behind all other content */
        }
        .header-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1; /* Header image should be on top of the background image */
        }
        .locale-links {
            position: absolute;
            top: 10px; /* Default top positioning */
            right: 10px; /* Default right positioning */
            z-index: 2; /* Locale links should be above the header image */
            color: #808080; /* Default link color */
            font-size: 14px; /* Default font size */
        }
        .locale-links a.active {
            color: #BDBDBD; /* Color for the active locale */
        }
        .working-hours {
            position: absolute;
            top: 50%; /* Vertically center the section */
            left: 50%; /* Horizontally center the section */
            transform: translate(-50%, -50%); /* Adjust position to truly center it */
            text-align: center; /* Center align the text */
            color: #000; /* Black text color for better visibility */
            z-index: 2; /* Ensure it appears above the background image */
            padding: 20px; /* Padding inside the frame */
            border: 2px solid #808080; /* Grey border */
            background-color: #f0f0f0; /* Light grey background color for the frame */
            border-radius: 10px; /* Rounded corners for the frame */
        }
        .footer {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
            padding: 10px 0; /* Padding for better spacing */
            color: #000; /* Black text color */
            z-index: 2; /* Footer should be above the background image */
            background-color: rgba(255, 255, 255, 0.7); /* Optional: Semi-transparent background for better visibility */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .locale-links {
                top: 5px;
                right: 5px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .locale-links {
                top: 5px;
                right: 5px;
                font-size: 10px;
                text-align: center;
                width: 100%;
                left: 0;
                display: flex;
                justify-content: center;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
<img src="{{ asset('carSpareParts/body.jpg') }}"
     class="background-image"
     alt="Background Image">

<img src="{{ asset('carSpareParts/header.jpg') }}"
     class="header-image"
     alt="Header Image">

{{-- Locale Links --}}
{{-- <div class="locale-links"> --}}
{{--     <a href="{{ route('change.locale', ['locale' => 'en']) }}" --}}
{{--        class="{{ app()->getLocale() === 'en' ? 'active' : '' }}"> --}}
{{--         English --}}
{{--     </a> --}}
{{--     | --}}
{{--     <a href="{{ route('change.locale', ['locale' => 'ru']) }}" --}}
{{--        class="{{ app()->getLocale() === 'ru' ? 'active' : '' }}"> --}}
{{--         Русский --}}
{{--     </a> --}}
{{--     | --}}
{{--     <a href="{{ route('change.locale', ['locale' => 'lv']) }}" --}}
{{--        class="{{ app()->getLocale() === 'lv' ? 'active' : '' }}"> --}}
{{--         Latviešu --}}
{{--     </a> --}}
{{-- </div> --}}

<div class="working-hours">
    <h1>Darba Laiki</h1>
    <p>Darba dienās 9:00-18:00</p>
    <p>Svētdienās 11:00-15:00</p>
    <p>Sestdienās - Slēgts</p>
</div>

<div class="footer">
    <h3>© 2024 Copyright www.disk.lv</h3>
</div>
</body>
</html>
