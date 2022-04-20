<?php 
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'administradores';
?>

<div class="col-md-12 my-3">
    <a href="#" onclick="inserir()" type="button" class="btn btn-dark btn-sm">Novo Usuário</a>
</div>

<!-- DataTable -->
<div class="tabela bg-light">
    <?php             
    $query = $pdo->query("SELECT * FROM administradores order by id desc");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = count($res);
    if($total_reg > 0){
    ?>

    <table id="example" class="table table-striped my-4" style="width:100%">
        <thead>            
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
				for($i=0; $i < $total_reg; $i++){
					foreach ($res[$i] as $key => $value){} 

				    $nome = $res[$i]['nome'];					
					$email = $res[$i]['email'];
					$telefone = $res[$i]['telefone'];
					$rua = $res[$i]['rua'];
					$numero = $res[$i]['numero'];
					$estado = $res[$i]['estado'];
					$id = $res[$i]['id'];
            ?>
            <tr>
                <td><?php echo $nome ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $telefone ?></td>
                <td><?php echo $rua ?></td>
                <td><?php echo $numero ?></td>
                <td><?php echo $estado ?></td>
                <td>
                    <a href="#" onclick="editar('<?php echo $id ?>', '<?php echo $nome ?>', '<?php echo $email ?>', '<?php echo $telefone ?>', '<?php echo $rua ?>', '<?php echo $numero ?>', '<?php echo $estado ?>')"
                        title="Editar Registro"> <i class="bi bi-pencil-square text-primary"></i> </a>
                    <a href="#" onclick="excluir('<?php echo $id ?>' , '<?php echo $nome ?>')" title="Excluir Registro">
                        <i class="bi bi-trash text-danger"></i> </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php }else{
		echo 'Não Existem Dados Cadastrados';
	} ?>
</div>
<!-- Modal 1 -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Editar Dados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                    placeholder="Insira o nome" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone"
                                    placeholder="Insira o telefone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Insira o e-mail" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Rua</label>
                                <input type="text" class="form-control" id="rua" name="rua" placeholder="Insira a rua"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero"
                                    placeholder="Insira o número" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado"
                                    placeholder="Insira o Estado" required>
                            </div>
                        </div>

                        <input type="text" name="id" id="id">

                    </div>
                </div>
                <small>
                    <div align="center" id="mensagem"></div>
                </small>
                <div class="modal-footer">
                    <button id="btn-fechar" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Excluir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-excluir" method="post">
				<div class="modal-body">

					Deseja Realmente excluir este Registro: <span id="nome-excluido"></span>?

					<small><div id="mensagem-excluir" align="center"></div></small>

					<input type="hidden" class="form-control" name="id-excluir"  id="id-excluir">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
					<button type="submit" class="btn btn-danger">Excluir</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">var pag = "<?=$pagina?>"</script>
<script src="../js/ajax.js"></script>

<script type="text/javascript">
	function editar(id, nome, email, telefone, rua, numero, estado){
	$('#id').val(id);
	$('#nome').val(nome);
	$('#email').val(email);	
	$('#telefone').val(telefone);
	$('#rua').val(rua);
	$('#numero').val(numero);
	$('#estado').val(estado);

	$('#tituloModal').text('Editar Registro');
	var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {		});
	myModal.show();
	$('#mensagem').text('');
}
</script>