<script>
    function limitKeypress(event, value, maxLength) {
        if (value != undefined && value.toString().length >= maxLength) {
            event.preventDefault();
        }
    }
</script>
<div class="container">
    <form action="?controller=AlunoController&<?php echo isset($aluno->id) ? "method=atualizar&id={$aluno->id}" : "method=salvar"; ?>" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Aluno</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label for="nome" class="col-sm-2 col-form-label text-right">*Nome:</label>
                <input required="true" type="text" class="form-control col-sm-8" name="nome" id="nome" value="<?php
                echo isset($aluno->nome) ? $aluno->nome : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label for="cpf" class="col-sm-2 col-form-label text-right">*CPF:</label>
                <input required="true" onkeypress="limitKeypress(event,this.value,11)" type="number" class="form-control col-sm-8" name="cpf" id="cpf" value="<?php
                echo isset($aluno->cpf) ? $aluno->cpf : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label for="cpf" class="col-sm-2 col-form-label text-right">*Email:</label>
                <input required="true" type="email" class="form-control col-sm-8" name="email" id="email" value="<?php
                echo isset($aluno->email) ? $aluno->email : null;
                ?>" />
            </div>
            <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Endereço</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label for="estado" class="col-sm-2 col-form-label text-right">*Estado:</label>
                <input required="true" type="text" class="form-control col-sm-8" name="estado" id="estado" value="<?php
                echo isset($endereco->estado) ? $endereco->estado : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label for="cidade" class="col-sm-2 col-form-label text-right">*Cidade:</label>
                <input required="true" type="text" class="form-control col-sm-8" name="cidade" id="cidade" value="<?php
                echo isset($endereco->cidade) ? $endereco->cidade : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label for="bairro" class="col-sm-2 col-form-label text-right">*Bairro:</label>
                <input required="true" type="text" class="form-control col-sm-8" name="bairro" id="bairro" value="<?php
                echo isset($endereco->bairro) ? $endereco->bairro : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label for="logradouro" class="col-sm-2 col-form-label text-right">*Logradouro:</label>
                <input required="true" type="text" class="form-control col-sm-8" name="logradouro" id="logradouro" value="<?php
                echo isset($endereco->logradouro) ? $endereco->logradouro : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label for="endereco" class="col-sm-2 col-form-label text-right">*Endereço:</label>
                <input required="true" type="text" class="form-control col-sm-8" name="endereco" id="endereco" value="<?php
                echo isset($endereco->endereco) ? $endereco->endereco : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label for="numero" class="col-sm-2 col-form-label text-right">*Número:</label>
                <input required="true" type="number" maxlenght="7" class="form-control col-sm-8" name="numero" id="numero" value="<?php
                echo isset($endereco->numero) ? $endereco->numero : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label for="complemento" class="col-sm-2 col-form-label text-right">Complemento:</label>
                <input type="text" class="form-control col-sm-8" name="complemento" id="complemento" value="<?php
                echo isset($endereco->complemento) ? $endereco->complemento : null;
                ?>" />
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($aluno->id) ? $aluno->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <a class="btn btn-danger" href="javascript:history.go(-1)">Cancelar</a>
            </div>
        </div>
    </form>
</div>
