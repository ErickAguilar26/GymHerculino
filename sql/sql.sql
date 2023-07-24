CREATE DATABASE gymherculino CHARACTER SET utf8 COLLATE utf8_spanish_ci;

USE DATABASE gymherculino

CREATE TABLE servicios (
    idServicio INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    descripcion TEXT,
    lunes TINYINT,
    lunes_rangoHoras VARCHAR(50),
    martes TINYINT,
    martes_rangoHoras VARCHAR(50),
    miercoles TINYINT,
    miercoles_rangoHoras VARCHAR(50),
    jueves TINYINT,
    jueves_rangoHoras VARCHAR(50),
    viernes TINYINT,
    viernes_rangoHoras VARCHAR(50),
    sabado TINYINT,
    sabado_rangoHoras VARCHAR(50),
    precio_dia DECIMAL(10, 2),
    precio_mes DECIMAL(10, 2),
    color VARCHAR(7),
    activo TINYINT,
    fechaCreacion VARCHAR(8)
);

INSERT INTO servicios 
    (idServicio, nombre, descripcion, lunes, lunes_rangoHoras, martes, martes_rangoHoras, miercoles, miercoles_rangoHoras, jueves, jueves_rangoHoras, viernes, viernes_rangoHoras, sabado, sabado_rangoHoras, precio_dia, precio_mes, color, activo, fechaCreacion) 
VALUES 
    (1, "Aeróbicos", "Los aeróbicos son una forma de ejercicio físico que combina movimientos rítmicos y cardiovasculares para mejorar la salud cardiovascular y fortalecer el sistema respiratorio. Este tipo de actividad se caracteriza por aumentar el ritmo cardíaco y la respiración, lo que ayuda a quemar calorías, mejorar la resistencia y tonificar los músculos. Los beneficios de los aeróbicos incluyen la pérdida de peso, el aumento de la energía, la reducción del estrés, la mejora de la circulación sanguínea y la promoción de un estado de ánimo positivo.", 1, "7:30am - 9:00am", 1, "5:00pm - 7:00pm", 1, "7:00am - 9:00am", 1, "5:30pm - 7:00pm", 1, "7:00am - 9:15am", 0, "", 8, 180, "#24b6d7", 1, "20230603"),
    (2, "Yoga", "El yoga es una antigua práctica que combina posturas físicas, respiración consciente y meditación para promover la salud y el bienestar integral. Los beneficios del yoga son numerosos y van más allá de la mejora física. Esta disciplina ayuda a aumentar la flexibilidad, fortalecer los músculos, mejorar la postura y equilibrar el cuerpo. También favorece la relajación, reduce el estrés, mejora la concentración y promueve la paz interior. Además, el yoga puede ser beneficioso para aliviar dolores y molestias, mejorar la calidad del sueño y aumentar la conciencia corporal.", 1, "9:30am - 11:00am", 0, "", 1, "9:00am - 11:40am", 0, "", 1, "9:50am - 11:15am", 0, "", 7, 190, "#ff0336", 1, "20230603"),
    (3, "Calistenia", "La calistenia es un tipo de entrenamiento físico que utiliza el peso corporal como resistencia para desarrollar fuerza, flexibilidad y coordinación. Los beneficios de la calistenia incluyen el fortalecimiento muscular, la mejora de la resistencia, la promoción de la salud cardiovascular y la mejora de la movilidad. Este enfoque de entrenamiento también es versátil, ya que se puede adaptar a diferentes niveles de condición física y se pueden realizar en cualquier lugar sin necesidad de equipos costosos.", 1, "8:30am - 12:00pm", 1, "4:00pm - 6:30pm", 1, "7:00am - 9:00pm", 1, "10:00am - 12:30pm", 1, "7:00pm - 9:00pm", 1, "9:30am - 11:00am", 6, 150, "#00bf52", 1, "20230603"),
    (4, "Boxeo", "El boxeo es un deporte de combate que no solo requiere fuerza física, sino también habilidad, velocidad y resistencia. Además de ser un excelente ejercicio cardiovascular, el boxeo ofrece una serie de beneficios. Ayuda a mejorar la coordinación, la agilidad y los reflejos, así como a desarrollar la fuerza y la resistencia muscular. También es una forma efectiva de liberar el estrés y aumentar la confianza en uno mismo, ya que requiere concentración mental y disciplina. Además, el boxeo es una gran opción para aquellos que desean aprender técnicas de defensa personal y mejorar su autoestima.", 1, "8:00am - 12:00pm", 0, "", 1, "9:00am - 12:30pm", 0, "", 1, "7:00am - 12:00am", 0, "", 12, 340, "#f15959", 1, "20230603"),
    (5, "Sauna y Baño Turco", "El uso de la sauna y el baño turco tiene múltiples beneficios para la salud y el bienestar. Estas técnicas de termoterapia ayudan a relajar los músculos, reducir la tensión y aliviar el estrés. Además, el calor generado en la sauna y el baño turco estimula la circulación sanguínea, promueve la desintoxicación del cuerpo a través del sudor y mejora la salud de la piel al abrir los poros y eliminar las impurezas. Estas prácticas también pueden mejorar el sistema respiratorio, aliviar dolores musculares y articulares, y promover una sensación general de relajación y bienestar.", 1, "Todo el día", 1, "Todo el día", 1, "Todo el día", 1, "Todo el día", 1, "Todo el día", 1, "Todo el día", 25, 720, "#eeee22", 1, "20230603"),
    (6, "Entrenamiento Personalizado", "El entrenamiento personalizado es una forma de ejercicio físico adaptada a las necesidades individuales de cada persona. Al trabajar con un entrenador personal, se pueden lograr una serie de beneficios. Un programa de entrenamiento personalizado se personaliza para abordar objetivos específicos, ya sea perder peso, aumentar la fuerza, mejorar la flexibilidad o mejorar la condición física en general. El entrenador personal brinda orientación, supervisión y motivación, lo que ayuda a maximizar los resultados y prevenir lesiones. Además, el entrenamiento personalizado puede ser altamente eficiente, ya que se enfoca en ejercicios y técnicas que son adecuados para la persona en particular, lo que permite un progreso más rápido y eficaz.", 1, "Todo el día", 1, "Todo el día", 1, "Todo el día", 1, "Todo el día", 1, "Todo el día", 1, "Todo el día", 10, 250, "#bc95e2", 1, "20230603");


CREATE TABLE sedes (
  idSede INT PRIMARY KEY,
  idDepartamento INT,
  descripcion VARCHAR(255),
  imagen VARCHAR(255),
  mapa TEXT,
  latitud VARCHAR(20),
  longitud VARCHAR(20),
  observacion TEXT,
  idEstado INT,
  fechaApertura VARCHAR(8),
  fechaCreacion VARCHAR(8)
);


INSERT INTO sedes (idSede, idDepartamento, descripcion, imagen, latitud, longitud, observacion, idEstado, fechaApertura, fechaCreacion)
VALUES
(1, 1, 'La Molina', '../assets/img/1.jpg', '-12.084299', '-76.921091', '¡Descubre el gimnasio de La Molina donde tus metas de fitness se hacen realidad! Equipamiento de última generación, entrenadores expertos y un ambiente acogedor te esperan. ¡Únete ahora y transforma tu cuerpo!', 1, '20150615', '20230529'),
(2, 1, 'Ancón', '../assets/img/2.jpg', '-11.766324', '-77.171028', '¡El gimnasio de Ancón te ofrece una experiencia única de fitness! Con entrenamientos personalizados y variedad de clases, te ayudamos a alcanzar tus objetivos. ¡No esperes más, ven y únete a nuestra comunidad fitness!', 1, '20120120', '20230529'),
(3, 1, 'Ate', '../assets/img/3.jpg', '-12.035926', '-76.890964', '¡Bienvenido al gimnasio de Ate, donde tu bienestar es nuestra prioridad! Ofrecemos equipos modernos, clases dinámicas y entrenadores motivados. ¡Mejora tu salud y forma física con nosotros hoy mismo!', 1, '20071215', '20230529'),
(4, 1, 'Barranco', '../assets/img/4.jpg', '-12.148866', '-77.020949', 'Descubre el gimnasio en Barranco que te inspirará a alcanzar nuevas metas. Clases emocionantes, entrenamiento personalizado y un ambiente vibrante te esperan. ¡Únete a nuestra comunidad fitness y transforma tu vida!', 1, '20130322', '20230529'),
(5, 1, 'Carabayllo', '../assets/img/12.jpg', '-11.862948', '-77.055162', '¡El gimnasio de Carabayllo te espera para brindarte una experiencia única de entrenamiento! Con instalaciones modernas y entrenadores profesionales, te ayudaremos a lograr tus metas fitness. ¡Únete a nosotros y comienza tu transformación hoy mismo!', 1, '20140810', '20230529'),
(6, 1, 'Cercado de Lima', '../assets/img/13.jpg', '-12.057485', '-77.038264', 'Descubre el gimnasio en el corazón de Lima donde tus sueños fitness se hacen realidad. Clases desafiantes, entrenadores expertos y un ambiente inspirador. ¡Únete a nuestra comunidad y alcanza tu mejor versión!', 1, '20100720', '20230529'),
(7, 1, 'Chorrillos', '../assets/img/14.jpg', '-12.196365', '-77.012169', '¡El gimnasio en Chorrillos te ofrece una experiencia de entrenamiento excepcional! Con equipos de alta calidad, clases motivadoras y entrenadores dedicados, te ayudaremos a alcanzar tus objetivos de fitness. ¡Únete a nosotros y empieza a cambiar tu vida!', 1, '20190809', '20230529'),
(8, 1, 'Comas', '../assets/img/15.jpg', '-11.956689', '-77.050166', 'Bienvenido al gimnasio en Comas, donde tu bienestar es nuestra prioridad. Con programas de entrenamiento personalizados, clases divertidas y un ambiente acogedor, te ayudaremos a lograr tus metas de fitness. ¡Ven y únete a nosotros ahora!', 1, '20110625', '20230529'),
(9, 1, 'Jesus Maria', '../assets/img/16.jpg', '-12.068799', '-77.044562', 'Descubre el gimnasio en Jesús María donde puedes alcanzar tus objetivos de fitness. Con entrenadores expertos, instalaciones de primer nivel y una variedad de clases, te brindamos la motivación que necesitas. ¡Únete hoy y cambia tu vida!', 1, '20190205', '20230529'),
(10, 1, 'Lince', '../assets/img/17.jpg', '-12.087456', '-77.039878', '¡El gimnasio en Lince te espera para ayudarte a alcanzar tu máximo potencial! Con entrenamientos personalizados, clases dinámicas y un ambiente amigable, te brindaremos el apoyo necesario para lograr tus metas fitness. ¡Únete a nuestra comunidad ahora mismo!', 1, '20220506', '20230529'),
(11, 1, 'Miraflores', '../assets/img/18.jpg', '-12.123783', '-77.038245', 'Descubre el gimnasio en Miraflores que te ayudará a alcanzar tus metas de fitness. Con equipos de última generación, clases innovadoras y entrenadores dedicados, te brindamos el ambiente perfecto para tu transformación. ¡Únete a nosotros hoy mismo!', 1, '20020605', '20230529'),
(12, 1, 'Los Olivos', '../assets/img/19.jpg', '-11.976394', '-77.074437', '¡El gimnasio de Los Olivos te ofrece una experiencia de entrenamiento excepcional! Con instalaciones modernas, clases desafiantes y entrenadores profesionales, te ayudaremos a alcanzar tus objetivos fitness. ¡Únete a nuestra comunidad y logra el éxito!', 1, '20051102', '20230529'),
(13, 1, 'Surco', '../assets/img/20.jpg', '-12.104227', '-76.964320', 'Descubre el gimnasio en Surco donde tu bienestar es nuestra prioridad. Con entrenadores expertos, equipos de vanguardia y un ambiente motivador, te brindamos el impulso necesario para alcanzar tus metas de fitness. Únete a nosotros y experimenta una transformación total en cuerpo y mente.', 1, '20070609', '20230529'),
(14, 2, 'Ica', '../assets/img/1.jpg', '-14.063845', '-75.728655', '¡Descubre el mejor gimnasio en Ica! Con instalaciones modernas, entrenadores expertos y una amplia gama de clases, te ayudaremos a alcanzar tus metas de fitness. Únete a nuestra comunidad y descubre una nueva versión de ti mismo.', 1, '20230106', '20230529'),
(15, 2, 'Parcona', '../assets/img/2.jpg', '-14.046808', '-75.700749', '¡Bienvenido al gimnasio de Parcona! Aquí encontrarás un ambiente acogedor, entrenamientos personalizados y un equipo motivado. Mejora tu salud y bienestar con nuestras instalaciones de calidad. ¡Únete hoy y comienza tu transformación!', 1, '20230509', '20230529'),
(16, 2, 'Tinguiña', '../assets/img/3.jpg', '-14.039861', '-14.039861', '¡El gimnasio de Tinguiña te brinda la oportunidad de ponerte en forma y sentirte bien! Nuestros entrenadores te guiarán en cada paso y nuestras clases te desafiarán. ¡Únete a nosotros y alcanza tus objetivos de fitness!', 1, '20221105', '20230529'),
(17, 3, 'Jacobo Hunter', '../assets/img/4.jpg', '-16.439586', '-71.547024', 'Descubre el gimnasio en Jacobo Hunter donde puedes superar tus límites. Con entrenadores expertos, equipos de primera y un ambiente motivador, te ayudaremos a lograr tus metas de fitness. ¡Únete ahora y comienza tu viaje hacia una vida más saludable!', 1, '20040506', '20230529'),
(18, 3, 'Jose Luis Bustamante y Rivero', '../assets/img/12.jpg', '-16.422046', '-71.525455', '¡El gimnasio en José Luis Bustamante y Rivero es el lugar perfecto para transformarte! Con clases emocionantes, entrenadores profesionales y un ambiente acogedor, te brindamos todo lo que necesitas para alcanzar tus objetivos fitness. ¡Únete a nuestra comunidad hoy mismo!', 1, '20060916', '20230529'),
(19, 3, 'Yanahuara', '../assets/img/13.jpg', '-16.387138', '-71.543305', 'Descubre el gimnasio en Yanahuara que te ayudará a alcanzar tu mejor versión. Con instalaciones de calidad, entrenamientos personalizados y una comunidad enérgica, te brindaremos el apoyo necesario para lograr tus metas de fitness. ¡Únete a nosotros y cambia tu vida!', 1, '20080608', '20230529'),
(20, 4, 'Huamanga', '../assets/img/14.jpg', 'Huamanga', '-74.218181', ' ¡El gimnasio en Huamanga te invita a transformar tu cuerpo y mente! Con entrenadores profesionales, equipos modernos y un ambiente inspirador, te ayudaremos a alcanzar tus objetivos fitness. Únete a nuestra comunidad y descubre el poder del ejercicio.', 1, '20100609', '20230529'),
(21, 5, 'Cusco', '../assets/img/15.jpg', '-13.520300', '-71.976894', 'Descubre el gimnasio en Cusco donde el fitness se convierte en una experiencia emocionante. Con clases innovadoras, entrenadores motivados y un ambiente acogedor, te brindamos las herramientas para lograr tus metas. Únete a nosotros y cambia tu vida desde hoy mismo.', 1, '20110506', '20230529'),
(22, 5, 'Sicuani', '../assets/img/16.jpg', '-14.273407', '-71.226550', 'Descubre el gimnasio en Cusco donde el fitness se convierte en una experiencia emocionante. Con clases innovadoras, entrenadores motivados y un ambiente acogedor, te brindamos las herramientas para lograr tus metas. Únete a nosotros y cambia tu vida desde hoy mismo.', 1, '20120604', '20230529'),
(23, 6, 'Juliaca', '../assets/img/17.jpg', '-15.494976', '-70.127346', 'Descubre el gimnasio en Juliaca que te brinda resultados reales. Con entrenadores especializados, instalaciones de primer nivel y un ambiente acogedor, te acompañamos en tu viaje hacia una vida más saludable y activa. ¡Únete a nosotros y comienza a brillar!', 1, '20090605', '20230529'),
(24, 6, 'Yunguyo', '../assets/img/18.jpg', '-16.244742', '-69.092829', '¡El gimnasio en Yunguyo es tu destino para un estilo de vida activo! Con programas de entrenamiento variados, expertos en fitness y un ambiente amigable, te ayudamos a alcanzar tus metas. ¡Únete a nuestra comunidad y descubre una versión más fuerte de ti mismo!', 1, '20080105', '20230529');


CREATE TABLE departamentos (
    idDepartamento INT PRIMARY KEY,
    descripcion VARCHAR(100),
    observacion VARCHAR(255),
    idEstado INT
);


INSERT INTO departamentos (idDepartamento, descripcion, observacion, idEstado)
VALUES
(1, 'Lima', '', 1),
(2, 'Ica', '', 1),
(3, 'Arequipa', '', 1),
(4, 'Ayacucho', '', 1),
(5, 'Cusco', '', 1),
(6, 'Puno', '', 1);


CREATE TABLE empleados (
    idEmpleado INT PRIMARY KEY,
    idTipoEmpleado INT,
    idCargo INT,
    nombres VARCHAR(50),
    a_paterno VARCHAR(50),
    a_materno VARCHAR(50),
    fechaNacimiento VARCHAR(8),
    activo INT
);


INSERT INTO empleados (idEmpleado, idTipoEmpleado, idCargo, nombres, a_paterno, a_materno, fechaNacimiento, activo)
VALUES
    (1, 1, 1, 'Erick Elías', 'Aguilar', 'Gutiérrez', '19950726', 1),
    (2, 2, 2, 'Kattia', 'Munayco', 'Pisco', '19890522', 1),
    (3, 1, 3, 'Benjamin', 'Aparcana', 'Melgar', '20000928', 1),
    (4, 2, 4, 'Nicole', 'Vila', 'Azabache', '20020818', 1),
    (5, 3, 6, 'Cesar', 'del Aguila', 'Huamaní', '19940225', 1),
    (6, 4, 7, 'Paolo', 'Cueto', 'Rivas', '19940905', 1),
    (7, 4, 7, 'Daniel', 'Rojas', 'Market', '19940905', 1);



CREATE TABLE cargos (
    idCargo INT PRIMARY KEY,
    idArea INT,
    nombre VARCHAR(50),
    fechaCreacion DATE
);

INSERT INTO cargos (idCargo, idArea, nombre, fechaCreacion)
VALUES
    (1, 1, 'Gerente general', '2023-06-28'),
    (2, 1, 'Secretaria de gerencia general', '2023-06-28'),
    (3, 2, 'Administrador', '2023-06-28'),
    (4, 2, 'Secretaria de administración', '2023-06-28'),
    (5, 3, 'Gerente de RR.HH.', '2023-06-28'),
    (6, 4, 'Entrenador Jefe', '2023-06-28'),
    (7, 4, 'Entrenador', '2023-06-28');


CREATE TABLE especialidad (
    idEmpleado INT,
    idServicio INT,
    PRIMARY KEY (idEmpleado, idServicio),
    FOREIGN KEY (idEmpleado) REFERENCES empleados (idEmpleado),
    FOREIGN KEY (idServicio) REFERENCES servicios (idServicio)
);


INSERT INTO especialidad (idEmpleado, idServicio)
VALUES
    (5, 1),
    (5, 2),
    (5, 3),
    (5, 4),
    (5, 5),
    (5, 6),
    (6, 2),
    (6, 3),
    (6, 6),
    (7, 3),
    (7, 4),
    (7, 5);



CREATE TABLE usuario (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellidos VARCHAR(100),
    dni VARCHAR(8),
    telefono VARCHAR(10),
    email VARCHAR(100),
    activo TINYINT
);

INSERT INTO usuario (nombre, apellidos, dni, telefono, email, activo)
VALUES
    ('Lala', 'Pony Pony', '12345678', '974589652', 'lalalala@gmail.com', 1),
    ('Lele', 'Pony Pony', '12345678', '985652145', 'lalalala@gmail.com', 1),
    ('Lili', 'Pony Pony', '12345678', '985458745', 'lalalala@gmail.com', 1);






