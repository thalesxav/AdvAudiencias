<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; Novo Usuário</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Voltar para Lista de Usuários</a>
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
                <label for="email" class="col-sm-2 control-label">E-mail</label>

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
                  <input type="checkbox" name="acesso_advogados"  id="acesso_advogados" >Advogados<br/>
                  <input type="checkbox" name="acesso_audiencias"  id="acesso_audiencias" >Audiências<br/>
                  <input type="checkbox" name="acesso_apuracao" id="acesso_apuracao">Apuração<br/>
                </div>
              </div>

              <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Estados</label>

                <div class="col-sm-9">
                <input type="checkbox" name="estados[]" value="Acre" />Acre 
                <input type="checkbox" name="estados[]" value="Alagoas" />Alagoas 
                <input type="checkbox" name="estados[]" value="Amapá" />Amapá 
                <input type="checkbox" name="estados[]" value="Amazonas" />Amazonas 
                <input type="checkbox" name="estados[]" value="Bahia" />Bahia 
                <input type="checkbox" name="estados[]" value="Ceará" />Ceará 
                <input type="checkbox" name="estados[]" value="Distrito Federal" />Distrito Federal 
                <input type="checkbox" name="estados[]" value="Espírito Santo" />Espírito Santo 
                <input type="checkbox" name="estados[]" value="Goiás" />Goiás 
                <input type="checkbox" name="estados[]" value="Maranhão" />Maranhão 
                <input type="checkbox" name="estados[]" value="Mato Grosso" />Mato Grosso 
                <input type="checkbox" name="estados[]" value="Mato Grosso do Sul" />Mato Grosso do Sul
                <input type="checkbox" name="estados[]" value="Minas Gerais" />Minas Gerais 
                <input type="checkbox" name="estados[]" value="Pará" />Pará
                <input type="checkbox" name="estados[]" value="Paraíba" />Paraíba 
                <input type="checkbox" name="estados[]" value="Paraná" />Paraná
                <input type="checkbox" name="estados[]" value="Pernambuco" />Pernambuco
                <input type="checkbox" name="estados[]" value="Piauí" />Piauí 
                <input type="checkbox" name="estados[]" value="Rondônia" />Rondônia 
                <input type="checkbox" name="estados[]" value="Roraima" />Roraima 
                <input type="checkbox" name="estados[]" value="Rio de Janeiro" />Rio de Janeiro
                <input type="checkbox" name="estados[]" value="Rio Grande do Sul" />Rio Grande do Sul
                <input type="checkbox" name="estados[]" value="Rio Grande do Norte" />Rio Grande do Norte
                <input type="checkbox" name="estados[]" value="Santa Catarina" />Santa Catarina 
                <input type="checkbox" name="estados[]" value="Sergipe" />Sergipe 
                <input type="checkbox" name="estados[]" value="São Paulo" />São Paulo
                <input type="checkbox" name="estados[]" value="Tocantins" />Tocantins 
                <br/><br/>

                <input type="checkbox" name="acesso_advogados"  id="acesso_advogados" >Selecionar todos Estados 
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

</section> 