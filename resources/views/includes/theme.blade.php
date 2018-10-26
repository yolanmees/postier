<!DOCTYPE html>
<html>
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Postier - {{ $title }}</title>

    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/datepicker3.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="/dist/jquery.jsonview.css">

    <link rel="shortcut icon" href="/img/logo.ico">
  </head>
  <body>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="/dist/jquery.jsonview.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
  	<script src="/js/chart.min.js"></script>
  	<script src="/js/chart-data.js"></script>
  	<script src="/js/easypiechart.js"></script>
  	<script src="/js/easypiechart-data.js"></script>
  	<script src="/js/bootstrap-datepicker.js"></script>
  	<script src="/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    @include('includes.sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      @include('includes.breadcrumbs')
      @yield('content')
    </div>


  </body>
</html>
