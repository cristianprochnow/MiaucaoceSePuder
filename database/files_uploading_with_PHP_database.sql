CREATE DATABASE file_upload;

USE file_upload;

CREATE TABLE files (

	cod_file INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_file VARCHAR(200),
    file LONGBLOB,
    upload_date DATETIME

);