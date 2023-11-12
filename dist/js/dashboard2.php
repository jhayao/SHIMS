<?php
if (file_exists("../controller/dashboardController.php")) {
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
// echo $recentCheckups;

$daysinMonth = $dashboard->getDaysinMonth();
echo $daysinMonth;
?>
<script>
  $(function () {
    // =====================================
    // Revenue Updates
    // =====================================

    $("#totalsCheckup").html(<?php echo $totalCheckups ?>);
    $("#todaysCheckups").html(<?php echo $dailyCheckups ?>)
    console.log(<?php echo $totalCheckups ?>);
    var months = [];
    for (var i = 4; i >= 0; i--) {
      var month = new Date();
      month.setMonth(month.getMonth() - i);
      months.push(month.toLocaleString("default", { month: "short" }));
    }
    var healthy = [3, 3, 1, 2, 2];
    var sicked = [1, 1, 1, 1, 1];

    var options = {
      series: [
        {
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
      colors: ["var(--bs-primary)", "var(--bs-secondary)"],
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
        max: Math.max(...healthy) + 2,
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
      series: [{
        name: 'series1',
        data: [45, 78, 29, 61, 12, 94, 36, 73, 58, 20, 91, 33, 67, 14, 88, 41, 76, 27, 62, 15, 90, 34, 69, 21, 87, 43, 77, 28, 63, 16]
      }, {
        name: 'series2',
        data: [23, 67, 45, 89, 12, 94, 22, 59, 83, 20, 22, 15, 53, 86, 23, 9, 12, 12, 24, 88, 11, 41, 22, 53, 77, 12, 54, 76, 23, 32]
      }],
      
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
        categories: <?php echo $daysinMonth ?>
      },
      tooltip: {
        x: {
          format: 'dd/MM/yy'
        },
      },
    };

    var chart = new ApexCharts(document.querySelector("#monthly-earnings"), options);
    chart.render();

    // =====================================
    // monthly-earning
    // =====================================
    var options = {
      chart: {
        id: "monthly-earning",
        type: "area",
        height: 56,
        sparkline: {
          enabled: true,
        },
        group: "sparklines",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#adb0bb",
      },
      series: [
        {
          name: "monthly earnings",
          color: "var(--bs-primary)",
          data: [25, 66, 20, 40, 12, 58, 20],
        },
      ],
      stroke: {
        curve: "smooth",
        width: 2,
      },
      fill: {
        type: "gradient",
        gradient: {
          shadeIntensity: 0,
          inverseColors: false,
          opacityFrom: 0.1,
          opacityTo: 0,
          stops: [20, 180],
        },
      },

      markers: {
        size: 0,
      },
      tooltip: {
        theme: "dark",
        fixed: {
          enabled: true,
          position: "right",
        },
        x: {
          show: false,
        },
      },
    };
    new ApexCharts(document.querySelector("#monthly-earning"), options).render();

    // =====================================
    // weekly-stats
    // =====================================
    var options = {
      chart: {
        id: "weekly-stats",
        type: "area",
        height: 120,
        sparkline: {
          enabled: true,
        },
        group: "sparklines",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#adb0bb",
      },
      series: [
        {
          name: "Weekly Stats",
          color: "var(--bs-primary)",
          data: [5, 15, 5, 10, 5],
          label: ['1', '2', '3', '4', '5']
        },
      ],
      stroke: {
        curve: "smooth",
        width: 2,
      },
      fill: {
        type: "gradient",
        gradient: {
          shadeIntensity: 0,
          inverseColors: false,
          opacityFrom: 0.18,
          opacityTo: 0,
          stops: [20, 180],
        },
      },

      markers: {
        size: 0,
      },
      tooltip: {
        theme: "dark",
        fixed: {
          enabled: true,
          position: "right",
        },
        x: {
          show: false,
        },
      },
    };
    new ApexCharts(document.querySelector("#weekly-stats"), options).render();

    // =====================================
    // Salary
    // =====================================
    var options = {
      series: [
        {
          name: "Yearly Sales",
          data: [20, 15, 30, 25, 10, 15],
        },
      ],

      chart: {
        toolbar: {
          show: false,
        },
        offsetX: -20,
        height: 250,
        type: "bar",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#adb0bb",
      },
      colors: [
        "#f2f6fad9",
        "#f2f6fad9",
        "var(--bs-primary)",
        "#f2f6fad9",
        "#f2f6fad9",
        "#f2f6fad9",
      ],
      plotOptions: {
        bar: {
          borderRadius: 5,
          columnWidth: "45%",
          distributed: true,
          endingShape: "rounded",
        },
      },

      dataLabels: {
        enabled: false,
      },
      legend: {
        show: false,
      },
      grid: {
        yaxis: {
          lines: {
            show: false,
          },
        },
        xaxis: {
          lines: {
            show: false,
          },
        },
      },
      xaxis: {
        categories: [["Apr"], ["May"], ["June"], ["July"], ["Aug"], ["Sept"]],
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
      },
      yaxis: {
        labels: {
          show: false,
        },
      },
      tooltip: {
        theme: "dark",
      },
    };

    var chart = new ApexCharts(document.querySelector("#salary"), options);
    chart.render();

    // =====================================
    // table-chart
    // =====================================
    var options = {
      chart: {
        id: "table-chart",
        type: "area",
        width: 76,
        height: 18,
        sparkline: {
          enabled: true,
        },
        group: "table-chart",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#adb0bb",
      },
      series: [
        {
          color: "#DFE5EF",
          data: [25, 66, 20, 40, 12, 58, 20],
        },
      ],
      stroke: {
        curve: "smooth",
        width: 2,
      },
      fill: {
        colors: ["#f3feff"],
        type: "solid",
        opacity: 0.05,
      },

      markers: {
        size: 0,
      },
      tooltip: {
        enabled: false,
      },
    };
    new ApexCharts(document.querySelector("#table-chart"), options).render();

    // =====================================
    // table-chart
    // =====================================
    var options = {
      chart: {
        id: "table-chart-1",
        type: "area",
        width: 76,
        height: 18,
        sparkline: {
          enabled: true,
        },
        group: "table-chart-1",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#adb0bb",
      },
      series: [
        {
          color: "var(--bs-primary)",
          data: [25, 66, 20, 40, 12, 58, 20],
        },
      ],
      stroke: {
        curve: "smooth",
        width: 2,
      },
      fill: {
        type: "gradient",
        gradient: {
          shadeIntensity: 0,
          inverseColors: false,
          opacityFrom: 0.12,
          opacityTo: 0,
          stops: [20, 180],
        },
      },

      markers: {
        size: 0,
      },
      tooltip: {
        enabled: false,
      },
    };
    new ApexCharts(document.querySelector("#table-chart-1"), options).render();

    // =====================================
    // table-chart
    // =====================================
    var options = {
      chart: {
        id: "#table-chart-2",
        type: "area",
        width: 76,
        height: 18,
        sparkline: {
          enabled: true,
        },
        group: "#table-chart-2",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#adb0bb",
      },
      series: [
        {
          color: "#DFE5EF",
          data: [25, 66, 20, 40, 12, 58, 20],
        },
      ],
      stroke: {
        curve: "smooth",
        width: 2,
      },
      fill: {
        colors: ["#f3feff"],
        type: "solid",
        opacity: 0.05,
      },

      markers: {
        size: 0,
      },
      tooltip: {
        enabled: false,
      },
    };
    new ApexCharts(document.querySelector("#table-chart-2"), options).render();

    // =====================================
    // table-chart
    // =====================================
    var options = {
      chart: {
        id: "table-chart-3",
        type: "area",
        width: 76,
        height: 18,
        sparkline: {
          enabled: true,
        },
        group: "table-chart-3",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#adb0bb",
      },
      series: [
        {
          color: "var(--bs-primary)",
          data: [25, 66, 20, 40, 12, 58, 20],
        },
      ],
      stroke: {
        curve: "smooth",
        width: 2,
      },
      fill: {
        type: "gradient",
        gradient: {
          shadeIntensity: 0,
          inverseColors: false,
          opacityFrom: 0.12,
          opacityTo: 0,
          stops: [20, 180],
        },
      },

      markers: {
        size: 0,
      },
      tooltip: {
        enabled: false,
      },
    };
    new ApexCharts(document.querySelector("#table-chart-3"), options).render();

    // =====================================
    // expense
    // =====================================
    var expense = {
      series: [60, 25, 0],
      labels: ["test", "test2", "test3s"],
      chart: {
        height: 110,
        type: "donut",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#c6d1e9",
      },

      tooltip: {
        theme: "dark",
        fillSeriesColor: false,
      },

      colors: ["var(--bs-primary)", "var(--bs-secondary)", "var(--bs-yellow)"],
      dataLabels: {
        enabled: false,
      },

      legend: {
        show: false,
      },

      stroke: {
        show: false,
      },

      plotOptions: {
        pie: {
          donut: {
            size: "70%",
            background: "none",
            labels: {
              show: true,
              name: {
                show: true,
                fontSize: "18px",
                color: undefined,
                offsetY: -10,
              },
              value: {
                show: false,
                color: "#98aab4",
              },
            },
          },
        },
      },
    };

    var chart = new ApexCharts(document.querySelector("#expense"), expense);
    chart.render();

    // =====================================
    // Sales
    // =====================================
    var options = {
      series: [
        {
          name: "",
          data: [25, 35, 20, 25, 40, 25],
        },
        {
          name: "",
          data: [35, 40, 20, 35, 40, 35],
        },
        {
          name: "",
          data: [40, 25, 60, 40, 20, 40],
        },
      ],
      chart: {
        type: "bar",
        height: 85,
        width: "100%",
        stacked: true,
        stackType: "100%",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        toolbar: {
          show: false,
        },
        sparkline: {
          enabled: true,
        },
      },
      colors: ["var(--bs-primary)", "var(--bs-secondary)", "var(--bs-gray-200)"],
      grid: {
        show: false,
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: "50%",
          borderRadius: [3],
          borderRadiusApplication: "around",
          borderRadiusWhenStacked: "around",
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        show: false,
        width: 1,
        colors: ["rgba(0,0,0,0.01)"],
      },
      xaxis: {
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
        labels: {
          show: false,
        },
      },
      yaxis: {
        labels: {
          show: false,
        },
      },
      axisBorder: {
        show: false,
      },
      fill: {
        opacity: 1,
      },
      tooltip: {
        theme: "dark",
        x: {
          show: false,
        },
      },
    };

    var chart = new ApexCharts(document.querySelector("#sales"), options);
    chart.render();

    // =====================================
    // Sales two
    // =====================================
    var options = {
      series: [
        {
          name: "",
          data: [100, 60, 35, 90, 35, 100],
        },
      ],
      chart: {
        type: "bar",
        height: 25,
        fontFamily: "Plus Jakarta Sans', sans-serif",
        toolbar: {
          show: false,
        },
        sparkline: {
          enabled: true,
        },
      },
      colors: ["var(--bs-primary)"],
      grid: {
        show: false,
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: "100%",
          borderRadius: 4,
          distributed: true,
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        show: true,
        width: 5,
        colors: ["rgba(0,0,0,0.01)"],
      },
      xaxis: {
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
        labels: {
          show: false,
        },
      },
      yaxis: {
        labels: {
          show: false,
        },
      },
      axisBorder: {
        show: false,
      },
      fill: {
        opacity: 1,
      },
      tooltip: {
        theme: "dark",
        x: {
          show: false,
        },
      },
    };

    var chart = new ApexCharts(document.querySelector("#sales-two"), options);
    chart.render();

    // =====================================
    // growth
    // =====================================
    var options = {
      chart: {
        id: "growth",
        type: "area",
        height: 25,
        sparkline: {
          enabled: true,
        },
        group: "growth",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#adb0bb",
      },
      series: [
        {
          colors: ["var(--bs-primary)"],
          data: [
            0, 10, 10, 10, 35, 45, 30, 30, 30, 50, 52, 30, 25, 45, 50, 80, 60, 65,
          ],
        },
      ],
      stroke: {
        curve: "smooth",
        width: 2,
      },
      fill: {
        colors: ["#f3feff"],
        type: "solid",
        opacity: 0,
      },

      markers: {
        size: 0,
      },
      tooltip: {
        enabled: false,
      },
    };
    new ApexCharts(document.querySelector("#growth"), options).render();
  });
</script>