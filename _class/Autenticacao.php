<?php
    abstract class Autenticacao {
        protected $senha;
        protected $dadoDoFormulário;

        public function criptografarSenha($senha) {
            return sha1(md5($senha));
        }
    }
?>