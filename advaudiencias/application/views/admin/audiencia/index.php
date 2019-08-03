<section class="content-header">
	<div class="row">
	    <div class="col-md-12">
	      <div class="box box-body">
	        <div class="col-md-6">
	          <h4><i class="fa fa-list"></i> &nbsp; Audiências</h4>
	        </div>
	        <div class="col-md-6 text-right">
	          <a href="<?= base_url('admin/audiencia/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a>
	        </div>
	        
	      </div>
	    </div>
	</div> 

	<div class="box">
        <div class="box-header">
        </div>
        <div class="box-body table-responsive">  
            <?php echo form_open("/",'class="filterdata"') ?>    
                <div class="row">
                   <!--<div class="col-sm-3">
                        <div class="form-group">
                            <select name="type" class="form-control" onchange="filter_data()" >
                                <option value="">Todos</option>
                                <?php foreach($admin_roles as $admin_role):?>
                                <option value="<?=$admin_role['admin_role_id']?>"><?=$admin_role['admin_role_title']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                   </div>//-->
				   <label for="status" class="col-sm-2 control-label">Filtrar por:</label>
                   <div class="col-sm-6">
                        <div class="form-group">
                            <select name="status" class="form-control" onchange="filter_data()" >
                                <option value="">Todas Audiências</option>
                                <option value="1">Audiência Cadastrada</option>
                                <option value="2">Advogado Confirmado</option>
								<option value="3">Defesa Elaborada</option>
								<option value="4">Protocolado</option>
								<option value="5">Enviado Correspondente</option>
								<option value="6">Ata Recebida</option>
								<option value="7">Pago</option>
								<option value="8">Arquivado</option>
                            </select>
                        </div>
                   </div>
                   <!--<div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control"  placeholder="Procurar..." onkeyup="filter_data()" />
                        </div>
                   </div>//-->
                </div>
            <?php echo form_close(); ?> 
      	</div>
    </div> 

</section>
<!-- Main content -->
<section class="content mt10">
	<div class="box">
		<div class="box-header">
		</div>
		<div class="box-body">
        	
        	<!-- Load Admin list (json request)-->
            <div class="data_container"></div>

		</div>
	</div>
</section>
<!-- /.content -->


<script>
//------------------------------------------------------------------
function filter_data()
{
	$('.data_container').html('<div class="text-center"><img src="<?=base_url('theme/common')?>/preloader.gif"/></div>');
	$.post('<?=base_url('admin/audiencia/filterdata')?>',$('.filterdata').serialize(),function(){
		$('.data_container').load('<?=base_url('admin/audiencia/list_data')?>');
	});
}
//------------------------------------------------------------------
function load_records()
{
	$('.data_container').html('<div class="text-center"><img src="<?=base_url('theme/common')?>/preloader.gif"/></div>');
	$('.data_container').load('<?=base_url('admin/audiencia/list_data')?>');
}
load_records();


</script>