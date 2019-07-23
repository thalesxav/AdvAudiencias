<?php
//var_dump($users_detail);//exit;
?>  
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp; Usuários</h4>
        </div>
        <div class="col-md-6 text-right">
         <?php if($this->rbac->check_operation_permission('add')): ?>
          <a href="<?= base_url('admin/users/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Novo Usuário</a>
         <?php endif; ?>
        </div>
        
      </div>
    </div>
  </div> 

   <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th width="50">#ID</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Acessos</th>
          <!--<th width="100">Status</th>//-->
          <th width="100">Ação</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($users_detail as $data): ?>
          <tr>
            <td><?= $data['id']; ?></td>
            <td><?= $data['username']; ?></td>
            <td><?= $data['email']; ?></td>
            <td>
              <span class="btn btn-default btn-flat btn-xs" style="<?= (strpos($data['acessos'], '2') !== false) ? "" : "display:none" ?>" >Cadastro de Advogados</span>
              <span class="btn btn-default btn-flat btn-xs" style="<?= (strpos($data['acessos'], '3') !== false) ? "" : "display:none" ?>">Cadastro de Audiências</span>
              <span class="btn btn-default btn-flat btn-xs" style="<?= (strpos($data['acessos'], '4') !== false) ? "" : "display:none" ?>">Relatório de Apuração</span>
            </td>
            <!--<td><input class='tgl tgl-ios tgl_checkbox' 
                data-id="<?=$data['id']?>" 
                id='cb_<?=$data['id']?>' 
                type='checkbox' <?php echo ($data['id'] == 1)? "checked" : ""; ?> />
                <label class='tgl-btn' for='cb_<?=$data['id']?>'></label>
            </td>//-->

           <td>
           <!-- div class="btn-group pull-right">//-->
              <!--<a title="Visualizar" href="<?= base_url('admin/users/view/'.$data['id']); ?>" class="view btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
              <a href="<?= base_url('admin/users/invoice_pdf_download/'.$data['id']); ?>" class="btn btn-primary"><i class="fa fa-download"></i></a>//-->
              <a title="Editar" href="<?= base_url('admin/users/edit/'.$data['id']); ?>" class="update btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
              <a title="Deletar" href="<?= base_url('admin/users/del/'.$data['id']); ?>" class="delete btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            <!--</div>//--></td>
		      </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  <!-- /.box -->
</section>  

<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  
<script>
  $(function () {
    $("#example1").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'/*, 'print'*/
        ]
    });
  });
</script> 
<script>
  $("#invoices").addClass('active');

  
</script>  

<!-- Modal -->
<div id="confirm-delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
        <p>As you sure you want to delete.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div>

  </div>
</div>


  
  <script type="text/javascript">
      $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
  </script>

  <script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/users/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("Status Changed Successfully", "success");
    });
  });
  </script>

  

