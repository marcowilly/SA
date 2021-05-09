<?php

    class AlunoController extends Controller {

        /**
         * Lista os alunos
         */
        public function listar(){
            $aluno = Aluno::all();
            return $this->view('table', ['aluno' => $aluno]);
        }

        /**
         * Mostrar formulario para criar um novo aluno
         */
        public function criar(){
            return $this->view('form');
        }

        /**
         * Mostrar formulário para editar um aluno
         */
        public function editar($dados){
            $id = (int) $dados['id'];
            $aluno = Aluno::find($id);
            $endereco = Endereco::find($aluno->idEndereco);
            return $this->view('form', ['aluno' => $aluno, 'endereco' => $endereco]);
        }

        /**
         * Salvar o aluno submetido pelo formulário
         */
        public function salvar(){
            $endereco = new Endereco();
            $endereco->estado = $this->request->estado;
            $endereco->cidade = $this->request->cidade;
            $endereco->bairro = $this->request->bairro;
            $endereco->logradouro = $this->request->logradouro;
            $endereco->endereco = $this->request->endereco;
            $endereco->numero = $this->request->numero;
            $endereco->complemento = $this->request->complemento;

            $aluno = new Aluno;
            $aluno->nome = $this->request->nome;
            $aluno->cpf = $this->request->cpf;
            $aluno->email = $this->request->email;
            $aluno->idEndereco = $endereco->save(null);
            if ($aluno->save()) {
                return $this->listar();
            }
        }

        /**
         * Atualizar o aluno conforme dados submetidos
         */
        public function atualizar($dados){  
            $id = (int) $dados['id'];
            $aluno = Aluno::find($id);
            $aluno->nome = $this->request->nome;
            $aluno->cpf = $this->request->cpf;
            $aluno->email = $this->request->email;
            $aluno->save();

            $endereco = new Endereco();
            $endereco->estado = $this->request->estado;
            $endereco->cidade = $this->request->cidade;
            $endereco->bairro = $this->request->bairro;
            $endereco->logradouro = $this->request->logradouro;
            $endereco->endereco = $this->request->endereco;
            $endereco->numero = $this->request->numero;
            $endereco->complemento = $this->request->complemento;
            $endereco->save($aluno->idEndereco);

            return $this->listar($aluno->idEndereco);
        }

        /**
         * Apagar um aluno conforme o id informado
         */
        public function excluir($dados){
            $id = (int) $dados['id'];
            $aluno = Aluno::destroy($id);
            return $this->listar();
        }
    }
?>