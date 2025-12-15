-- Seleccionamos la base de datos en la que queremos trabajar --
USE DBALPDWESLoginLogoff;


INSERT INTO T01_Usuario (T01_CodUsuario,T01_Password,T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_ImagenUsuario) VALUES
('alvaro',SHA2('alvaropaso', 256),'Alvaro Allen',null,null),
('heraclio',SHA2('heracliopaso', 256),'Heraclio Borbujo',null,null),
('gonzalo',SHA2('gonzalopaso', 256),'Gonzalo Junquera',null,null),
('vero',SHA2('veropaso', 256),'Veronique Grue',null,null),
('amor',SHA2('amorpaso', 256),'Amor Rodriguez',null,null),
('admin',SHA2('adminpaso', 256),'Administrador',null,null);

-- Insertamos en la tabla correspondiente cada uno de los valores por cada columna --
INSERT INTO T02_Departamento VALUES
('DWE',NOW(), NULL,'Departamento Web Extinta',50.4),
('DWA',NOW(), NULL,'Departamento Web Americano',48.3),
('IPE',NOW(), NULL,'Itinerario Profesional Empleabilidad',78.0),
('DIW',NOW(), NULL,'Diseño Interno Wow',150.21),
('DAW',NOW(), NULL,'Dinosaurio Animal Wolframio',65.7);