<?php
    abstract class Autenticacao {
        protected $senha;
        protected $mensagemDeAlerta;
        protected $dadosDoFormulário;

        public function criptografarSenha($senha) {
            return sha1(md5($senha));
        }

        public function alertaUsuário($mensagemDeAlerta) {
            return "<div class='alert-box'> $mensagemDeAlerta </div>";
        }
    }
?>