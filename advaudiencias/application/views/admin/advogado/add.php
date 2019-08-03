<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">


  
  <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; Novo Advogado</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/advogado'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Voltar</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('admin/advogado/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="codigo" class="col-sm-2 control-label">Código</label>

                <div class="col-sm-9">
                  <input readonly value="<?= $codigo ?>" type="text" name="codigo" class="form-control" id="codigo" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>

                <div class="col-sm-9">
                  <input value="<?= set_value('noem'); ?>" type="text" name="nome" class="form-control" id="nome" placeholder="">
                </div>
              </div>

              <div class="form-group">
              <label for="numero_oab" class="col-sm-2 control-label">Número OAB</label>
                <div class="col-lg-4">
                  
                  <div class="input-group">
                  <input value="<?= set_value('numero_oab'); ?>" type="text" name="numero_oab" class="form-control" id="numero_oab" placeholder="">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <label for="cpf" class="col-sm-2 control-label">CPF</label>
                <div class="col-lg-3">
                  <div class="input-group">
                  <input value="<?= set_value('cpf'); ?>" type="text" name="cpf" class="form-control" id="cpf" placeholder="">
                  </div>
                  <!-- /input-group -->
                </div>
              </div>

              
              <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">E-mail</label>

                  <div class="col-sm-9">
                  <input value="<?= set_value('email'); ?>"  type="text" name="email" class="form-control" id="email" placeholder="">
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="telefone" class="col-sm-2 control-label">Telefone</label>

                  <div class="col-sm-4">
                  <input value="<?= set_value('telefone'); ?>" type="text" name="telefone" class="form-control" id="telefone" placeholder="">
                  </div>
              </div>

              <div class="form-group">
                <label for="banco" class="col-sm-2 control-label">Banco</label>
                <div class="col-sm-9">
                  <select class="form-control select2" name="banco" style="width: 100%;">
                    <?php foreach($bancos as $role): ?>
                      <option value="<?= $role['cod']; ?>"><?= $role['banco']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="agencia" class="col-sm-2 control-label">Agência</label>
                <div class="col-lg-4">
                  
                  <div class="input-group">
                    <input value="<?= set_value('agencia'); ?>" name="agencia" type="text" class="form-control">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <label for="conta" class="col-sm-2 control-label">Conta</label>
                <div class="col-lg-3">
                  <div class="input-group">
                    <input value="<?= set_value('conta'); ?>" name="conta" type="text" class="form-control">
                  </div>
                  <!-- /input-group -->
                </div>
              </div>

              <div class="form-group">
              <label for="estado" class="col-sm-2 control-label">Atuação/Comarcas</label>
                <div class="col-sm-9">
                  <select name="comarcas[]" class="form-control select2" id="comarcas" multiple="multiple" data-placeholder="Selecione" style="width: 100%;">
                    <?php foreach($comarcas as $role): ?>
                      <option value="<?= $role['codigo']; ?>"><?= $role['estado']; ?> - <?= $role['comarca']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <hr/>
              <div class="form-group"><b>Valor Diligências</b></div>
              <div class="form-group">
                <label for="vlr_justica_comum" class="col-sm-2 control-label">Justiça Comum</label>
                <div class="col-lg-4">
                  
                  <div class="input-group">
                    <input value="<?= set_value('vlr_justica_comum'); ?>" name="vlr_justica_comum" type="text" class="form-control">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <label for="vlr_adv_preposto" class="col-sm-2 control-label">Advogado + Preposto</label>
                <div class="col-lg-3">
                  <div class="input-group">
                    <input value="<?= set_value('vlr_adv_preposto'); ?>" name="vlr_adv_preposto" type="text" class="form-control">
                  </div>
                  <!-- /input-group -->
                </div>
              </div>

              <div class="form-group">
                <label for="vlr_preposto" class="col-sm-2 control-label">Preposto</label>
                <div class="col-lg-4">
                  
                  <div class="input-group">
                    <input value="<?= set_value('vlr_preposto'); ?>" name="vlr_preposto" type="text" class="form-control">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <label for="vlr_procon" class="col-sm-2 control-label">Procon</label>
                <div class="col-lg-3">
                  <div class="input-group">
                    <input value="<?= set_value('vlr_procon'); ?>" name="vlr_procon" type="text" class="form-control">
                  </div>
                  <!-- /input-group -->
                </div>
              </div>

              <div class="form-group">
                <label for="vlr_trabalhista" class="col-sm-2 control-label">Trabalhista</label>
                <div class="col-lg-4">
                  
                  <div class="input-group">
                    <input value="<?= set_value('vlr_trabalhista'); ?>" name="vlr_trabalhista" type="text" class="form-control">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <label for="vlr_outros" class="col-sm-2 control-label">Outros</label>
                <div class="col-lg-3">
                  <div class="input-group">
                    <input value="<?= set_value('vlr_outros'); ?>" name="vlr_outros" type="text" class="form-control">
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Salvar" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 


<!-- Select2 -->
<script src="<?= base_url() ?>public/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<!-- Page script -->
<script>

  $(function () {

    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    $("#cpf").inputmask("999.999.999-99");
    $("#telefone").inputmask("(99)99999-9999");
    $("input[name='vlr_justica_comum']").maskMoney();
    $("input[name='vlr_adv_preposto']").maskMoney();
    $("input[name='vlr_preposto']").maskMoney();
    $("input[name='vlr_procon']").maskMoney();
    $("input[name='vlr_trabalhista']").maskMoney();
    $("input[name='vlr_outros']").maskMoney();
  });
</script>


<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: black;
}
</style>