<section class="content-header">
	<div class="row">
	    <div class="col-md-12">
	      <div class="box box-body">
	        <div class="col-md-6">
	          <h4><i class="fa fa-list"></i> &nbsp; Comarcas</h4>
	        </div>
	        <div class="col-md-6 text-right">
	          <a href="<?= base_url('admin/comarca/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a>
	        </div>
	        
	      </div>
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
	$.post('<?=base_url('admin/comarca/filterdata')?>',$('.filterdata').serialize(),function(){
		$('.data_container').load('<?=base_url('admin/comarca/list_data')?>');
	});
}
//------------------------------------------------------------------
function load_records()
{
	$('.data_container').html('<div class="text-center"><img src="<?=base_url('theme/common')?>/preloader.gif"/></div>');
	$('.data_container').load('<?=base_url('admin/comarca/list_data')?>');
}
load_records();

//---------------------------------------------------------------------
$("body").on("change",".tgl_checkbox",function(){
	$.post('<?=base_url("admin/comarca/change_status")?>',
	{
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		id : $(this).data('id'),
		status : $(this).is(':checked')==true?1:0
	},
	function(data){
		$.notify("Status alterado com sucesso!", "success");
	});
});
</script>