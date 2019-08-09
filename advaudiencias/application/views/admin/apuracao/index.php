

<script>
  <?php

  require_once(base_url().'public/plugins/pdfmake.min.js');
  require_once(base_url().'public/plugins/vfs_fonts.js');

  ?>
</script>

<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">

  <section class="content" style="min-height: 0">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-body">
          <div class="col-md-6">
            <h4><i class="fa fa-list"></i> &nbsp;Relatório de Pagamentos: Advogados por Audiência</h4>
          </div>
          <!--<div class="col-md-6 text-right">
            <div class="btn-group margin-bottom-20"> 
              <a href="<?= base_url('admin/apuracao/create_users_pdf') ?>" class="btn btn-success">Exportar PDF</a>
              <a href="<?= base_url('admin/apuracao/export_csv') ?>" class="btn btn-success">Exportar Excel</a>
            </div>
          </div>//-->
          
        </div>
      </div>
    </div>

    <div class="box">
        <div class="box-header"></div>
        <div class="box-body table-responsive">  
        <?php echo form_open("/",'class="filterdata"') ?> 
		  		
				<div class="col-sm-3">
					<label for="status" >Advogado:</label>
					<div class="form-group">
						<select name="advogados[]" class="form-control select2" id="advogados" multiple="multiple" data-placeholder="Selecione" style="width: 100%;">
							<?php foreach($advogados as $role): ?>
							<option value="<?= $role['codigo']; ?>"><?= $role['nome']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
              <div class="col-md-3">
                  <label>Data inicial:</label><input name="user_search_from" type="text" class="form-control form-control-inline input-medium datepicker" id="data_1" />
              </div>
              <div class="col-md-3"> 
                  <label>Data final:</label><input name="user_search_to" type="text" class="form-control form-control-inline input-medium datepicker" id="data_2" /> 
              </div>
              <div class="col-md-2"> 
                  <button type="button" style="margin-top:20px;" onclick="filter_data()" class="btn btn-info">Enviar</button>
              </div>
          <?php echo form_close(); ?>
      </div>
    </div>  
</section>

 <section class="content">
   <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <div class="data_container">
      <table id="example1" class="table table-bordered table-striped" width="100%">
        <thead>
        <tr>
          <th>#ID</th>
          <th>Data</th>
          <th>Estado</th>
          <th>Advogado</th>
          <th>Processo</th>
          <th>Tipo Audiência</th>
          <th>Valor</th>
          <th>Pagamento</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($apuracao_detail as $data): ?>
          <tr>
            <td><?= $data['codigo_audiencia']; ?></td>
            <td> 
                    <?php $date = date_create($data['data']); ?>
                    <?=date_format($date,"d/m/Y")?> <?=$data['hora']?>
            </td>
            <td><?= $data['estado']; ?></td>
            <td><?= $data['codigo_advogado']. ' - '.$data['nome']; ?></td>
            <td><?= $data['processo']; ?></td>
            <td>
              <?php
                  if($data['tipo_audiencia'] == '1') 
                    echo 'Justiça Comum';
                  else if($data['tipo_audiencia'] == '2') 
                    echo 'Advogado + Preposto';
                  else if($data['tipo_audiencia'] == '3') 
                    echo 'Presposto';
                  else if($data['tipo_audiencia'] == '4') 
                    echo 'Procon';
                  else if($data['tipo_audiencia'] == '5') 
                    echo 'Trabalhista';
                  else if($data['tipo_audiencia'] == '6') 
                    echo 'Outros';
                ?>
            </td>
            <td>
            <?php
                  if($data['tipo_audiencia'] == '1') 
                    echo $data['vlr_justica_comum'];
                  else if($data['tipo_audiencia'] == '2') 
                    echo $data['vlr_adv_preposto'];
                  else if($data['tipo_audiencia'] == '3') 
                    echo $data['vlr_preposto'];
                  else if($data['tipo_audiencia'] == '4') 
                    echo $data['vlr_procon'];
                  else if($data['tipo_audiencia'] == '5') 
                    echo $data['vlr_trabalhista'];
                  else if($data['tipo_audiencia'] == '6') 
                    echo $data['vlr_outros'];
                ?>
            </td>
            <td>
              <?= 'Banco: '.$data['banco'].'<br/> '; ?>
              <?= 'Agência: '.$data['agencia'].'<br/> Conta: '.$data['conta'].'<br/>'; ?>
            </td>
		      </tr>
          <?php endforeach; ?>
        </tbody>
        </div>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  


  <!-- Select2 -->
  <script src="<?= base_url() ?>public/plugins/select2/select2.full.min.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script>
   $(function () {

		//Initialize Select2 Elements
		$(".select2").select2();

   });

$('#data_1').datepicker({
     autoclose: true,
     format: 'dd/mm/yyyy',                
     language: 'pt-BR',
     clearBtn: true,
      keepEmptyValues: true,
      todayHighlight: true
 });

 $('#data_2').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',                
        language: 'pt-BR',
        clearBtn: true,
        keepEmptyValues: true,
    });
  </script>
  <!-- DataTables -->

<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="<?= base_url().'public/plugins/pdfmake.min.js' ?>"></script>
<script type="text/javascript" src="<?= base_url().'public/plugins/vfs_fonts.js' ?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  
<script>
//------------------------------------------------------------------
  function filter_data()
  {
    $('.data_container').html('<div class="text-center"><img src="<?=base_url('theme/common')?>/preloader.gif"/></div>');
    $.post('<?=base_url('admin/apuracao/filterdata')?>',$('.filterdata').serialize(),function(){
      $('.data_container').load('<?=base_url('admin/apuracao/list_data')?>');
    });
  }
  
  $( document ).ready(function() {
    $("#example1").DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'csv', */'excel', 'pdf', 'print'
        ]
    });
  });
  
  $("#invoices").addClass('active');
</script>  

<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: black;
}
.ui-widget-content {
    z-index: 9999 !important;
}
</style>
  
  

