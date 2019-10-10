CREATE DATABASE miaucaoce_se_puder;

USE miaucaoce_se_puder;

CREATE TABLE usuario
(
cod_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario_nickname VARCHAR(50) NOT NULL,
usuario_senha VARCHAR(20) NOT NULL,
usuario_nome_completo VARCHAR(100) NOT NULL,
usuario_email VARCHAR(100) NOT NULL,
usuario_foto_perfil LONGBLOB
);

CREATE TABLE anuncio
(
cod_anuncio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
anuncio_desc VARCHAR(300),
anuncio_nome_completo VARCHAR(50) NOT NULL,
anuncio_numero_telefone VARCHAR(20) NOT NULL,
anuncio_email_contato VARCHAR(50),
anuncio_estado_local_animal VARCHAR(80) NOT NULL,
anuncio_cidade_local_animal VARCHAR(80) NOT NULL,

anuncio_cod_usuario INT NOT NULL,
FOREIGN KEY (anuncio_cod_usuario) REFERENCES usuario(cod_usuario)
);

CREATE TABLE animal
(
cod_animal INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
animal_nome VARCHAR(50),
animal_raca VARCHAR(40),
animal_sexo VARCHAR(10),
animal_porte VARCHAR(14),
animal_idade INT,
animal_pelagem VARCHAR(10),
animal_foto_1 longblob,
animal_foto_2 longblob,
animal_desc VARCHAR(300),

animal_cod_usuario INT NOT NULL,
FOREIGN KEY (animal_cod_usuario) REFERENCES usuario(cod_usuario),
animal_cod_anuncio INT NOT NULL,
FOREIGN KEY (animal_cod_anuncio) REFERENCES anuncio(cod_anuncio)
);

create table contato
(
cod_contato INT NOT NULL auto_increment PRIMARY KEY,
contato_nome_completo VARCHAR(100),
contato_telefone VARCHAR(20),
contato_email VARCHAR(50),
contato_assunto VARCHAR(80),
contato_texto_mensagem VARCHAR(300),
contato_cod_usuario INT NOT NULL,
FOREIGN KEY (contato_cod_usuario) REFERENCES usuario(cod_usuario)
);