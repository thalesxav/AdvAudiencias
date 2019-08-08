
<!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usuários</span>
              <span class="info-box-number"><?= $usuarios; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa  fa-black-tie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Advogados</span>
              <span class="info-box-number"><?= $advogados; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-map-marker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Comarcas</span>
              <span class="info-box-number"><?= $comarcas; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-calendar-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Audiências</span>
              <span class="info-box-number"><?= $audiencias; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-3">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Período / Legenda</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <div class="form-group">
              <label>Período:</label>
              <input type="text" class="form-control form-control-1 input-sm from" placeholder="Informe o mês" >
          </div>
        <table class="table no-margin">
            <thead>
            <tbody>
            <tr>
              <td><span style="background-color: #DCDCDC; color:black" class="label ">Justiça Comum (<?= $justica_comum ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#DCDCDC" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #93cede; color:black" class="label">Advogado + Preposto (<?= $adv_preposto ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#93cede" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #a4b357; color:black" class="label">Preposto (<?= $preposto ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#a4b357" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #f16f5c; color:black" class="label">Procon (<?= $procon ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#f16f5c" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #e9d4b3; color:black" class="label">Trabalhista (<?= $trabalhista ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#e9d4b3" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #f7afd6; color:black" class="label">Outros (<?= $outros ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#f7afd6" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            </tbody>
          </table>
          </div>
          </div>
          </div>
          
        <div class="col-md-9">

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Tipos de Audiências por mês (<?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); echo ucfirst(strftime('%B', strtotime('today'))); ?>) TOTAL: <?= $total ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-3">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Filtro / Legenda</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <div class="form-group">
              <label>Período:</label>
              <input type="text" class="form-control form-control-1 input-sm from" placeholder="CheckIn" >
          </div>
        <table class="table no-margin">
            <thead>
            <tbody>
            <tr>
              <td><span style="background-color: #def6ff; color:black" class="label ">Audiência Cadastrada</span></td>
              <td>
                <div class="sparkbar" data-color="#def6ff" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #aad4e3; color:black" class="label">Advogado Confirmada</span></td>
              <td>
                <div class="sparkbar" data-color="#aad4e3" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #7db8cc; color:black" class="label">Defesa Elaborada</span></td>
              <td>
                <div class="sparkbar" data-color="#7db8cc" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #5ea5bd; color:black" class="label">Protocolado</span></td>
              <td>
                <div class="sparkbar" data-color="#5ea5bd" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #3e8aa3; color:black" class="label">Enviado Correspondente</span></td>
              <td>
                <div class="sparkbar" data-color="#3e8aa3" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #277791; color:black" class="label">Ata Recebida</span></td>
              <td>
                <div class="sparkbar" data-color="#277791" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #146985; color:black" class="label">Pago</span></td>
              <td>
                <div class="sparkbar" data-color="#146985" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #036180; color:black" class="label">Arquivado</span></td>
              <td>
                <div class="sparkbar" data-color="#036180" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            </tbody>
          </table>
          </div>
          </div>
          </div>
          
        <div class="col-md-9">

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Status de Audiências por mês (<?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); echo ucfirst(strftime('%B', strtotime('today'))); ?>)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- /.row -->
    </section>
    <!-- /.content -->


<!-- ChartJS 1.0.1 -->
<script src="<?= base_url() ?>public/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>public/plugins/fastclick/fastclick.js"></script>
<!-- page script -->
<script>
  $(function () {

    var startDate = new Date();
    $('.from').datepicker({ 
    startView: "year", 
    minViewMode: "months",
        autoclose: true,
        format: 'mm/yyyy'
    });
        
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: <?= $justica_comum ?>,
        color: "#DCDCDC",
        highlight: "#DCDCDC",
        label: "Justiça Comum"
      },
      {
        value: <?= $adv_preposto ?>,
        color: "#93cede",
        highlight: "#93cede",
        label: "Advogado + Preposto"
      },
      {
        value: <?= $preposto ?>,
        color: "#a4b357",
        highlight: "#a4b357",
        label: "Presposto"
      },
      {
        value: <?= $procon ?>,
        color: "#f16f5c",
        highlight: "#f16f5c",
        label: "Procon"
      },
      {
        value: <?= $trabalhista ?>,
        color: "#e9d4b3",
        highlight: "#e9d4b3",
        label: "Trabalhista"
      },
      {
        value: <?= $outros ?>,
        color: "#f7afd6",
        highlight: "#f7afd6",
        label: "Outros"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
  });
</script>

<script>
  $("#charts").addClass('active');
  $("#chartjs").addClass('active');
</script>