<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Postier - {{ $title }}</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
    <link href="/css/datepicker3.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="/dist/jquery.jsonview.css">
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="/dist/jquery.jsonview.js"></script>
  </head>
  <body>
    @include('includes.sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      @include('includes.breadcrumbs')
      @yield('content')
    </div>



  	<script src="/js/bootstrap.min.js"></script>
  	<script src="/js/chart.min.js"></script>
  	<script src="/js/chart-data.js"></script>
  	<script src="/js/easypiechart.js"></script>
  	<script src="/js/easypiechart-data.js"></script>
  	<script src="/js/bootstrap-datepicker.js"></script>
  	<script src="/js/custom.js"></script>
  	<script>
    	window.onload = function () {
      	// var chart1 = document.getElementById("line-chart");
      	// window.myLine = new Chart(chart1).Line(lineChartData, {
      	// responsive: true,
      	// scaleLineColor: "rgba(0,0,0,.2)",
      	// scaleGridLineColor: "rgba(0,0,0,.05)",
      	// scaleFontColor: "#c5c7cc"
      	// });
      };
  	</script>

  </body>
</html>
