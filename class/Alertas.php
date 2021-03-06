<?php
    require_once('Autenticacao.php');

    class Alertas extends Autenticacao {
        private $mensagemDeAlerta;

        public function informationMessage ($mensagemDeAlerta) {
            return "<div class='information-box'> $mensagemDeAlerta </div>";
        }

        public function successMessage($mensagemDeAlerta) {
            return "<div class='success-box'> $mensagemDeAlerta </div>";
        }

        public function alertMessage($mensagemDeAlerta) {
            return "<div class='alert-box'> $mensagemDeAlerta </div>";
        }

        public function errorMessage($mensagemDeAlerta) {
            return "<div class='error-box'> $mensagemDeAlerta </div>";
        }

        public function errorMessageAdPage($mensagemDeAlerta) {
            return "<div class='error-box-ad-page'> $mensagemDeAlerta </div>";
        }

        public function successMessageAdPage($mensagemDeAlerta) {
            return "<div class='success-box-ad-page'> $mensagemDeAlerta </div>";
        }

        public function errorMessageContactPage($mensagemDeAlerta) {
            return "<div class='error-box-contact-page'> $mensagemDeAlerta </div>";
        }

        public function successMessageContactPage($mensagemDeAlerta) {
            return "<div class='success-box-contact-page'> $mensagemDeAlerta </div>";
        }
    }
?>