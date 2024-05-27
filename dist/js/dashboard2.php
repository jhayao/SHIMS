<?php
if (file_exists("../controller/dashboardController.php")) {
  echo "Exist";
  include_once("../controller/dashboardController.php");
} else {
  echo "Not Exist";
} ?>

<?php
$dashboard = new Dashboard();
$getNumberofHealthy = $dashboard->getNumberofHealthy();
$healthy = "[";
foreach ($getNumberofHealthy as $key => $value) {
  $key != 0 ? $healthy .= $value . "," : $healthy .= $value . "]";
}
$getNumberofSicked = $dashboard->getNumberofSicked();
$sicked = "[";
foreach ($getNumberofSicked as $key => $value) {
  $key != 0 ? $sicked .= $value . "," : $sicked .= $value . "]";
}

$totalCheckups = $dashboard->getNumberofTotalCheckups();
$dailyCheckups = $dashboard->getNumberofDailyCheckups();


$Overall = $dashboard->getCheckupCountsBySchool();
$schoolName = "[";
$schoolCount = "[";
$OverallCount = $Overall->num_rows;
$counter = 1;
$OverallTotal = 0;
while ($row = $Overall->fetch_assoc()) {
  $counter != $OverallCount ? $schoolName .= '"' . $row['school_name'] . '",' : $schoolName .= '"' . $row['school_name'] . '"]';
  $counter != $OverallCount ? $schoolCount .= $row['count'] . "," : $schoolCount .= $row['count'] . "]";
  $OverallTotal += $row['count'];
  $counter = $counter + 1;
}


$colors = $dashboard->generateRandomColor($OverallCount);

$recentCheckups = $dashboard->getMonthlyCheckups();

$getMonthlyCheckups = $dashboard->getMonthlyCheckups();
$days = [];
$getMonthlyCheckups = $dashboard->getMonthlyCheckups();
$schoolCounts = [];

foreach ($getMonthlyCheckups as $key => $checkup) {

  $days[] = $key;
  foreach ($checkup as $school => $count) {
    if (!isset($schoolCounts[$school])) {
      $schoolCounts[$school] = [];
    }
    $schoolCounts[$school][] = $count;
  }
}
$days = json_encode($days);

$getMonthlyCheckupCounts = $dashboard->getMonthlyCheckupCounts();
$monthlyCheckupCount =  json_encode($getMonthlyCheckupCounts["count"]);


?>
<script>
  $(function() {
    // =====================================
    // Revenue Updates
    // =====================================

    $("#monthlyCheckups").html(<?php echo $monthlyCheckupCount ?>);

    $("#totalsCheckup").html(<?php echo $totalCheckups ?>);
    $("#todaysCheckups").html(<?php echo $dailyCheckups ?>)
    console.log(<?php echo $totalCheckups ?>);
    var months = [];
    for (var i = 4; i >= 0; i--) {
      var month = new Date();
      month.setMonth(month.getMonth() - i);
      months.push(month.toLocaleString("default", {
        month: "short"
      }));
    }
    var healthy = [];
    var sicked = [];

    var options = {
      series: [{
          name: "Healthy",
          data: <?php echo $healthy ?>,
        },
        {
          name: "Sicked",
          data: <?php echo $sicked ?>,
        },
      ],
      chart: {
        toolbar: {
          show: false,
        },
        type: "bar",
        fontFamily: "Plus Jakarta Sans,sans-serif",
        foreColor: "#adb0bb",
        height: 270,
        stacked: true,
        offsetX: -20,
      },
      colors: ["var(--bs-primary)", "var(--bs-danger)"],
      plotOptions: {
        bar: {
          horizontal: false,
          barHeight: "70%",
          columnWidth: "20%",
          borderRadius: [5],
          borderRadiusApplication: "end",
          borderRadiusWhenStacked: "all",
        },
      },
      dataLabels: {
        enabled: false,
      },
      legend: {
        show: false,
      },
      grid: {
        show: false,
      },
      yaxis: {
        min: 0,
        max: Math.max(...<?php echo $healthy ?>) + 2,
        tickAmount: 4,
      },
      xaxis: {
        categories: months,
        show: false,
        axisTicks: {
          show: false,
        },
        axisBorder: {
          show: false,
        },
      },
      tooltip: {
        theme: "dark",
      },
    };

    var chart = new ApexCharts(
      document.querySelector("#revenue-chart"),
      options
    );
    chart.render();




    // =====================================
    // Revenue Updates
    // =====================================
    var options = {
      color: "#adb5bd",
      series: <?php echo $schoolCount ?>,
      labels: <?php echo $schoolName ?>,
      chart: {
        type: "donut",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#adb0bb",
      },
      plotOptions: {
        pie: {
          donut: {
            size: "88%",
            background: "transparent",
            labels: {
              show: true,
              name: {
                show: true,
                offsetY: 7,
              },
              value: {
                show: false,
              },
              total: {
                show: true,
                color: "#7C8FAC",
                fontSize: "20px",
                fontWeight: "600",
                label: "<?php echo $OverallTotal ?>",
              },
            },
          },
        },
      },
      stroke: {
        show: false,
      },
      dataLabels: {
        enabled: false,
      },

      legend: {
        show: true,
        position: 'bottom',
      },
      colors: <?php echo json_encode($colors) ?>,

      tooltip: {
        theme: "dark",
        fillSeriesColor: false,
      },
    };

    var chart = new ApexCharts(
      document.querySelector("#sales-overview"),
      options
    );
    chart.render();


    var options = {
      series: [
        <?php
        foreach ($schoolCounts as $school => $count) {
        ?> {
            name: '<?php echo $school ?>',
            data: <?php echo json_encode($count) ?>
          },

        <?php
        }
        ?>
      ],

      chart: {

        height: 350,
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth'
      },
      xaxis: {
        type: 'date',
        categories: <?php echo $days ?>
      },
      tooltip: {
        x: {
          format: 'dd/MM/yy'
        },
      },
    };

    var chart = new ApexCharts(document.querySelector("#monthly-earnings"), options);
    chart.render();


  });
</script>