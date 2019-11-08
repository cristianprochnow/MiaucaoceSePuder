<?php
    require_once('Autenticacao.php');

    class Cadastro extends Autenticacao {
        public function higienizarDados($dadoDoFormulario) {
            if (isset($dadoDoFormulario)) {
                return trim(strip_tags(htmlspecialchars($dadoDoFormulario)));
            } else {
                return "";
            }
        }

        public function contarCaracteresDaStringInserida($dadoDoFormulario) {
            return strlen(trim($dadoDoFormulario));
        }
    }
?>