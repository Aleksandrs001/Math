<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.disk.lv</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            position: relative;
            background-color: #d3d3d3;
            z-index: -2;
        }
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            object-fit: cover;
            z-index: -1;
        }
        .header-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1;
        }
        .locale-links a.active {
            color: #BDBDBD;
        }
        .working-hours {
            position: absolute;
            top: 28%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #000;
            z-index: 2;
            padding: 20px;
            border: 2px solid #808080;
            background-color: #f0f0f0;
            border-radius: 10px;
        }
        .map-container {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            width:  600px;
            height: auto;
            border: 2px solid #808080;
            border-radius: 10px;
            overflow: hidden;
            z-index: 2;
        }
        .footer {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
            padding: 10px 0;
            color: #000;
            z-index: 2;
            background-color: rgba(255, 255, 255, 0.7);
        }

        @media (max-width: 768px) {
            .map-container {
                width: 50%;
            }
            .working-hours {
                top: 35%;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .map-container {
                top: 45%;
                left: 50%;
                font-size: 10px;
                text-align: center;
                width: 100%;
                display: flex;
                justify-content: center;
                gap: 5px;
            }
            .working-hours {
                top: 38%;
                left: 50%;
                font-size: 10px;
                text-align: center;
                width: 90%;
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

<div class="working-hours">
    <h1>DARBA LAIKS</h1>
    <p>Darba dienās - 9:00-19:00</p>
    <p>Sestdienā - 11:00-15:00 </p>
    <p>Svētdienā - Slēgts</p>
</div>

<div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2177.681191405509!2d24.16550949427466!3d56.91999290530979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eed1f9f2047f5f%3A0xb08cc69058248735!2zxLZlbmdhcmFnYSBpZWxhIDJCLCBMYXRnYWxlcyBwcmlla8WhcGlsc8STdGEsIFLEq2dhLCBMVi0xMDYz!5e0!3m2!1sru!2slv!4v1722888136853!5m2!1sru!2slv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="footer">
    <h3>© 2024 Copyright www.disk.lv</h3>
</div>
</body>
</html>
