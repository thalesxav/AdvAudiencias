
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">
  
  <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; Novo Usuário</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Voltar</a>
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
           
            <?php echo form_open(base_url('admin/admin/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Nome*</label>

                <div class="col-sm-9">
                  <input value="<?= set_value('username'); ?>" type="text" name="username" class="form-control" id="username" placeholder="">
                </div>
              </div>
              <!--<div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">First Name</label>

                <div class="col-sm-9">
                  <input type="text" name="firstname" class="form-control" id="firstname" placeholder="">
                </div>
              </div>
              
              <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Last Name</label>

                <div class="col-sm-9">
                  <input type="text" name="lastname" class="form-control" id="lastname" placeholder="">
                </div>
              </div>//-->

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-mail/Login*</label>

                <div class="col-sm-9">
                  <input value="<?= set_value('email'); ?>" type="email" name="email" class="form-control" id="email" placeholder="">
                </div>
              </div>
             <!-- <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Mobile No</label>

                <div class="col-sm-9">
                  <input type="number" name="mobile_no" class="form-control" id="mobile_no" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" id="password" placeholder="">
                </div>
              </div>//-->
        
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Perfil*</label>
                <div class="col-sm-9">
                  <select name="role[]" class="form-control select2" id="select_role" multiple="multiple" data-placeholder="Selecione" style="width: 100%;">
                    <?php foreach($admin_roles as $role): ?>
                      <?php
                      if (strpos($admin['roles_ids'], $role['admin_role_id']) !== false)/*if($role['admin_role_id'] == $admin['admin_role_id'])*/: ?>
                        <option <?= ($role['admin_role_id'] == 1) ? 'id="admin"' : 'id="option_'.$role['admin_role_id'].'"' ?>  value="<?= $role['admin_role_id']; ?>" selected><?= $role['admin_role_title']; ?></option>
                      <?php else: ?>
                        <option <?= ($role['admin_role_id'] == 1) ? 'id="admin"' : 'id="option_'.$role['admin_role_id'].'"' ?> value="<?= $role['admin_role_id']; ?>"><?= $role['admin_role_title']; ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              
              <?php
                $array_estados = array();
              ?>

              <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Estados</label>
                <div class="col-sm-9">
                  <input type="checkbox" name="todos"  id="todos" ><b> Selecionar todos Estados</b><br/><br/>
                  <table class="tg">
                    <tr>
                      <th class="tg-0lax">
                            <input <?= in_array('1', $array_estados) ? "checked" : "" ?> class="estados" type="checkbox" name="estados[]" value="1" /> Acre 
                        <br/><input <?= in_array('2', $array_estados)  ? "checked" : "" ?> class="estados"  type="checkbox" name="estados[]" value="2" /> Alagoas 
                        <br/><input <?= in_array('3', $array_estados)  ? "checked" : "" ?> class="estados"  type="checkbox" name="estados[]" value="3" /> Amapá 
                        <br/><input <?= in_array('4', $array_estados)  ? "checked" : "" ?> class="estados"  type="checkbox" name="estados[]" value="4" /> Amazonas 
                        <br/><input <?= in_array('5', $array_estados)  ? "checked" : "" ?> class="estados"  type="checkbox" name="estados[]" value="5" /> Bahia 
                        <br/><input <?= in_array('6', $array_estados)  ? "checked" : "" ?> class="estados"  type="checkbox" name="estados[]" value="6" /> Ceará 
                        <br/><input <?= in_array('7', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="7" /> Distrito Federal 
                        <br/><input <?= in_array('8', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="8" /> Espírito Santo 
                        <br/><input <?= in_array('9', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="9" /> Goiás 
                        <br/><input <?= in_array('10', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="10" /> Maranhão 
                        <br/><input <?= in_array('11', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="11" /> Mato Grosso 
                        <br/><input <?= in_array('12', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="12" /> Mato Grosso do Sul
                        <br/><input <?= in_array('13', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="13" /> Minas Gerais 
                        <br/><input <?= in_array('14', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="14" /> Pará
                      </th>
                      <th class="tg-0lax">
                        <input  <?= in_array('15', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="15" /> Paraíba 
                        <br/><input <?= in_array('16', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="16" /> Paraná
                        <br/><input <?= in_array('17', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="17" /> Pernambuco
                        <br/><input <?= in_array('18', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="18" /> Piauí 
                        <br/><input <?= in_array('19', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="19" /> Rondônia 
                        <br/><input <?= in_array('20', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="20" /> Roraima 
                        <br/><input <?= in_array('21', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="21" /> Rio de Janeiro
                        <br/><input <?= in_array('22', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="22" /> Rio Grande do Sul
                        <br/><input <?= in_array('23', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="23" /> Rio Grande do Norte
                        <br/><input <?= in_array('24', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="24" /> Santa Catarina 
                        <br/><input <?= in_array('25', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="25" /> Sergipe 
                        <br/><input <?= in_array('26', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="26" /> São Paulo
                        <br/><input <?= in_array('27', $array_estados)  ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="27" /> Tocantins 
                      </th>
                    </tr>
                  </table> 
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

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });

  $("#todos").click(function () {
      $(".estados").prop('checked', $(this).prop('checked'));
  });

  $( "#select_role" )
  .change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      if($( this ).text() == "Administrador")
      {
        $("#option_2").prop('selected', $(this).prop('selected'));
        $("#option_3").prop('selected', $(this).prop('selected'));
        $("#option_4").prop('selected', $(this).prop('selected'));
      }
    });
    
  })
  .change();

</script>

<style type="text/css">

th{font-weight:normal;}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: black;
}
</style>