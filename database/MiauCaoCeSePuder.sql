CREATE DATABASE miaucaoce_se_puder;

USE miaucaoce_se_puder;

CREATE TABLE usuario
(
cod_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario_nickname VARCHAR(80) NOT NULL,
usuario_senha VARCHAR(1000) NOT NULL,
usuario_nome_completo VARCHAR(200),
usuario_telefone VARCHAR(80),
usuario_estado VARCHAR(200),
usuario_cidade VARCHAR(200),
usuario_email VARCHAR(200),
usuario_tipo INT(1)
);

CREATE TABLE anuncio
(
cod_anuncio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
anuncio_desc VARCHAR(600),
anuncio_nome_completo VARCHAR(200),
anuncio_numero_telefone VARCHAR(80),
anuncio_email_contato VARCHAR(200),
anuncio_estado_local_animal VARCHAR(200),
anuncio_cidade_local_animal VARCHAR(200),

anuncio_cod_usuario INT NOT NULL,
FOREIGN KEY (anuncio_cod_usuario) REFERENCES usuario(cod_usuario)
);

CREATE TABLE animal
(
cod_animal INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
animal_nome VARCHAR(200),
animal_tipo VARCHAR(200),
animal_raca VARCHAR(100),
animal_sexo VARCHAR(100),
animal_porte VARCHAR(100),
animal_idade VARCHAR(100),
animal_pelagem VARCHAR(100),
animal_foto_1 longblob,
animal_foto_2 longblob,
animal_desc VARCHAR(600),


animal_cod_anuncio INT NOT NULL,
FOREIGN KEY (animal_cod_anuncio) REFERENCES anuncio(cod_anuncio),

animal_cod_usuario INT NOT NULL,
FOREIGN KEY (animal_cod_usuario) REFERENCES usuario(cod_usuario)
);

CREATE TABLE contato
(
cod_contato INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
contato_nome_completo VARCHAR(200),
contato_telefone VARCHAR(80),
contato_email VARCHAR(200),
contato_estado VARCHAR(200),
contato_cidade VARCHAR(200),
contato_assunto VARCHAR(300),
contato_texto_mensagem VARCHAR(600),

contato_cod_usuario INT NOT NULL,
FOREIGN KEY (contato_cod_usuario) REFERENCES usuario(cod_usuario)
);