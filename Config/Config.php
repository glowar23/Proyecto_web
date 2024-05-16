<?php 
	
	
	const BASE_URL = "http://localhost/Proyecto_web/";

	//Zona horaria
	date_default_timezone_set('America/Mexico_city');

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "tienda_mascotas2";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "charset=utf8";
	
	const NOMBRE_EMPESA="MyPets";
	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "$";

	const CANTPORDHOME = 8;
	const PROPORPAGINA = 4;
	const PROCATEGORIA = 4;
	const PROBUSCAR = 4;

	//Módulos
	const MDASHBOARD = 1;
	const MUSUARIOS = 2;
	const MCLIENTES = 3;
	const MPRODUCTOS = 4;
	const MPEDIDOS = 5;
	const MCATEGORIAS = 6;
		//Datos envio de correo
	const NOMBRE_REMITENTE = "Tienda Virtual";
	const EMAIL_REMITENTE = "no-reply@mypets.com";
	const WEB_EMPRESA = "www.mypets.com";

	const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Esperando pago','Entregado');
	const ANIMALES = array('cat','dog','bird','fish','otro');

	//Datos Empresa
	const DIRECCION = "Avenida el infierno Zona 13, Mexico";
	const TELEMPRESA = "+(502)78787845";
	const WHATSAPP = "+50278787845";
	const EMAIL_EMPRESA = "info@peluditos.com";
	const EMAIL_PEDIDOS = "info@pedidos.com"; 
	const EMAIL_CONTACTO = "info@mypets.com";
 ?>