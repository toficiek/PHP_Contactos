<!DOCTYPE HTML PUBLIC>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="es ES">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./css/default/default.css" type="text/css" media="screen"/>
    
    <link rel="stylesheet" href="./css/nivo-slider.css" type="text/css" media="screen" />
    
</head>
<body>
    <div id="wrapper">
       
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="./img/images/html5.jpg" data-thumb="./img/images/html5.jpg" alt="" />
                <img src="./img/images/php.jpg" data-thumb="./img/images/php.jpg" alt="" title="This is an example of a caption" /></a>
                <img src="./img/images/AJ.jpg" data-thumb="./img/images/AJ.jpg" alt="" data-transition="slideInLeft" />
                <img src="./img/images/pdhn.jpg" data-thumb="./img/images/nemo.jpg" alt="" title="#htmlcaption" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
            </div>
        </div>

    </div>
    <script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="./js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</body>
</html>