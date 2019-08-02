
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">
  
  <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; Nova Comarca</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/comarca'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Voltar</a>
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
           
            <?php echo form_open(base_url('admin/comarca/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="codigo" class="col-sm-2 control-label">Código</label>

                <div class="col-sm-9">
                  <input readonly value="<?= $codigo ?>" type="text" name="codigo" class="form-control" id="codigo" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="estado" class="col-sm-2 control-label">Estado</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="estado" name="estado">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="comarca" class="col-sm-2 control-label">Comarca</label>

                    <div class="col-sm-9">
                    <input type="text" name="comarca" class="form-control" id="comarca" placeholder="">
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
