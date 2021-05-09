<?php

    /**
     * Classe Endereco - baseado no modelo Active Record (Simplificado) 
     * @author Marco Willy Azevedo Gomes
     */
    class Endereco{
        private $atributos;

        public function __construct(){}

        public function __set(string $atributo, $valor){
            $this->atributos[$atributo] = $valor;
            return $this;
        }

        public function __get(string $atributo){
            return $this->atributos[$atributo];
        }

        public function __isset($atributo){
            return isset($this->atributos[$atributo]);
        }

        /**
         * Salvar o endereco
         * @return boolean
         */
        public function save($idEndereco){
            $colunas = $this->preparar($this->atributos);
            if (!isset($idEndereco)) {
                $query = "INSERT INTO endereco (".
                    implode(', ', array_keys($colunas)).
                    ") VALUES (".
                    implode(', ', array_values($colunas)).");";
            } else {
                foreach ($colunas as $key => $value) {
                    if ($key !== 'id') {
                        $definir[] = "{$key}={$value}";
                    }
                }
                $query = "UPDATE endereco SET ".implode(', ', $definir)." WHERE id='{$idEndereco}';";
            }
            if ($conexao = Conexao::getInstance()) {
                $stmt = $conexao->prepare($query);
                if ($stmt->execute()) {
                    return $conexao->lastInsertId();
                }
            }
            return false;
        }

        /**
         * Tornar valores aceitos para sintaxe SQL
         * @param type $dados
         * @return string
         */
        private function escapar($dados){
            if (is_string($dados) & !empty($dados)) {
                return "'".addslashes($dados)."'";
            } elseif (is_bool($dados)) {
                return $dados ? 'TRUE' : 'FALSE';
            } elseif ($dados !== '') {
                return $dados;
            } else {
                return 'NULL';
            }
        }

        /**
         * Verifica se dados são próprios para ser salvos
         * @param array $dados
         * @return array
         */
        private function preparar($dados){
            $resultado = array();
            foreach ($dados as $k => $v) {
                if (is_scalar($v)) {
                    $resultado[$k] = $this->escapar($v);
                }
            }
            return $resultado;
        }

        /**
         * Encontra um recurso pelo id
         * @param type $id
         * @return type
         */
        public static function find($idEndereco){
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM endereco WHERE id='{$idEndereco}';");
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $resultado = $stmt->fetchObject('Endereco');
                    if ($resultado) {
                        return $resultado;
                    }
                }
            }
            return false;
        }
    }

?>