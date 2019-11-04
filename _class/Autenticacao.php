<?php
    abstract class Autenticacao {
        protected $senha;
        protected $dadoDoFormulario;

        public function criptografarSenha($senha) {
            return sha1(md5($senha));
        }
    }
?>