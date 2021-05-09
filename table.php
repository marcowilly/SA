<h1>Alunos</h1>
<hr>
<div class="container">
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cpf</th>
                <th>Email</th>
                <th><a href="?controller=AlunoController&method=criar" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($aluno) {
                foreach ($aluno as $a) {
                    ?>
                    <tr>
                        <td><?php echo $a->nome; ?></td>
                        <td><?php echo $a->cpf; ?></td>
                        <td><?php echo $a->email; ?></td>
                        <td>
                            <a href="?controller=AlunoController&method=editar&id=<?php echo $a->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=AlunoController&method=excluir&id=<?php echo $a->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>