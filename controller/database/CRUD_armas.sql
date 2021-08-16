CREATE DATABASE CRUD_armas;
USE CRUD_armas;
DROP DATABASE CRUD_armas;
CREATE TABLE usuario (
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    ap_paterno VARCHAR(30),
    ap_materno VARCHAR(30),
    pass VARCHAR(50),
    correo VARCHAR(50),
    rut VARCHAR(50),
    rol VARCHAR(20)
);-- SELECT * FROM usuario;
UPDATE usuario SET rol='normal' WHERE id=1;
INSERT INTO usuario VALUES(NULL,'Claudio','Castro','Munoz','123','claudio_jr@live.cl','19881668-k','NORMAL');
INSERT INTO usuario VALUES(NULL,'Diego','Jorquera','Martinez','123','diegojorquera@live.cl','123456-7','ADMIN');


CREATE TABLE estado(
	id INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR (25)
);
INSERT INTO estado VALUES (NULL,'Nuevo');
INSERT INTO estado VALUES (NULL,'Usado');
INSERT INTO estado VALUES (NULL,'Deteriorado');
INSERT INTO estado VALUES (NULL,'Desarmado');

CREATE TABLE fabricante(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre_fabricante VARCHAR(30),
    pais VARCHAR(30)
); -- SELECT * FROM fabricante

INSERT INTO fabricante VALUES(NULL,'Remington Arms','EE.UU');
INSERT INTO fabricante VALUES(NULL,'FAMAE','Chile');
INSERT INTO fabricante VALUES(NULL,'Corporación Kalashnikov','Rusia');

CREATE TABLE accesorio(
	id INT PRIMARY KEY AUTO_INCREMENT,
    descripcion_accesorio VARCHAR(10)
); -- SELECT * FROM accesorio
INSERT accesorio VALUES(NULL,'SI');
INSERT accesorio VALUES(NULL,'NO');

CREATE TABLE arma(
	id_arma INT PRIMARY KEY AUTO_INCREMENT,
    nombre_arma VARCHAR(50),
    anio INT,
    stock INT,
    id_fk_accesorio INT,
    id_fk_estado INT,
    id_fk_fabricante INT,
    id_fk_usuario INT,
	FOREIGN KEY (id_fk_accesorio) REFERENCES accesorio(id),
    FOREIGN KEY (id_fk_estado) REFERENCES estado(id),
    FOREIGN KEY (id_fk_fabricante) REFERENCES fabricante(id),
    FOREIGN KEY (id_fk_usuario) REFERENCES usuario(id) ON DELETE CASCADE
); -- SELECT * FROM arma
INSERT INTO arma VALUES(NULL,'Remington Model 51','1917',10,1,1,1,2);
INSERT INTO arma VALUES(NULL,'Remington M2010 ESR','2011',2,2,1,1,2);
INSERT INTO arma VALUES(NULL,'Fusil SG 542-1','1970','55',2,3,2,2);
INSERT INTO arma VALUES(NULL,'AK-12','2011',22,1,2,3,1);
INSERT INTO arma VALUES(NULL,'AK-105','2001',45,2,4,3,1);

select count( id_fk_fabricante) AS 'Remington Arms' FROM arma WHERE  id_fk_fabricante=1 ;
select count( id_fk_fabricante) AS 'FAMAE' FROM arma WHERE  id_fk_fabricante=2 ;
select count( id_fk_fabricante) AS 'Corporación Kalashnikov' FROM arma WHERE  id_fk_fabricante=3 ;


SELECT
    COUNT(CASE WHEN id_fk_fabricante LIKE 1 THEN 1 END) AS count1,
    COUNT(CASE WHEN id_fk_fabricante LIKE 2 THEN 1 END) AS count2,
    COUNT(CASE WHEN id_fk_fabricante LIKE 3 THEN 1 END) AS count3
FROM arma; 


/*CONSULTAS*/
/*SELECCIONAR TODO*/
SELECT arma.id_arma,arma.nombre_arma,arma.anio,arma.stock,fabricante.nombre_fabricante,fabricante.pais,estado.descripcion,accesorio.descripcion_accesorio,usuario.nombre,usuario.id
                    FROM arma
                    INNER JOIN fabricante ON arma.id_fk_fabricante=fabricante.id
                    INNER JOIN estado ON arma.id_fk_estado=estado.id
                    INNER JOIN accesorio ON arma.id_fk_accesorio=accesorio.id
                    INNER JOIN usuario ON arma.id_fk_usuario=usuario.id
                    WHERE usuario.id=1 ORDER BY arma.id_arma DESC LIMIT 5;
                    
SELECT * FROM usuario WHERE id !=2  LIMIT 5;