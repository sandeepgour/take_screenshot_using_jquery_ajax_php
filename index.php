<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to take a screenshot & save using jquery Ajax & PHP</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .home-main {
            background: #5812c5;
            color: #fff;
            padding: 3%;
            text-align: center;
        }

        .blinker {
            animation: blinker 1.5s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .home-main button {
            background: #fff;
            color: #5812c5;
            border-radius: 0;
            font-weight: 700;
            width: 16%;
            height: 50px;
            top: 4%;
            margin-top: 3%;
        }

        .home-main button:hover {
            transition: 1s ease;
            color: #5812c5;
            width: 19%;
        }

        .content1-left {
            padding: 4%;
        }

        .content1-right {
            padding: 4%;
            background: #e4e4e4;
        }

        .home-content2 {
            background: #adb5bd;
            padding: 1.4%;
            text-align: center;
        }

        .home-content2 p {
            font-size: 18px;
            line-height: 50px;
        }

        .home-content2 p span {
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="container-fluid home-main">
        <h2>Sandeep Gour | Senior Software Engineering <span class="blinker">.</span></h2>
        <button type="button" class="btn btn-default">View Profile</button>
    </div>
    <div class="container-fluid home-content1">
        <div class="row">
            <div class="col-md-6 content1-left">
                <h3>Why to use Bootstrap <span class="blinker">?</span></h3>
                <p>Build responsive, mobile-first projects on the web with the world’s most popular front-end component
                    library.</p>
                <!-- <div class="content1-left"></div> -->
            </div>
            <div class="col-md-6 content1-right">
                <p>Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your
                    ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive
                    prebuilt components, and powerful plugins built on jQuery.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid home-content2">
        <p><span>News</span> and <span>announcements</span> for all things <span>Bootstrap</span>, including new
            <span>releases</span> and <span>Bootstrap Themes</span>.
        </p>
    </div>
    <button type="button" class="btn btn-success" id="btnCapture">Capture</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        jQuery("#btnCapture").click(function () {
            jQuery("#btnCapture").hide();
            const target = document.body;
            //console.log(target);
            html2canvas(target).then(canvas => {
                //document.body.appendChild(canvas);
                url_data = canvas.toDataURL();
                //console.log(url_data);
                jQuery.ajax({
                    url  : "proccess.php",
                    type : "post",
                    data : {
                        imageData : url_data
                    },
                    success:function(result){
                        console.log(result);
                        jQuery("#btnCapture").show();
                    }
                });
            });
        });
    </script>
</body>

</html>