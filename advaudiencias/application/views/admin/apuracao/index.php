  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">

  <section class="content" style="min-height: 0">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-body">
          <div class="col-md-6">
            <h4><i class="fa fa-list"></i> &nbsp;Relatório de pagamentos a Advogados</h4>
          </div>
          <div class="col-md-6 text-right">
            <div class="btn-group margin-bottom-20"> 
              <a href="<?= base_url('admin/example/create_users_pdf') ?>" class="btn btn-success">Exportar PDF</a>
              <a href="<?= base_url('admin/example/export_csv') ?>" class="btn btn-success">Exportar as Excel</a>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <div class="box">
        <div class="box-header"></div>
        <div class="box-body table-responsive">  
          <?php echo form_open("/",'id="user_search"') ?>
		  		
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
                  <label>Data inicial:</label><input name="user_search_from" type="text" class="form-control form-control-inline input-medium datepicker" id="" />
              </div>
              <div class="col-md-3"> 
                  <label>Data final:</label><input name="user_search_to" type="text" class="form-control form-control-inline input-medium datepicker" id="" /> 
              </div>
              <div class="col-md-2"> 
                  <button type="button" style="margin-top:20px;" onclick="user_filter()" class="btn btn-info">Enviar</button>
                  <a href="<?= base_url('admin/example/advance_search'); ?>" class="btn btn-danger" style="margin-top:20px;">
                    <i class="fa fa-repeat"></i>
                  </a>
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
      <table id="na_datatable" class="table table-bordered table-striped" width="100%">
        <thead>
        <tr>
          <th>#ID</th>
          <th>User Name</th>
          <th>Email</th>
          <th>Mobile No.</th>
          <th>Created Date</th>
          <th>Status</th>
        </tr>
        </thead>
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

   $('.datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',                
        language: 'pt-BR',
    });
  </script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "<?=base_url('admin/example/advance_datatable_json')?>",
      "order": [[4,'desc']],
      "columnDefs": [
        { "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "username", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "email", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "mobile_no", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "created_at", 'searchable':false, 'orderable':false},
        { "targets": 5, "name": "is_active", 'searchable':true, 'orderable':true},
      ]
    });

  //---------------------------------------------------
  function user_filter()
  {
    var _form = $("#user_search").serialize();
    $.ajax({
        data: _form,
        type: 'post',
        url: '<?php echo base_url();?>admin/example/search',
        async: true,
        success: function(output){
            table.ajax.reload( null, false );
        }
    });
  }
  </script>

<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: black;
}
.ui-widget-content {
    z-index: 9999 !important;
}
</style>
  
  

