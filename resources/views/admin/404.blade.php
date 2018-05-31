<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Halaman tidak tersedia</title>
        <link rel="icon" type="image/png" href="{{ url('img/undip.png') }}" sizes="32x32">
        <style type="text/css">
            body {
                background: linear-gradient(132deg, #ec5218, #1665c1);
                background-size: 400% 400%;
                animation: BackgroundGradient 30s ease infinite;
            }
            
            @keyframes BackgroundGradient {
                0% {background-position: 0% 50%;}
                50% {background-position: 100% 50%;}
                100% {background-position: 0% 50%;}
            }
            h1 {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translateX(-50%) translateY(-150%);
                font-family: Open Sans, sans-serif;
                color: #fff;
                font-weight: 400;
                text-transform: uppercase;
                text-align: center;
                font-size: 100px;
                /*background-color: #000;*/
                padding: 5px;
            }
            h2{
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translateX(-50%) translateY(-60%);
                font-family: Open Sans, sans-serif;
                color: #fff;
                font-weight: 400;
                text-transform: uppercase;
                text-align: center;
                font-size: 50px;
                /*background-color: #000;*/
                padding: 5px;
            }
            
        </style>
    </head>
    <body>
        <h1>404</h1>
        <h2>Halaman Tidak Tersedia</h2>
    </body>
</html>