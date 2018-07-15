<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
?>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Reports</h1>
            
            <form class="form-inline">
              <div class="form-group mx-sm-3 mb-2">
                <select id="inputState" class="form-control">
                    <option selected disabled="true">Year</option>
                    <option>2018</option>
                    <option>2017</option>
                    <option>2016</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary mb-2">Show</button>
            </form>

          </div>

          <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
       
<?php
require_once("dash_board_footer.php");
?>

<!-- Graphs -->
    <script src="<?php echo base_url('resources/js/Chart.min.js');?>"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>