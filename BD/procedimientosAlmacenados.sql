
/************************************************ Agregar accidentes ********************************************************/
DROP PROCEDURE IF EXISTS agregarAccidente;

DELIMITER $$
CREATE PROCEDURE agregarAccidente(in _nombreE varchar(200), in _descripcion VARCHAR(400), 
in _turno ENUM('Matutino', 'Vespertino', 'Nocturno'), in _area varchar(100), 
in _supervisor INT, out res int)
BEGIN
START TRANSACTION;
	INSERT INTO `diassa` (`fecha`, `record`) VALUES	(now(), (select * from diassina));
    INSERT INTO `accidentes`(`nombreEmpleado`, `descripcion`,`turno`, `fechaA` , `fechaR`, `fecha`, `area_nombre` , `supervisor_clave`) 
    VALUES (_nombreE, _descripcion, _turno, now(), now(),  now(), _area, _supervisor);    
    set res = row_count();    
COMMIT;
END $$ 
DELIMITER ;
CREATE VIEW diassina AS
SELECT DATEDIFF (date_format(now(), '%Y-%m-%d'), date_format((SELECT MAX(fechaR) FROM accidentes), '%Y-%m-%d'));



/********************************************* Actualizar accidente ********************************************************/
DROP PROCEDURE IF EXISTS actualizarAccidente;
DELIMITER $$
CREATE PROCEDURE actualizarAccidente(in _nombreE varchar(200), in _descripcion VARCHAR(400), _fecha datetime, out res int)
BEGIN
START TRANSACTION;
	UPDATE `accidentes` SET `nombreEmpleado` = _nombreE, `descripcion` =  _descripcion,  `fechaA` = now() 
    WHERE `accidentes`.`fechaR` = _fecha;
    set res = row_count();
    COMMIT;
END $$ 
DELIMITER ;



/*************************************************** Agregar area *************************************************/
DROP PROCEDURE if EXISTS agregarArea;

DELIMITER $$
CREATE PROCEDURE agregarArea(_nombre varchar(100), in _estatus ENUM('Activo','Inactivo'), out res int)
BEGIN 
START TRANSACTION;
	INSERT INTO `area`(`nombre`,`estatus`, `fechaR`, `fechaA`) VALUES (_nombre, _estatus, now(), now());
	set res = row_count();
COMMIT;
END $$ 
DELIMITER ;



/********************************************** Actualizar area **********************************************************/
DROP PROCEDURE if EXISTS actualizarArea;

DELIMITER $$
CREATE PROCEDURE actualizarArea(in _nombre varchar(100), in _estatus ENUM('Activo','Inactivo'), out res int)
BEGIN 
START TRANSACTION;
	UPDATE `area` set  `estatus` = _estatus , `fechaA` = now() WHERE `area`.`nombre` = _nombre;
	set res = row_count();
COMMIT;
END $$ 
DELIMITER ;



/******************************************** Agregar Objetivos Energerticos Meta ****************************************/
DROP PROCEDURE if EXISTS agregarOE;

DELIMITER $$
CREATE PROCEDURE agregarOE(in _fecha varchar (20), in _metaCE double, _metaD double, _metaCG double , out res int)
BEGIN 
START TRANSACTION;
	INSERT INTO `consumoenergia`(`fecha`, `meta`) VALUES ( _fecha, _metaCE);
    INSERT INTO `desperdicioesmaltes`(`fecha`, `meta`) VALUES ( _fecha, _metaD);
    INSERT INTO `consumogn`(`fecha`, `meta`) VALUES ( _fecha, _metaCG);
	set res = row_count();
COMMIT;
END $$ 
DELIMITER ;



/************************************* Agregar Objetivos Energerticos Finales ***********************************************/
DROP PROCEDURE if EXISTS agregarOEF;

DELIMITER $$
CREATE PROCEDURE agregarOEF(in _fecha varchar (20), in _metaCEF double, _metaDF double, _metaCGF double , out res int)
BEGIN 
START TRANSACTION;
	UPDATE `consumoenergia` SET `final` = _metaCEF WHERE `fecha` = _fecha;
    UPDATE `desperdicioesmaltes` SET `final` = _metaDF WHERE `fecha` = _fecha;
    UPDATE `consumogn` SET `final` = _metaCGF WHERE `fecha` = _fecha;	
	set res = row_count();
COMMIT;
END $$ 
DELIMITER ;



/******************************************** Agregar Objetivos de Producción Meta ****************************************/
DROP PROCEDURE if EXISTS agregarOP;

DELIMITER $$
CREATE PROCEDURE agregarOP(in _fecha varchar (20), in _metaVP double, _metaDP double, _calidad double, in _tiempoVH double, out res int)
BEGIN 
START TRANSACTION;
	INSERT INTO `produccion`(`fecha`, `meta`) VALUES ( _fecha, _metaVP);
    INSERT INTO `desperdicio`(`fecha`, `meta`) VALUES ( _fecha, _metaDP);
    INSERT INTO `calidadp`(`fecha`, `meta`) VALUES ( _fecha, _calidad);
    INSERT INTO `tiempovacioh`(`fecha`, `meta`) VALUES ( _fecha, _tiempoVH);
	set res = row_count();
COMMIT;
END $$ 
DELIMITER ;
call agregarOP('2020-11', 999, 99, 999, 99, @res);



/************************************* Agregar Objetivos Energerticos Finales ***********************************************/
DROP PROCEDURE if EXISTS agregarOPF;

DELIMITER $$
CREATE PROCEDURE agregarOPF(in _fecha varchar (20), in _metaVPF double, _metaDPF double, _calidadF double, in _tiempoVHF double, out res int)
BEGIN 
START TRANSACTION;
	UPDATE `produccion` SET `final` = _metaVPF WHERE `fecha` = _fecha;
    UPDATE `desperdicio` SET `final` = _metaDPF WHERE `fecha` = _fecha;
    UPDATE `calidadp` SET `final` = _calidadF WHERE `fecha` = _fecha;
	UPDATE `tiempovacioh` SET `final` = _tiempoVHF WHERE `fecha` = _fecha;
	set res = row_count();
COMMIT;
END $$ 
DELIMITER ;



/******************************************************** Tableros ***********************************************************/
DROP PROCEDURE IF EXISTS tableros;

DELIMITER $$
CREATE PROCEDURE tableros(in _tiempo int, in _estatus ENUM('Activo', 'Inactivo'), out res int)
BEGIN
START TRANSACTION;
UPDATE `tablero` SET `tiempo` = _tiempo, `estatus` = _estatus;
set res = row_count();
    COMMIT;
END $$ 
DELIMITER ;



/***************************************************** Agregar Supervisor *************************************************/
DROP PROCEDURE IF EXISTS agregarSupervisor;

DELIMITER $$
CREATE PROCEDURE agregarSupervisor(in _clave int, in _nombre varchar(100), in _turno enum('Matutino', 'Vespertino', 'Nocturno'), 
in _estatus enum('Activo', 'Inactivo'), in _correo VARCHAR (50), in _contrasena varchar (45), in _area varchar(100), out res int)
BEGIN
START TRANSACTION;
INSERT INTO `login` (`correo`,`contrasena`,`tipoUsuario`,`estatus`) VALUES (_correo, _contrasena, 
'Supervisor', _estatus);
INSERT INTO `supervisor`(`clave`,`nombre`,`turno`,`estatus`,`login_correo`, `area_nombre`) 
VALUES (_clave,_nombre, _turno, _estatus, _correo, _area);
set res = row_count();
    COMMIT;
END $$ 
DELIMITER ;



/************************************************** Actualizar Supervisor ********************************/
DROP PROCEDURE IF EXISTS actualizarSupervisor;

DELIMITER $$
CREATE PROCEDURE actualizarSupervisor(in _correo varchar(50), in _clave int, out res int)
BEGIN
START TRANSACTION;
update `login` SET `contrasena` = _contrasena WHERE `correo` = _correo;
set res = row_count();
    COMMIT;
END $$ 
DELIMITER ;



/****************************************************** Consultar Formulario *************************************************/
DROP PROCEDURE IF EXISTS consultaForm;

DELIMITER $$
CREATE PROCEDURE consultaForm(in _email varchar(20), in _clave varchar(12), out res int)
BEGIN
START TRANSACTION;
SELECT * FROM `login`WHERE correo = _email and contrasena = _clave and estatus = 'Activo';
set res = ROW_COUNT();
COMMIT;
END $$
DELIMITER ; 



/************************************************ Agregar administrador ************************************************/
DROP PROCEDURE IF EXISTS agregarAdministrador;

DELIMITER $$
CREATE PROCEDURE agregarAdministrador(in _nombre varchar(45), in _correo VARCHAR (50), in _contrasena varchar (45), out res int)
BEGIN
START TRANSACTION;
	INSERT INTO `login` (`correo`, `contrasena`, `tipoUsuario`, `estatus`) VALUES (_correo, _contrasena, 
    'Administrador', 'Activo');
    INSERT INTO `administrador`(`nombre`, `login_correo`) VALUES (_nombre, _correo);
	set res = row_count();
COMMIT;
END $$ 
DELIMITER ;




/****************************************************** Actualizar Administrador **************************************/
DROP PROCEDURE IF EXISTS actualizarAdministrador;

DELIMITER $$
CREATE PROCEDURE actualizarAdministrador(in _correo VARCHAR (50), in _contrasena varchar (45),  out res int)
BEGIN
START TRANSACTION;
	UPDATE `login` set `contrasena` = _contrasena WHERE `correo` = _correo;
	set res = row_count();
COMMIT;
END $$ 
DELIMITER ;

call actualizarAdministrador ('rene@gmail.com', '123456789', @res);



/************************************************** Agregar calidad ******************************************************/
DROP PROCEDURE IF EXISTS agregarCalidad;

DELIMITER $$
CREATE PROCEDURE agregarCalidad(in _primera double, in _segunda double, in _id INT, out res int)
BEGIN
START TRANSACTION;
INSERT INTO `calidad`(`fecha`,`primera`,`segunda`,`supervisor_idsupervisor`) VALUES (date_format(now(), '%Y-%m-%d'),
 _primera, _segunda, _id);
set res = row_count();
    COMMIT;
END $$ 
DELIMITER ;



/*********************************************************** Actualizar calidad ***********************************************/
DROP PROCEDURE IF EXISTS actualizarCalidad;

DELIMITER $$
CREATE PROCEDURE actualizarCalidad( in _primera double, in _segunda double, in _id INT, out res int)
BEGIN
START TRANSACTION;
	UPDATE `calidad` SET `primera` = _primera, `segunda` = _segunda WHERE supervisor_idsupervisor = _id 
    and `fecha` = date_format(now(), '%Y-%m-%d');	
	set res = row_count();
    COMMIT;
END $$ 
DELIMITER ;

INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','inicioA');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','nuevoAccidente');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','consultarAccidente');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','editarAccidente');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','nuevaArea');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','consultarArea');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','editarArea');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','nuevoObjetivoE');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','consultaObjetivosE');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','nuevoObjetivoP');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','consultaObjetivoP');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','calidadM');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','consumoE');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','consumoGN');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','desperdicioE');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','desperdicioM');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','hornoV');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','volumenP');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','volumenPF');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','tablero');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','nuevoU');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','consultaU');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','verU');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Administrador','perfilA');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Supervisor','inicioS');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Supervisor','nuevoAccidenteSP');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Supervisor','nuevoAccidenteS');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Supervisor','agregarVolumen');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Supervisor','consultarV');
INSERT INTO `acceso` (`tipoUSuario`,`interfaz`) VALUES ('Supervisor','perfilS');


