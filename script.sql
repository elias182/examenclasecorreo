create database examenrecu;


CREATE TABLE `usuarios` (
 `id` int(255) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(100) NOT NULL,
 `apellidos` varchar(255) DEFAULT NULL,
 `email` varchar(255) NOT NULL,
 `pass` varchar(255) NOT NULL,
 `rol` varchar(20) DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin
drop table if exists mensajes;

CREATE TABLE mensajes (
id int(4) PRIMARY KEY auto_increment,
de varchar(100),
asunto varchar(100),
cuerpo text,
fecha date,
para varchar(100),
selected int NULL
)engine=InnoDB;

insert into usuarios values (null,"elias", "mouimi romero", "eliasmouimi2016@gmail.com", "$2y$04$jA/npHv028eC61utRs/JI.vFhAZKEO1kHvu3hVZJOQnwWa8mC2Spy", "user");

INSERT INTO mensajes VALUES (null,"Jose Luis Caparros","Recursos EducaMadrid","Este es un canal de información de la Revista Digital y del Portal EducaMadrid a los profesores de la enseñanza sostenida con fondos públicos.
Los mensajes son enviados a su cuenta profesional en 'educa.madrid.org'. Si recibe este mensaje en una cuenta personal probablemente es porque tenga redirigida su cuenta de EdudcaMadrid.
Si no desea recibir más mensajes de este canal informativo, pulse en el siguiente enlace para cancelar la recepción de futuros mensajes:
http://listas.educa.madrid.org/gestion_listas/index.php","2021-01-25", "eliasmouimi2016@gmail.com", 0);


INSERT INTO mensajes VALUES (null,"Javier Gomez","Visita seguros","
Hola a todos y a todas:
Al igual que hemos hecho en ocasiones anteriores, mañana nos concentraremos en la entrada del instituto para protestar por la situación de la Enseñanza Pública y los recortes que está sufriendo, y por las últimas detenciones ocurridas en Villalba. Nos concentraremos en el segundo recreo.
Un saludo
","2021-01-19", "eliasmouimi2016@gmail.com", 0);

INSERT INTO mensajes VALUES (null,"Mariano Sanchez","Funeral de mi suego","
Espero que vuestras vacaciones sigan tranquilas, pero os tenemos que convocar a una reunión de departameno urgente para mañana jueves a las 13:30 horas.
Lo más probable es que tengamos que desplazar a algún miembro del departamento por quedarse sin horas lectivas. Todo ello como ya suponeis se debe a la implantación de los nuevos ciclos, la reducción de horas de FCT y alguna cosa más.
 Un saludo.","2021-12-19", "eliasmouimi2016@gmail.com", 0);
INSERT INTO mensajes VALUES (null,"Virginia Santamaria","Proximo examen","
Para los que os interese. 
La Marea Verde ha citado a todos los que quieran participar en la manifestación de los mineros mañana a las 10:45 en el Museo de Cera de la Pza Col�n.
Un saludo","2021-01-18", "eliasmouimi2016@gmail.com", 1);
INSERT INTO mensajes VALUES (null,"Almudena Jackson","Otra vez lo mismo","Hola a todos/as:
 Os envío los horarios de las evaluaciones de septiembre por si os hace falta
 Un saludo y que lo paséis bien allá donde estéis
 Guillermo
 Pdata: suerte a los de la asignación informática","2021-01-13", "eliasmouimi2016@gmail.com", 0);
INSERT INTO mensajes VALUES (null,"Brad McGanauy","Saludos de nuevo","Se han publicado las listas PROVISIONALES de admitidos y reservas de los cursos del Plan Específico de Formación de Especialidades del Profesorado de Formación Profesional 2021. Consultar la pestaña Lista de admitidos del curso correspondiente. Acceso al catálogo de cursos en el enlace
Síguenos en twitter. https://twitter.com/iesfranciscoaya
Departamento de Formación Profesional
IES Francisco Ayala
C/ Francisco Ayala
18014 Granada
Tel: 91 525 08 93 / 18 93  Fax: 91 525 58 88 / 41 30
http://www.iesayala.com","2021-01-11", "eliasmouimi2016@gmail.com", 0);
INSERT INTO mensajes VALUES (null,"Xavi Villanova","Re: Visita seguros","Os adjunto el calendario de evaluaciones de los ciclos formativos de mañana.
Os recomiendo que leais el correo que se ha mandado con las evaluaciones de secundaria.
Cualquier incidencia que obligue a retrasar o suspender una evaluación se resolverá el lunes 25 por la tarde.
La calificación de la FCT la pongo yo.
Un saludo.","2021-01-10", "eliasmouimi2016@gmail.com", 0);
INSERT INTO mensajes VALUES (null,"Javier Gomez","Re: Re: Visita seguros","Para los que váis a la huelga
----- Mensaje reenviado -----
De: Cuenta Ies lazarocardenas colladovillalba <ies.lazarocardenas.colladovillalba@educa.madrid.org>
Para: ies.lazarocardenas@yahoo.es
Enviado: Martes 27 de marzo de 2021 11:14
Asunto: Fwd: DESCUENTO HUELGA","2021-01-10", "eliasmouimi2016@gmail.com", 0);
INSERT INTO mensajes VALUES (null,"Anne Wintertur","Happy Birhtday","Por si alguien no se fía de panfletos propagandísticos y quiere el original, aquí la tenéis. La Reforma publicada en el BOE
 Un saludo
----- Mensaje reenviado -----
De: Guillermo Silva Uribarri <silvauribarriguillermo@gmail.com>
Para: ies.lazarocardenas <ies.lazarocardenas@yahoo.es>
Enviado: Miércoles 14 de marzo de 2021 14:06
Asunto: Fwd: La reforma laboral. B.O.E.","2021-01-09", "eliasmouimi2016@gmail.com", 0);
INSERT INTO mensajes VALUES (null,"Joaquim Pitt","Asunto de negocios","Os adjunto la plantilla para rellenar el nuevo horario para este trimestre. Según intrucciones de la inspección es obligatorio rellenarlo y entregarlo aunque no cambie el horario.
A los tutores de FCT que liberen horario se les puede aumentar las horas de FCT en un 50% de las horas liberadas.
Las actividades que se pueden realizar las teneis en las instrucciones de comienzo de curso que os adjunto. Deberían estar entregados el próximo lunes.
En caso de duda consultar con el jefe de departamento por si hubiera actividades que atender.
Recordad que todavía hay huecos en el parte de guardia para añadir a más profesores, sobre todo a primeras y últimas horas.
Las clases de recuperación para los alumnos de segundo curso se rellenarn en : P. Lectivos de docencia de alumnos con evaluación negativa o pendiente .
Feliz retorno y un saludo.","2021-01-08", "eliasmouimi2016@gmail.com", 0);
