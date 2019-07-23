<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; Novo Usuário</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Voltar</a>
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
           
            <?php echo form_open(base_url('admin/users/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Nome Completo</label>

                <div class="col-sm-9">
                  <input type="text" name="username" class="form-control" id="username" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-mail/Login</label>

                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" id="email" placeholder="">
                </div>
              </div>
              
              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Senha</label>

                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" id="password" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Acessos</label>

                <div class="col-sm-9">
                <table class="tg">
                    <tr>
                      <th class="tg-0lax">
                      <input type="checkbox" name="acessos[]"  id="adm" value="1" /> <b>Administrador</b><br/><br/>
                        <input type="checkbox" class="acessos" name="acessos[]"  id="acesso_advogados" value="2" /> Cadastro de Advogados<br/>
                        <input type="checkbox" class="acessos" name="acessos[]"  id="acesso_audiencias" value="3" /> Cadastro de Audiências<br/>
                        <input type="checkbox" class="acessos" name="acessos[]" id="acesso_apuracao" value="4" /> Relatório de Apuração<br/>
                        
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
                            <input class="estados" type="checkbox" name="estados[]" value="1" /> Acre 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="2" /> Alagoas 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="3" /> Amapá 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="4" /> Amazonas 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="5" /> Bahia 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="6" /> Ceará 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="7" /> Distrito Federal 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="8" /> Espírito Santo 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="9" /> Goiás 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="10" /> Maranhão 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="11" /> Mato Grosso 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="12" /> Mato Grosso do Sul
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="13" /> Minas Gerais 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="14" /> Pará
                      </th>
                      <th class="tg-0lax">
                        <input class="estados"  type="checkbox" name="estados[]" value="15" /> Paraíba 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="16" /> Paraná
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="17" /> Pernambuco
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="18" /> Piauí 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="19" /> Rondônia 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="20" /> Roraima 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="21" /> Rio de Janeiro
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="22" /> Rio Grande do Sul
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="23" /> Rio Grande do Norte
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="24" /> Santa Catarina 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="25" /> Sergipe 
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="26" /> São Paulo
                        <br/><input class="estados"  type="checkbox" name="estados[]" value="27" /> Tocantins 
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
            <?php echo form_close( ); ?>
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