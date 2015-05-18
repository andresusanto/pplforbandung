<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Rumah Pajak</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="{{ URL::asset('/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/pages/dashboard.css') }}" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body style="background-color: #eeeeee">
@include('wp.navbar_guest')


<div class="jumbotron vertical-align-center" style="height: 5000%;">
<div class="container">
    <div style="text-align: center">
    <h1 style="font-size: 3em;">Rumah-Pajak</h1>
    <p style="margin-top: 2em; margin-bottom: 2em; font-size: 1em">Selamat datang di Rumah Pajak. Aplikasi pelayanan pajak terpadu.</p>
    <a class="btn btn-success" style="font-size: 1.4em; height: 1.3em; padding-top: 12px;" href="{{route('wp_daftar')}}">Daftar</a>
    <a class="btn btn-default" style="font-size: 1.4em; height: 1.3em; padding-top: 12px;" href="{{route('wp_home')}}">Masuk</a>
    </div>
</div>
</div>

@include('footer')
<!-- /footer -->
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ URL::asset('/js/jquery-1.7.2.min.js') }}"></script>
<script src="{{ URL::asset('/js/excanvas.min.js') }}"></script>
<script src="{{ URL::asset('/js/chart.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/bootstrap.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ URL::asset('/js/full-calendar/fullcalendar.min.js') }}"></script>

<script src="{{ URL::asset('/js/base.js') }}"></script>


<script>

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    data: [65, 59, 90, 81, 56, 55, 40]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    data: [28, 48, 40, 19, 96, 27, 100]
                }
            ]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    data: [65, 59, 90, 81, 56, 55, 40]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 96, 27, 100]
                }
            ]

        }

        $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d+5),
              end: new Date(y, m, d+7)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d-3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d+4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d+1, 19, 0),
              end: new Date(y, m, d+1, 22, 30),
              allDay: false
            },
            {
              title: 'EGrappler.com',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://EGrappler.com/'
            }
          ]
        });
      });
    </script><!-- /Calendar -->

</body>
</html>