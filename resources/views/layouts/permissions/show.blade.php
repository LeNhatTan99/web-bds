<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>
        Bootstrap Navbar Change
        Active Class Link
    </title>



    <script src=
    'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'>
        </script>

        <script src=
    'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'>
        </script>

    <style>
        body {
            margin: 20px;
        }
        #topheader  a {
            text-transform: capitalize;
            color: #333;
            -webkit-transition: background-color .2s, color .2s;
            transition: background-color .2s, color .2s;
        }
        #topheader  a:hover,
        #topheader  a:focus {
            background-color: #005596;
            color: #fff;
        }
        #topheader .active  {
            background-color: #3990E0;
            color: white;
        }
    </style>
</head>

<body>
    <div id="topheader">

            <div class="container-fluid">
                            <a class="active" href="#home">home</a>
                            <a href="">HTML</a>
                            <a href="#page2">CSS</a>
                            <a href="#page3">JavaScript</a>
            </div>
    </div>

    <script>
        $( '#topheader  a' ).on('click',
                    function () {
            $( '#topheader ' ).find( 'a.active' )
            .removeClass( 'active' );
            $( this ).parent( 'a' ).addClass( 'active' );
        });
    </script>
</body>
</html>
