<?php
    class Login extends Autenticacao {
        public function higienizarDados($dadoDoFormulario) {
            if (isset($dadoDoFormulario)) {
                return trim(strip_tags(htmlspecialchars($dadoDoFormulario)));
            } else {
                return "";
            }
        }
    }
?>