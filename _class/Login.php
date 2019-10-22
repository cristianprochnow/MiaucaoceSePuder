<?php
    class Login extends Autenticacao {
        public function higienizarDados($dadosDoFormulário) {
            if (isset($dadosDoFormulário)) {
                return trim(strip_tags(htmlspecialchars($dadosDoFormulário)));
            } else {
                return "";
            }
        }
    }
?>