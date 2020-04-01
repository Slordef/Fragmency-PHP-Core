<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <title>Fragmency Errors</title>
    <style>
        html, body{
            padding: 0 0;
            margin: 0;
        }
        .logo{
            width: 40px;
            vertical-align: middle;
        }
        .logotitle{
            font-family: 'Montserrat';
            font-size: 2em;
            margin: 5px;
        }
        .errortitle{
            margin-left: 20px;
            font-size: 2em;
            font-family: "Arial";
            font-style: italic;
        }
        .headline, .footline{
            color: white;
            display: flex;
            flex-direction: row;
            align-items: center;
            position: fixed;
            left: 0;
            z-index: 1;
            height: 80px;
            width: 100vw;
            background-color: darkcyan;
            padding: 0 50px;
            box-sizing: border-box;
        }
        .exception{
            background-color: darkred;
        }
        .warning{
            background-color: darkorange;
        }
        .headline{
            top: 0;
        }
        .footline{
            bottom: 0;
        }
        .errorReport{
            font-size: 2em;
            box-sizing: border-box;
            width: 100vw;
            height: 100vh;
            padding: calc(5vh + 80px) 10vw;
        }
        .exceptionContent{
            margin: 25px 0;
        }
        .line{
            margin: 10px;
        }
        .errorMessage{
            font-weight: bolder;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="<?=$method?'exception':'warning'?> headline">
        <div class="logo">
            <svg id="C_Fragmency" data-name="C_Fragmency" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 196.55 195.55">
                <defs>
                    <style>.cls-1{fill:#fff;}</style>
                </defs>
                <title>Fragmency</title>
                <rect class="cls-1" x="16.63" y="107.63" width="75.73" height="75.73" transform="translate(-102.15 158.04) rotate(-75)"/>
                <path d="M31.26,105.25l63.49,17-17,63.49-63.49-17,17-63.49M24.19,93,2,175.81,84.81,198,107,115.19,24.19,93Z" transform="translate(-2 -2.45)"/>
                <rect class="cls-1" x="109" y="108" width="75" height="75" transform="translate(-33.96 246.9) rotate(-75)"/>
                <path d="M123.52,105.7l62.78,16.82L169.48,185.3,106.7,168.48l16.82-62.78m-7.07-12.25-22,82.1,82.1,22,22-82.1-82.1-22Z" transform="translate(-2 -2.45)"/>
                <rect class="cls-1" x="110" y="10.55" width="75" height="75"/>
                <path d="M182,18V83H117V18h65M192,8H107V93h85V8Z" transform="translate(-2 -2.45)"/>
                <rect class="cls-1" x="17" y="17" width="75" height="75" transform="translate(-14.25 90.59) rotate(-75)"/>
                <path d="M31.52,14.7,94.3,31.52,77.48,94.3,14.7,77.48,31.52,14.7M24.45,2.45l-22,82.1,82.1,22,22-82.1-82.1-22Z" transform="translate(-2 -2.45)"/>
            </svg>
        </div>
        <div class="logotitle">Fragmency</div>
        <?php if($method): ?>
            <div class="errortitle">ERROR EXCEPTION</div>
        <?php else: ?>
            <div class="errortitle">Warning</div>
        <?php endif; ?>
    </div>
    <div class="errorReport">
        <?=$content?>
    </div>
    <div class="<?=$method?'exception':'warning'?> footline">

    </div>
</body>
</html>