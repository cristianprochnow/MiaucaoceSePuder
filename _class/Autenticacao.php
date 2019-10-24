<?php
    abstract class Autenticacao {
        protected $senha;
        protected $mensagemDeAlerta;
        protected $dadoDoFormulário;

        public function criptografarSenha($senha) {
            return sha1(md5($senha));
        }

        public function alertaUsuario($mensagemDeAlerta) {
            return "<div class='alert-box'> $mensagemDeAlerta </div>";
        }
    }
?>