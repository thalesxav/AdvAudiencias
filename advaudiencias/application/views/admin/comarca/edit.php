
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">
  
  <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; Editar Comarca</h4>
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
           
            <?php echo form_open(base_url('admin/comarca/edit/'.$comarca['codigo']), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="codigo" class="col-sm-2 control-label">Código</label>

                <div class="col-sm-9">
                  <input readonly value="<?= $comarca['codigo'] ?>" type="text" name="codigo" class="form-control" id="codigo" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="estado" class="col-sm-2 control-label">Estado</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="estado" name="estado">
                        <option <?= $comarca['estado'] == 'AC' ? 'selected' : '' ?> value="AC">Acre</option>
                        <option <?= $comarca['estado'] == 'AL' ? 'selected' : '' ?> value="AL">Alagoas</option>
                        <option <?= $comarca['estado'] == 'AP' ? 'selected' : '' ?> value="AP">Amapá</option>
                        <option <?= $comarca['estado'] == 'AM' ? 'selected' : '' ?> value="AM">Amazonas</option>
                        <option <?= $comarca['estado'] == 'BA' ? 'selected' : '' ?> value="BA">Bahia</option>
                        <option <?= $comarca['estado'] == 'CE' ? 'selected' : '' ?> value="CE">Ceará</option>
                        <option <?= $comarca['estado'] == 'DF' ? 'selected' : '' ?> value="DF">Distrito Federal</option>
                        <option <?= $comarca['estado'] == 'ES' ? 'selected' : '' ?> value="ES">Espírito Santo</option>
                        <option <?= $comarca['estado'] == 'GO' ? 'selected' : '' ?> value="GO">Goiás</option>
                        <option <?= $comarca['estado'] == 'MA' ? 'selected' : '' ?> value="MA">Maranhão</option>
                        <option <?= $comarca['estado'] == 'MT' ? 'selected' : '' ?> value="MT">Mato Grosso</option>
                        <option <?= $comarca['estado'] == 'MS' ? 'selected' : '' ?> value="MS">Mato Grosso do Sul</option>
                        <option <?= $comarca['estado'] == 'MG' ? 'selected' : '' ?> value="MG">Minas Gerais</option>
                        <option <?= $comarca['estado'] == 'PA' ? 'selected' : '' ?> value="PA">Pará</option>
                        <option <?= $comarca['estado'] == 'PB' ? 'selected' : '' ?> value="PB">Paraíba</option>
                        <option <?= $comarca['estado'] == 'PR' ? 'selected' : '' ?> value="PR">Paraná</option>
                        <option <?= $comarca['estado'] == 'PE' ? 'selected' : '' ?> value="PE">Pernambuco</option>
                        <option <?= $comarca['estado'] == 'PI' ? 'selected' : '' ?> value="PI">Piauí</option>
                        <option <?= $comarca['estado'] == 'RJ' ? 'selected' : '' ?> value="RJ">Rio de Janeiro</option>
                        <option <?= $comarca['estado'] == 'RN' ? 'selected' : '' ?> value="RN">Rio Grande do Norte</option>
                        <option <?= $comarca['estado'] == 'RS' ? 'selected' : '' ?> value="RS">Rio Grande do Sul</option>
                        <option <?= $comarca['estado'] == 'RO' ? 'selected' : '' ?> value="RO">Rondônia</option>
                        <option <?= $comarca['estado'] == 'RR' ? 'selected' : '' ?> value="RR">Roraima</option>
                        <option <?= $comarca['estado'] == 'SC' ? 'selected' : '' ?> value="SC">Santa Catarina</option>
                        <option <?= $comarca['estado'] == 'SP' ? 'selected' : '' ?> value="SP">São Paulo</option>
                        <option <?= $comarca['estado'] == 'SE' ? 'selected' : '' ?> value="SE">Sergipe</option>
                        <option <?= $comarca['estado'] == 'TO' ? 'selected' : '' ?> value="TO">Tocantins</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="comarca" class="col-sm-2 control-label">Comarca</label>

                    <div class="col-sm-9">
                    <input type="text" value="<?= $comarca['comarca'] ?>" name="comarca" class="form-control" id="comarca" placeholder="">
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
