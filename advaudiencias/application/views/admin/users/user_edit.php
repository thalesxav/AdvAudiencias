<?php
//var_dump($user);
?>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-pencil"></i> &nbsp; Editar Usuário</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Voltar</a>
          <!--<a href="<?= base_url('admin/users/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Usuário</a>//-->
        </div>
        
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
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
           
            <?php echo form_open(base_url('admin/users/edit/'.$user['id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Nome</label>

                <div class="col-sm-9">
                  <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" id="username" placeholder="">
                </div>
              </div>
              <!--<div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">First Name</label>

                <div class="col-sm-9">
                  <input type="text" name="firstname" value="<?= $user['firstname']; ?>" class="form-control" id="firstname" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Last Name</label>

                <div class="col-sm-9">
                  <input type="text" name="lastname" value="<?= $user['lastname']; ?>" class="form-control" id="lastname" placeholder="">
                </div>
              </div>
//-->
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-mail</label>

                <div class="col-sm-9">
                  <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" id="email" placeholder="">
                </div>
              </div> <!--
              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Senha</label>

                <div class="col-sm-9">
                  <input type="text" name="senha_1" value="" class="form-control" id="password" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Repita a Senha</label>

                <div class="col-sm-9">
                  <input type="text" name="senha_2" value="" class="form-control" id="password" placeholder="">
                </div>
              </div>//-->
              <!--<div class="form-group">
                <label for="role" class="col-sm-2 control-label">Select Status</label>

                <div class="col-sm-9">
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($user['is_active'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($user['is_active'] == 0)?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div>//-->

              <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Acessos</label>

                <div class="col-sm-9">
                <table class="tg">
                    <tr>
                      <th class="tg-0lax">
                      <input <?= (strpos($user['acessos'], '1') !== false) ? "checked" : "" ?> type="checkbox" name="acessos[]"  id="adm" value="1" /> <b>Administrador</b><br/><br/>
                        <input <?= (strpos($user['acessos'], '2') !== false) ? "checked" : "" ?> type="checkbox" class="acessos" name="acessos[]"  id="acesso_advogados" value="2" /> Cadastro de Advogados<br/>
                        <input <?= (strpos($user['acessos'], '3') !== false) ? "checked" : "" ?> type="checkbox" class="acessos" name="acessos[]"  id="acesso_audiencias" value="3" /> Cadastro de Audiências<br/>
                        <input <?= (strpos($user['acessos'], '4') !== false) ? "checked" : "" ?> type="checkbox" class="acessos" name="acessos[]" id="acesso_apuracao" value="4" /> Relatório de Apuração<br/>
                        
                      </th>
                    </tr>
                  </table>
                </div>
              </div>

              <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Estados</label>


                <div class="col-sm-9">

                  <input type="checkbox" name="todos"  id="todos" ><b> Selecionar todos Estados</b><br/><br/>

                  <table class="tg">
                    <tr>
                      <th class="tg-0lax">
                            <input <?= (strpos($user['estados'], '1') !== false) ? "checked" : "" ?> class="estados" type="checkbox" name="estados[]" value="1" /> Acre 
                        <br/><input <?= (strpos($user['estados'], '2') !== false) ? "checked" : "" ?> class="estados"  type="checkbox" name="estados[]" value="2" /> Alagoas 
                        <br/><input <?= (strpos($user['estados'], '3') !== false) ? "checked" : "" ?> class="estados"  type="checkbox" name="estados[]" value="3" /> Amapá 
                        <br/><input <?= (strpos($user['estados'], '4') !== false) ? "checked" : "" ?> class="estados"  type="checkbox" name="estados[]" value="4" /> Amazonas 
                        <br/><input <?= (strpos($user['estados'], '5') !== false) ? "checked" : "" ?> class="estados"  type="checkbox" name="estados[]" value="5" /> Bahia 
                        <br/><input <?= (strpos($user['estados'], '6') !== false) ? "checked" : "" ?> class="estados"  type="checkbox" name="estados[]" value="6" /> Ceará 
                        <br/><input <?= (strpos($user['estados'], '7') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="7" /> Distrito Federal 
                        <br/><input <?= (strpos($user['estados'], '8') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="8" /> Espírito Santo 
                        <br/><input <?= (strpos($user['estados'], '9') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="9" /> Goiás 
                        <br/><input <?= (strpos($user['estados'], '10') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="10" /> Maranhão 
                        <br/><input <?= (strpos($user['estados'], '11') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="11" /> Mato Grosso 
                        <br/><input <?= (strpos($user['estados'], '12') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="12" /> Mato Grosso do Sul
                        <br/><input <?= (strpos($user['estados'], '13') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="13" /> Minas Gerais 
                        <br/><input <?= (strpos($user['estados'], '14') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="14" /> Pará
                      </th>
                      <th class="tg-0lax">
                        <input  <?= (strpos($user['estados'], '15') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="15" /> Paraíba 
                        <br/><input <?= (strpos($user['estados'], '16') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="16" /> Paraná
                        <br/><input <?= (strpos($user['estados'], '17') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="17" /> Pernambuco
                        <br/><input <?= (strpos($user['estados'], '18') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="18" /> Piauí 
                        <br/><input <?= (strpos($user['estados'], '19') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="19" /> Rondônia 
                        <br/><input <?= (strpos($user['estados'], '20') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="20" /> Roraima 
                        <br/><input <?= (strpos($user['estados'], '21') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="21" /> Rio de Janeiro
                        <br/><input <?= (strpos($user['estados'], '22') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="22" /> Rio Grande do Sul
                        <br/><input <?= (strpos($user['estados'], '23') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="23" /> Rio Grande do Norte
                        <br/><input <?= (strpos($user['estados'], '24') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="24" /> Santa Catarina 
                        <br/><input <?= (strpos($user['estados'], '25') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="25" /> Sergipe 
                        <br/><input <?= (strpos($user['estados'], '26') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="26" /> São Paulo
                        <br/><input <?= (strpos($user['estados'], '27') !== false) ? "checked" : "" ?>  class="estados"  type="checkbox" name="estados[]" value="27" /> Tocantins 
                      </th>
                    </tr>
                  </table> 
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Atualizar" class="btn btn-info pull-right">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="button" onclick="window.location='<?= base_url('admin/users/change_pwd/'.$user['id']); ?>'" name="submit" value="Trocar senha" class="btn btn-danger pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

  <script type="text/javascript">

$("#todos").click(function () {
    $(".estados").prop('checked', $(this).prop('checked'));
});


$("#adm").click(function () {
    $(".acessos").prop('checked', $(this).prop('checked'));
});

</script>

<style type="text/css">

th{font-weight:normal;}

</style>

</section> 