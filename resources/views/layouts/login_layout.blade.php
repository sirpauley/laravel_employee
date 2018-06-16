<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- NOTY from https://ned.im/noty-->
    <link href="lib/noty.css" rel="stylesheet">

    <!-- only used on login screen styling -->
    <style type="text/css">

        html, body, .container {
            height: 100%;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>

  </head>
  <body>
    <div class= "container">
      <fieldset>
          <legend> <h1>Login</h1></legend>
              <div>

    @yield('content')

  </body>
</html>
