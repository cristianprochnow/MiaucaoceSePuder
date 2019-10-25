<?php
    class Alertas extends Autenticacao {
        private $mensagemDeAlerta;

        // mensagem de erro
        public function alertaUsuario($mensagemDeAlerta) {
            return "<div class='alert-box'> $mensagemDeAlerta </div>";
        }
    }
?>