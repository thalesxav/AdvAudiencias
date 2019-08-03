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
            <?php foreach($info as $row): ?>
            <tr>
            	<td>
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
                    <?php
                        if($row['status'] == '1')
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
                            echo "Arquivado";                                                                                                                                                                                                            
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
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script> 