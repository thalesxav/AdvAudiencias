<?php
 //var_dump($info);
 ?>

 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

<div class="datalist">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50">Código</th>
                <th>Data</th>
                <th>Comarca</th>
                <th>Advogado</th>
                <th>Tipo Audiência</th>
                <th>Status</th>
                <th width="120">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php 

            $contador = 0;
            foreach($info as $row): 
                $contador ++;

            ?>
            <tr>
            	<td id="codigo_<?= $contador ?>">
					<?=$row['codigo']?>
                </td>
                <td>
                    <?php $data = date_create($row['data']); ?>
                    <?=date_format($data,"d/m/Y")?> <?=$row['hora']?>
                </td> 
                <td>
                    <?=$row['estado']?> - <?=$row['comarca']?>
                </td>
                <td>
					<?=$row['nome']?>
                </td>
                <td>
                    <?php
                        if($row['tipo_audiencia'] == '1')
                            echo "Justiça Comum";
                        else if($row['tipo_audiencia'] == '2')
                            echo "Advogado + Preposto";                            
                        else if($row['tipo_audiencia'] == '3')
                            echo "Presposto";                            
                        else if($row['tipo_audiencia'] == '4')
                            echo "Procon";                            
                        else if($row['tipo_audiencia'] == '5')
                            echo "Trabalhista";                            
                        else if($row['tipo_audiencia'] == '6')
                            echo "Outros";                                                                                                                                            
                    ?>
                </td>
                <td>
                    
                        <select onchange="AlteraStatus($('#codigo_<?=$contador?>').html().trim(), this.value)" name="status" class="form-control select2" id="status" data-placeholder="Selecione" style="width: 100%;">
                            <option <?= $row['status'] == '1' ? "selected" : "" ?> value="1">Audiência Cadastrada</option>
                            <option <?= $row['status'] == '2' ? "selected" : "" ?> value="2">Advogado Confirmado</option>
                            <option <?= $row['status'] == '3' ? "selected" : "" ?> value="3">Defesa Elaborada</option>
                            <option <?= $row['status'] == '4' ? "selected" : "" ?> value="4">Protocolado</option>
                            <option <?= $row['status'] == '5' ? "selected" : "" ?> value="5">Enviado Correspondente</option>
                            <option <?= $row['status'] == '6' ? "selected" : "" ?> value="6">Ata Recebida</option>
                            <option <?= $row['status'] == '7' ? "selected" : "" ?> value="7">Pago</option>
                            <option <?= $row['status'] == '8' ? "selected" : "" ?> value="8">Arquivado</option>
                        </select>
                    <?php
                        /*if($row['status'] == '1')
                            echo "Audiência Cadastrada";
                        else if($row['status'] == '2')
                            echo "Advogado Confirmado";                            
                        else if($row['status'] == '3')
                            echo "Defesa Elaborada";                            
                        else if($row['status'] == '4')
                            echo "Protocolado";                            
                        else if($row['status'] == '5')
                            echo "Enviado Correspondente";                            
                        else if($row['status'] == '6')
                            echo "Ata Recebida"; 
                        else if($row['status'] == '7')
                            echo "Pago"; 
                        else if($row['status'] == '8')
                            echo "Arquivado"; */                                                                                                                                                                                                           
                    ?>
                </td>
                <td>
                    <a href="<?php echo site_url("admin/audiencia/edit/".$row['codigo']); ?>" class="btn btn-warning btn-xs mr5" >
                    <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?php echo site_url("admin/audiencia/delete/".$row['codigo']); ?>" onclick="return confirm('Deseja deletar o registro?')" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>


<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });

  function AlteraStatus(id, status)
  {
      //console.log(id);
      //console.log(status);
      //console.log('{id:'+id+', status:'+status+', <?php echo $this->security->get_csrf_token_name(); ?>:<?php echo $this->security->get_csrf_hash(); ?>}');
      // Show full page LoadingOverlay
    $.LoadingOverlay("show");

    $.get(
        '<?=base_url('admin/audiencia/altera_status/')?>'+id+'/'+status,
        '{id:'+id+', status:'+status+', <?php echo $this->security->get_csrf_token_name(); ?>:<?php echo $this->security->get_csrf_hash(); ?>}',
        function(response){
            if(response == 1)
                $.LoadingOverlay("hide");
            else
                alert("Não foi possível alterar o status da audiência. Favor procurar o Administrador do sistema.");
        }
    );
  }
</script> 