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
                <th>Nome</th>
                <th>Comarcas</th>
                <th>N. OAB</th>
                <th>E-mail</th>
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
                    <?=$row['nome']?>
                </td> 
                <td>
                    <?=$row['estado']?>
                </td>
                <td>
					<?=$row['numero_oab']?>
                </td>
                <td>
					<?=$row['email']?>
                </td>
                <td>
                    <a href="<?php echo site_url("admin/advogado/edit/".$row['codigo']); ?>" class="btn btn-warning btn-xs mr5" >
                    <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?php echo site_url("admin/advogado/delete/".$row['codigo']); ?>" onclick="return confirm('Deseja deletar o registro?')" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
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