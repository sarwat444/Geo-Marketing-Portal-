<?php
	ob_start();
	session_start();
	$pageTitle = 'Company Dashbord';
	include 'init.php'; 
?>
       <style type="text/css">
           
           .sidebar{
              background-color:#fff ;
              height:100% ; 
              position:fixed ; 
              width:250px ;
              left:0 ; 
                   }

      </style>
  <!--Satrt Sidebar-->
     <div class="sidebar">
        <ul>
            <li>Dashboard</li> 
            <li>Add Medicl Representative</li>
            <li>View Satatistics</li>
            <li>logout</li>
        </ul>

     </div>
  <!--End Sidebar-->

 <!--Start Statistics  -->
   <div class="continer">
    <div class="col-md-offset-3 col-md-4">
    <h3 class="text-center">Area Performance</h3>
    <p class="text-center">Aldus Corporation, which later merged with Adobe Systems, helped bring Lorem Ipsum into the information age with its 1985</p>
       
 <div id="chart_div" style="width: 420px; height: 300px;"></div>

       
    </div>
    <div class="col-md-4">
       <h3 class="text-center">Performance per monthes</h3>
         <p class="text-center">Aldus Corporation, which later merged with Adobe Systems, helped bring Lorem Ipsum into the information age with its 1985 .</p>
   <div id="top_x_div" style="width:300px; height: 300px;"></div>

       
    </div>

    </div>

 <!--End Statistics -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        
     /*Start chart 1 */
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          ['2013',  1000],
          ['2014',  1170],
          ['2015',  660],
          ['2016',  1030]
        ]);

        var options = {
          title: 'Area Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
        
        
     /*Start chart 2 */
        
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3]
        ]);

        var options = {
          width: 500,
          legend: { position: 'none' },
          chart: {
            title: 'Sales ratios Per Monthes',
            subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
  
        
        
    </script>





<?php

    include $tpl . 'footer.php';
	ob_end_flush();
?>