
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
              <h3 class="box-title">Filtro</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <div class="form-group">
              <label>Período:</label>
              <div class="form-group">
                <div class="col-lg-6" style="padding-right: 0px; padding-left: 0px;">
                  
                  <div class="input-group">
                  <input value="<?= $data_ini ?>" type="text" name="data_ini_1" class="form-control" id="data_ini_1" placeholder="">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6" style="padding-right: 0px; padding-left: 0px;">
                  <div class="input-group">
                  <input value="<?= $data_fim ?>" type="text" name="data_fim_1" class="form-control" id="data_fim_1" placeholder="">
                  </div>
                  <!-- /input-group -->
                </div>
                </div>
            </div>
            </div>
            </div>
            <div class="box box-danger">
            <div class="">
              <h3 class="box-title">Legenda Status</h3>
        <table class="table no-margin">
            <thead>
            <tbody>
            <tr>
              <td><span style="background-color: #FF5135; color:black" class="label " id="total_audiencia_cadasrtada">Audiência Cadastrada (<?= $audiencia_cadasrtada ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#FF5135" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #FCFF73; color:black" class="label" id="total_adv_confirmado">Advogado Confirmada (<?= $adv_confirmado ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#FCFF73" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #C9FF73; color:black" class="label" id="total_defesa_elaborada">Defesa Elaborada (<?= $defesa_elaborada ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#C9FF73" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #8AFF74; color:black" class="label" id="total_protocolado">Protocolado (<?= $protocolado ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#8AFF74" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #48FF7A; color:black" class="label" id="total_enviado_correspondente">Enviado Correspondente (<?= $enviado_correspondente ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#48FF7A" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #11E7B7; color:black" class="label" id="total_ata_recebida">Ata Recebida (<?= $ata_recebida ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#11E7B7" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #26C9FF; color:black" class="label" id="total_pago">Pago (<?= $pago ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#26C9FF" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #2681FF; color:black" class="label" id="total_arquivado">Arquivado (<?= $arquivado ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#2681FF" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
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
              <h3 class="box-title">Status de Audiências por mês (<?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); echo ucfirst(strftime('%B', strtotime('today'))); ?>) TOTAL: <span id="total_1"><?= $total ?></span</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body" id="box_pieChart2">
              <canvas id="pieChart2" style="height:250px"></canvas>
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
            <div class="">
              <h3 class="box-title">Legenda Tipo</h3>
            </div>
            <div class="box-body">
        <table class="table no-margin">
            <thead>
            <tbody>
            <tr>
              <td><span style="background-color: #DCDCDC; color:black" class="label " id="total_justica_comum">Justiça Comum (<?= $justica_comum ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#DCDCDC" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #93cede; color:black" class="label"  id="total_adv_preposto">Advogado + Preposto (<?= $adv_preposto ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#93cede" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #a4b357; color:black" class="label"  id="total_preposto">Preposto (<?= $preposto ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#a4b357" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #f16f5c; color:black" class="label"  id="total_procon">Procon (<?= $procon ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#f16f5c" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #e9d4b3; color:black" class="label" id="total_trabalhista">Trabalhista (<?= $trabalhista ?>)</span></td>
              <td>
                <div class="sparkbar" data-color="#e9d4b3" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
              </td>
            </tr>
            <tr>
              <td><span style="background-color: #f7afd6; color:black" class="label" id="total_outros">Outros (<?= $outros ?>)</span></td>
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
              <h3 class="box-title">Tipos de Audiências por mês (<?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); echo ucfirst(strftime('%B', strtotime('today'))); ?>) TOTAL: <span id="total_2"><?= $total ?></span></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body"  id="box_pieChart">
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
 <!-- bootstrap datepicker -->
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<script>

  function Atualiza()
  {
    /*$.get(
      '<?=base_url('admin/dashboard/')?>',
      '{data_ini:'+$('#data_ini_1').val()+', data_fim:'+$('#data_fim_1').val()+', <?php echo $this->security->get_csrf_token_name(); ?>:<?php echo $this->security->get_csrf_hash(); ?>}',
      function(response){
          alert(response);
      }*/
    $.get({
        data: 'submit=1&data_ini='+$('#data_ini_1').val()+'&data_fim='+$('#data_fim_1').val()+'&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
        url: '<?php echo base_url();?>admin/dashboard',
        async: true,
        success: function(output){
            var data = JSON.parse(output);

            $('#pieChart2').remove(); // this is my <canvas> element
            $('#box_pieChart2').append('<canvas id="pieChart2" style="height:250px"><canvas>');
            MontaGrafico_1(data);

            $('#pieChart').remove(); // this is my <canvas> element
            $('#box_pieChart').append('<canvas id="pieChart" style="height:250px"><canvas>');
            MontaGrafico_2(data);

            $('#total_1').html(data.total);
            $('#total_2').html(data.total);

            $('#total_audiencia_cadasrtada').html("Audiência Cadastrada ("+data.audiencia_cadasrtada+")");
            $('#total_adv_confirmado').html("Advogado Confirmado ("+data.adv_confirmado+")");
            $('#total_defesa_elaborada').html("Defesa Elaborada ("+data.defesa_elaborada+")");
            $('#total_protocolado').html("Protocolado ("+data.protocolado+")");
            $('#total_enviado_correspondente').html("Enviado Correspondente ("+data.enviado_correspondente+")");
            $('#total_ata_recebida').html("Ata Recebida ("+data.ata_recebida+")");
            $('#total_pago').html("Pago ("+data.pago+")");
            $('#total_arquivado').html("Arquivado ("+data.arquivado+")");

            $('#total_justica_comum').html("Justiça Comum ("+data.justica_comum+")");
            $('#total_adv_preposto').html("Advogado + Preposto ("+data.adv_preposto+")");
            $('#total_preposto').html("Preposto ("+data.preposto+")");
            $('#total_procon').html("Procon ("+data.procon+")");
            $('#total_trabalhista').html("Trabalhista ("+data.trabalhista+")");
            $('#total_outros').html("Outros ("+data.outros+")");
        }
    });
  }

  function MontaGrafico_1(json)
  {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var audiencia_cadasrtada = '';
    var adv_confirmado = '';
    var defesa_elaborada = '';
    var protocolado = '';
    var enviado_correspondente = '';
    var ata_recebida = '';
    var pago = '';
    var arquivado = '';

    if(json == '')
    {
      audiencia_cadasrtada = <?= $audiencia_cadasrtada ?>;
      adv_confirmado = <?= $adv_confirmado ?>;
      defesa_elaborada = <?= $defesa_elaborada ?>;
      protocolado = <?= $protocolado ?>;
      enviado_correspondente = <?= $enviado_correspondente ?>;
      ata_recebida = <?= $ata_recebida ?>;
      pago = <?= $pago ?>;
      arquivado = <?= $arquivado ?>;
    }
    else
    {
      audiencia_cadasrtada = json.audiencia_cadasrtada;
      adv_confirmado = json.adv_confirmado;
      defesa_elaborada = json.defesa_elaborada;
      protocolado = json.protocolado;
      enviado_correspondente = json.enviado_correspondente;
      ata_recebida = json.ata_recebida;
      pago = json.pago;
      arquivado = json.arquivado;
    }

    var pieChartCanvas2 = $("#pieChart2").get(0).getContext("2d");
    var pieChart2 = new Chart(pieChartCanvas2);
    var PieData2 = [
      {
        value: audiencia_cadasrtada,
        color: "#FF5135",
        highlight: "#FF5135",
        label: "Audiência Cadastrada"
      },
      {
        value: adv_confirmado,
        color: "#FCFF73",
        highlight: "#FCFF73",
        label: "Advogado Confirmado"
      },
      {
        value: defesa_elaborada,
        color: "#C9FF73",
        highlight: "#C9FF73",
        label: "Defesa Elaborada"
      },
      {
        value: protocolado,
        color: "#8AFF74",
        highlight: "#8AFF74",
        label: "Protocolado"
      },
      {
        value: enviado_correspondente,
        color: "#11E7B7",
        highlight: "#11E7B7",
        label: "Enviado Correspondente"
      },
      {
        value: ata_recebida,
        color: "#11E7B7",
        highlight: "#11E7B7",
        label: "Ata Recebida"
      }
      ,
      {
        value: pago,
        color: "#26C9FF",
        highlight: "#26C9FF",
        label: "Pago"
      },
      {
        value: arquivado,
        color: "#2681FF",
        highlight: "#2681FF",
        label: "Arquivdo"
      }
    ];
    var pieOptions2 = {
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
    pieChart2.Doughnut(PieData2, pieOptions2);
  }

  function MontaGrafico_2(json)
  {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

    var justica_comum = '';
    var adv_preposto = '';
    var preposto = '';
    var procon = '';
    var trabalhista = '';
    var outros = '';

    if(json == '')
    {
      justica_comum = <?= $justica_comum ?>;
      adv_preposto = <?= $adv_preposto ?>;
      preposto = <?= $preposto ?>;
      procon = <?= $procon ?>;
      trabalhista = <?= $trabalhista ?>;
      outros = <?= $outros ?>;
    }
    else
    {
      justica_comum = json.justica_comum;
      adv_preposto = json.adv_preposto;
      preposto = json.preposto;
      procon = json.procon;
      trabalhista = json.trabalhista;
      outros = json.outros;
    }

    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: justica_comum,
        color: "#DCDCDC",
        highlight: "#DCDCDC",
        label: "Justiça Comum"
      },
      {
        value: adv_preposto,
        color: "#93cede",
        highlight: "#93cede",
        label: "Advogado + Preposto"
      },
      {
        value: preposto,
        color: "#a4b357",
        highlight: "#a4b357",
        label: "Presposto"
      },
      {
        value: procon,
        color: "#f16f5c",
        highlight: "#f16f5c",
        label: "Procon"
      },
      {
        value: trabalhista,
        color: "#e9d4b3",
        highlight: "#e9d4b3",
        label: "Trabalhista"
      },
      {
        value: outros,
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
  }

  $(function () {

    var startDate = new Date();
    $('.form-control').datepicker({ 
      startView: "year", 
      minViewMode: "months",
      autoclose: true,
      format: 'dd/mm/yyyy',
      multidate: true
    }).on('changeDate', function(ev){                 
        $('.form-control').datepicker('hide');
        Atualiza();
    });

    MontaGrafico_1('');
    MontaGrafico_2('');
    
  });
</script>

<script>
  $("#charts").addClass('active');
  $("#chartjs").addClass('active');
</script>