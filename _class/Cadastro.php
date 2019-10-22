<?php
    class Cadastro extends Autenticacao {
        public function higienizarDados($dadosDoFormulário) {
            if (isset($dadosDoFormulário)) {
                return trim(strip_tags(htmlspecialchars($dadosDoFormulário)));
            } else {
                return "";
            }
        }

        public function contarCaracteresDaStringInserida($dadosDoFormulário) {
            return strlen(trim($dadosDoFormulário));
        }
    }
?>