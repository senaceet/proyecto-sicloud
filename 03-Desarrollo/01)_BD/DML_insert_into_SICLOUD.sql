use sicloud;

insert into sicloud.log_error(ID_error,descrip_error,fecha,hora)
values		(default,'Error correo electronico no valido','2018-12-04','14:14:00'),
			(default,'Error en la contraseña por favor digitela de nuevo','2019-07-05','13:24:54'),
			(default,'su solicitud requiere elevacion','2019-02-03','15:24:55'); 


insert into sicloud.servidor_correo(ID_SC,tipo_correo)
values		(default,'Gmail'),
			(default,'yahoo'),
			(default,'Outlook'),
			(default,'hotmail');


insert into sicloud.rol (ID_rol_n, nom_rol)
values 		(default,'administrador'),
			(default,'Bodega'),
			(default,'Supervisor'),
			(default,'Ventas');


insert into sicloud.tipo_doc (ID_acronimo, nom_doc)
values 		('CC', 'Cedula'),
			('CE', 'Documento de extranjeria'),
            ("TI", "Tarjeta de identidad");
            
            
insert into sicloud.tipo_pago(ID_tipo_pago, nom_tipo_pago )
values       (default, "Efectivo"),
	         (default, "Tarjeta credito"),
			 (default, "Tarjeta debito"),
             (default, "Bono oferta");
       
       
insert into sicloud.factura (ID_factura,total,fecha,sub_total,iva, FK_c_tipo_pago )
value		(default,2700,'2018-12-04',8.46,7.69, 1),
			(default,9800,'2018-12-23',5.69,4.11, 1),
			(default,3250,'2019-08-16',4.90,4.27, 1),
			(default,8380,'2019-08-17',4.73,5.32, 1),
			(default,4710,'2019-07-19',5.43,1.27, 1),
			(default,6010,'2019-02-02',2.52,5.37, 2),
			(default,3700,'2019-09-28',0.94,2.54, 2),
			(default,3030,'2019-02-16',9.72,3.50, 3),
			(default,6400,'2018-12-30',4.48,9.14, 3),
			(default,9140,'2019-10-18',8.74,7.69, 4),
			(default,9000,'2018-12-20',6.42,7.46, 1),
			(default,5080,'2019-05-13',4.27,6.09, 1),
			(default,1200,'2019-10-19',5.38,9.34, 1),
			(default,7000,'2019-10-12',4.42,9.11, 1),
			(default,1670,'2019-01-08',7.18,0.45, 1),
			(default,5780,'2019-09-23',4.56,3.74, 1),
			(default,8590,'2019-06-23',7.23,6.63, 3),
			(default,1840,'2019-02-03',2.61,9.85, 1),
			(default,6970,'2019-01-19',5.95,2.44, 1),
			(default,3600,'2019-07-05',0.74,8.23,1);


insert into sicloud.tipo_medida(ID_medida,nom_medida,acron_medida)
values 		(default,'nanometro','nn'),
			(default,'milimetro','mm'),
			(default,'centimetro','cm'),
			(default,'metro','mts'),
			(default,'pulgada','inch');


insert into sicloud.categoria (ID_categoria, nom_categoria)
values 		(default, 'Electricos'),
			(default, 'Manuales'),
			(default, 'Materiales metalicos'),
			(default, 'Materiales no metalicos'),
			(default, 'Pinturas'),
			(default, 'Cerrajeria');
            
            
insert into sicloud.producto (ID_prod, nom_prod, val_prod, stok_prod, estado_prod, CF_categoria, CF_tipo_medida)
values		('353740283X', 'DESTORNILLADOR', '89900', 5, 'Disponible', 1, 4),
			('176974732X', 'TRONZADORA', '716000', 5, 'Disponible', 2, 4),
			('430911542X', 'PULIDORA', '659000', 5, 'Disponible', 3, 4),
			('9774391012', 'Toolrich', '124950', 5, 'Disponible', 4, 4),
			('8585851732', 'Alicates', '59950', 5, 'Disponible', 5, 4),
			('0529063441', 'Destornilladores', '35950', 5, 'Disponible', 6, 4),
			('5574468565', 'Taladro', '99950', 5, 'Disponible', 1, 4),
			('6638029436', 'Pegadit', '9950', 5, 'Disponible', 2, 4),
			('2041172460', 'Compresor', '79950', 5, 'Disponible', 3, 4),
			('4884032810', 'Linterna', '49950', 5, 'Disponible', 4, 4),
			('7880000739', 'Sierra', '559900', 5, 'Disponible', 5, 4),
			('1557972591', 'Llave', '22900', 5, 'Disponible', 6, 4),
			('6691851129', '5 llaves', '13900', 5, 'Disponible', 1, 4),
			('509004757X', 'Pintura', '114900', 5, 'Disponible', 2, 4),
			('5789389872', 'VinilBlanco', '134900', 5, 'Disponible', 3, 4),
			('6254386003', 'Laca', '259900', 5, 'Disponible', 4, 4),
			('9808953743', 'Cerrojo', '29900', 5, 'Disponible', 5, 4),
			('3483863125', 'Cerradura', '56900', 5, 'Disponible', 6, 4),
			('5073303091', 'Grapadora', '154900', 5, 'Disponible', 1, 4);


insert into sicloud.usuario (ID_us,nom1,nom2,ape1,ape2,fecha,pass,foto,correo,FK_tipo_doc)
values		('1636012383599','Irma','Rosalyn','Mullen','Cote','1990-08-15','IKC07VII1NL','C:\img\usm.png','pulvinar.arcu.et@Nullatinciduntneque.org', 'CE'),
			('1695062224499','Charlotte',null,'Mccormick','Strong','1985-04-10','CIQ67PVL5EX','C:\img\usf.png',"pulvinar.arcu.et@Nullatinciduntneque.org",'CE'),
			('1662041247199','Elton','Hakeem','Morris','Howell','1988-09-19','JPC81QFH3JG','C:\img\usm.png','Donec.est@temporeratneque.net', 'CC'),
			('1660062872399','Ali','Reagan','Daniels','Owen','1992-02-11','FMU73YOW0MM','C:\img\usf.png','habitant.morbi.tristique@Nullamsuscipit.com', 'CC'),
			('1668040515399','Salvador','Desirae','Stevens',null,'1995-07-21','PWL76KXQ4FG','C:\img\us.png','libero.lacus.varius@Quisque.co.uk', 'CC'),
			('1662101568299','Quin','Paki','Ford','Hahn','1992-07-28','GMU34EQF1NR','C:\img\us.png','semper.tellus.id@Proinvelnisl.ca', 'CC'),
			('1694050100899','Jeremy',null,'Hahn','Trujillo','1990-04-11','SGU29VRZ0IS','C:\img\usm.png','nec@adipiscinglobortisrisus.net', 'CC'),
			('1628012272099','Dacey','Chanda','Gates','Foreman','1995-09-02','MWX02YMX4GM','C:\img\us.png','cursus.vestibulum@Vivamusnon.edu', 'CC'),
			('1608051762299','Ayanna','Thor','Mayer',null,'1989-04-18','PPV93BGM9CX','C:\img\us.png','eu.tellus@augue.com', 'CC'),
			('1670072699699','Keefe',null,'Fox','Shepard','1986-10-22','DQU71WDL2OY','C:\img\us.png','Aliquam.gravida.mauris@egestas.net', 'CC'),
			('1676090228999','James','Oprah','Dickerson','Turner','1988-11-25','TUB17VSF8MZ','C:\img\us.png','ut.molestie@morbitristiquesenectus.co.uk', 'CC'),
			('1623083099799','Aurelia',null,'Gordon','Merrill','1991-10-30','GZB91BTY9WN','C:\img\us.png','Integer.id@sedpede.ca', 'CC'),
			('1687060309399','Kylynn','Aubrey','Daniel',null,'1990-01-11','YDS91KRH4PL','C:\img\us.png','mattis@eu.com', 'CC'),
			('1654011145999','Mollie','Jacqueline','Murphy','Henderson','1997-12-14','KDF36PDZ2DU','C:\img\us.png','nisi.magna@Nuncmauris.edu', 'CC'),
			('1692090422599','Dara',null,'Cook','Herrera','1984-05-17','PGW34XEV7KM','C:\img\us.png','scelerisque@nonante.edu', 'CC'),
			('1624060419399','Xenos','Libby','Flynn','Morris','1982-07-19','PVJ34CMM2DX','C:\img\us.png','Curabitur@velitAliquamnisl.edu', 'CC'),
			('1651011048199','Rajah','Gage','Barry',null,'1987-12-19','BSZ77PRI6GH','C:\img\us.png','lobortis.Class@egestasurna.ca', 'CC'),
			('1680091992499','Gloria',null,'Kirkland','Cote','1981-03-10','CFJ88XPJ2RM','C:\img\us.png','est.vitae@fermentum.edu', 'CC'),
			('1691012831199','Blake','Angela','Schroeder','Knight','1993-03-02','BMH07NRZ2UY','C:\img\us.png','natoque.penatibus.et@quistristiqueac.ca', 'CC'),
			('1698091149999','Cedric',null,'Webster',null,'1991-06-10','WSF42WGJ0OS','C:\img\us.png','Curae.Phasellus@elitCurabitur.com', 'CC');
            
            
insert into sicloud.puntos ( Id_puntos, puntos, fecha, FK_us ,FK_tipo_doc  )
values (  default, 50,  "1990-08-15", "1636012383599", "CE" ),
        (  default, 45,  "1998-08-15", "1695062224499", "CE" ),
        (  default, 35,  "2003-05-15", "1662041247199", "CC" ),
         (  default, 35,  "2003-05-15", "1662041247199", "CC" ),
         ( default, 23, "2004-05-06", '1668040515399', "CC"  ),
         ( default, 22, "2012-05-06", '1662101568299', "CC"  ),
          ( default, 44, "2013-05-06", '1694050100899', "CC"  ),
          ( default, 33, "2014-05-06", '1628012272099', "CC"  ),
           ( default, 100, "2015-05-06", '1608051762299', "CC"  ),
            ( default, 120, "2016-05-06", '1670072699699', "CC"  ),
             ( default, 33, "2017-05-06", '1676090228999', "CC"  ),
             ( default, 200, "2018-05-06", '1623083099799', "CC"  ),
              ( default, 2, "2018-10-06", '1687060309399', "CC"  ),
               ( default, 20, "2018-01-06", '1654011145999', "CC"  ),
                ( default, 203, "2018-01-07", '1692090422599', "CC"  ),
                 ( default, 3, "2019-01-07", '1624060419399', "CC"  ),
                 ( default, 5, "2020-01-09", '1651011048199', "CC"  ),
                 ( default, 15, "2021-01-09", '1680091992499 ', "CC"  ),
                  ( default, 22, "2021-01-10", '1691012831199 ', "CC"  ),
                   ( default, 2, "2021-01-4", '1698091149999 ', "CC"  );
        


            
                 
insert into sicloud.det_factura (FK_det_factura, FK_det_prod, cantidad, CF_us, CF_tipo_doc)
values 		(1, '353740283X', 2, '1636012383599', 'CE'),
			(2, '176974732X', 7, '1695062224499', 'CE'),
            (3, '430911542X', 9, '1662041247199', 'CC'),
            (4, '9774391012', 12, '1660062872399', 'CC'),
            (5, '8585851732', 3, '1668040515399', 'CC'),
            (6, '0529063441', 6, '1662101568299', 'CC'),
            (7, '5574468565', 8, '1694050100899', 'CC'),
            (8, '6638029436', 3, '1628012272099', 'CC'),
            (9, '2041172460', 2, '1608051762299', 'CC'),
            (10, '4884032810', 15, '1670072699699', 'CC'),
            (11, '7880000739', 12, '1676090228999', 'CC'),
            (12, '1557972591', 16, '1623083099799', 'CC'),
            (13, '6691851129', 2, '1687060309399', 'CC'),
            (14, '509004757X', 2, '1654011145999', 'CC'),
            (15, '5789389872', 2, '1692090422599', 'CC'),
            (16, '6254386003', 2, '1624060419399', 'CC'),
            (17, '9808953743', 2, '1651011048199', 'CC'),
            (18, '3483863125', 2, '1680091992499', 'CC'),
            (19, '5073303091', 2, '1691012831199', 'CC');
            ;
            
            
            
		


insert into sicloud.rol_usuario(FK_rol,FK_us,FK_tipo_doc,fecha_asignacion,estado)
values		(1,1636012383599,'CE',"2019-02-17","1"),
			(2,1695062224499,'CE',"2018-01-12","0"),
			(2,1662041247199,'CC',"2018-12-28","0"),
			(2,1660062872399,'CC',"2019-08-6","0"),
			(3,1668040515399,'CC',"2019-02-13","0"),
			(3,1662101568299,'CC',"2018-11-19","1"),
			(4,1694050100899,'CC',"2019-05-13","1"),
			(4,1628012272099,'CC',"2019-03-25","1"),
			(4,1608051762299,'CC',"2019-05-16","1"),
			(4,1670072699699,'CC',"2019-08-10","1"),
			(4,1676090228999,'CC',"2019-05-20","1"),
			(4,1623083099799,'CC',"2019-03-05","1"),
			(4,1687060309399,'CC',"2019-09-25","1"),
			(2,1654011145999,'CC',"2019-04-05","1"),
			(2,1692090422599,'CC',"2018-12-17","1"),
			(2,1624060419399,'CC',"2019-03-02","1"),
			(4,1651011048199,'CC',"2019-10-21","1"),
			(4,1680091992499,'CC',"2019-02-18","1"),
			(1,1691012831199,'CC',"2019-08-16","1"),
			(1,1698091149999,'CC',"2019-01-24","1");
            

insert into sicloud.orden_entrada (ID_ord, fecha_ingreso, CF_rol, CF_rol_us, CF_tipo_doc)
values		(default, '2019-12-14', 1, '1636012383599', 'CE'),
			(default, '2020-02-14', 2, '1695062224499', 'CE'),
			(default, '2020-02-18', 2, '1662041247199', 'CC'),
			(default, '2020-04-25', 2, '1660062872399', 'CC'),
			(default, '2020-05-30', 3, '1668040515399', 'CC'),
			(default, '2020-08-08', 4, '1694050100899', 'CC'),
			(default, '2020-01-28', 4, '1628012272099', 'CC'),
			(default, '2020-03-22', 4, '1670072699699', 'CC');
            

insert into sicloud.det_orden (FK_ord, FK_prod, cantidad_prod)
values		(1,'353740283X', '1'),
			(2,'176974732X', '1'),
			(3,'430911542X', '1'),
			(4,'9774391012', '2'),
			(5,'8585851732', '3'),
			(6,'0529063441', '1'),
			(7,'5574468565', '1'),
			(8,'6638029436', '1');
            
            
insert into sicloud.empresa_provedor (ID_rut , nom_empresa)
values		('17468875','Tuberias S.A.S'),
			('719875909','Nomad Foods Limited'),
			('759451251','Citigroup Inc'),
			('684382518','Ekso Bionics Holdings, Inc'),
			('130382612','Eyegate Pharmaceuticals, Inc'),
			('353721273','Celgene Corporation'),
			('178890276','Avista Corporation'),
			('481796032','Artesian Resources Corporation'),
			('478267154','BlackRock Energy and Resources Trust'),
			('769976670','ProPetro Holding Corp'),
			('550507862','Antero Midstream Partners LP'),
			('411070291','Graco Inc'),
			('647278225','NICE Ltd'),
			('882813547','First Trust Rising Dividend Achievers ETF'),
			('763011374','Amplify Snack Brands, inc'),
			('296342653','Kearny Financial'),
			('467487188','Vident International Equity Fund'),
			('632873939','WisdomTree Interest'),
			('784044923','Banco Santander SA'),
			('464978345','Virtus Global Multi-Sector Income Fund'),
			('390737614','EW Scripps Company');






insert into sicloud.det_producto (FK_prod, FK_rut, fecha, num_fac_ing)
values		  ('353740283X', '17468875', '20191214', '353744583X'),
	        ('176974732X', '719875909', '2019-10-14', '176515932X'),
			('430911542X', '759451251', '2019-08-14', '430947842X'),
			('9774391012', '684382518', '2019-07-14', '9798741012'),
			('8585851732', '130382612', '2019-07-14', '8585111732'),
			('0529063441', '353721273', '2019-06-14', '0523793441'),
			('5574468565', '178890276', '2019-02-14', '5574168565'),
			('6638029436', '481796032', '2019-06-14', '6123429436'),
			('2041172460', '478267154', '2019-10-14', '2011172460'),
			('4884032810', '769976670', '2019-12-14', '4884999810'),
			('7880000739', '550507862', '2019-11-14', '7881963739'),
			('1557972591', '411070291', '2019-09-14', '1557412591'),
			('6691851129', '647278225', '2019-07-14', '6691866629'),
			('509004757X', '882813547', '2019-03-14', '522204757X'),
			('5789389872', '763011374', '2019-04-14', '5789879872'),
			('6254386003', '296342653', '2019-07-14', '6159686003'),
			('9808953743', '467487188', '2019-03-14', '9807777743'),
			('3483863125', '632873939', '2019-04-14', '3469325125'),
			('5073303091', '784044923', '2019-05-14', '5077633091');


insert into sicloud.telefono (ID_tel,tel,CF_us,CF_tipo_doc,CF_rut)
values		(default,'+86(473)137-9500',1636012383599,'CE','464978345'),
			(default,'386(519)326-3151',1695062224499,'CE','390737614'),
			(default,'256 (505) 724-8984',1662041247199,'CC','719875909'),
			(default,'36 (728) 143-1515',1660062872399,'CC','759451251'),
			(default,'41 (286) 669-9579',1668040515399,'CC','684382518'),
			(default,'27 (368) 471-4280',1662101568299,'CC','130382612'),
			(default,'351 (119) 356-1557',1694050100899,'CC','353721273'),
			(default,'7 (262) 871-2576',1628012272099,'CC','178890276'),
			(default,'381 (185) 638-3496',1608051762299,'CC','481796032'),
			(default,'86 (696) 820-0759',1670072699699,'CC','478267154'),
			(default,'95 (545) 769-9359',1676090228999,'CC','769976670'),
			(default,'53 (132) 144-3736',1623083099799,'CC','550507862'),
			(default,'7 (799) 725-1823',1687060309399,'CC','411070291'),
			(default,'62 (278) 290-8760',1654011145999,'CC','647278225'),
			(default,'385 (310) 959-9458',1692090422599,'CC','882813547'),
			(default,'212 (122) 197-5348',1624060419399,'CC','763011374'),
			(default,'63 (377) 587-2050',1651011048199,'CC','296342653'),
			(default,'420 (598) 165-5534',1680091992499,'CC','467487188'),
			(default,'62 (234) 945-8534',1691012831199,'CC','632873939'),
			(default,'62 (829) 578-0489',1698091149999,'CC','784044923');


insert into sicloud.ciudad (ID_ciudad, nom_ciudad)
values  	(default,'Bogotá'),
			(default,'Medellín'),
			(default,'Cali'),
			(default,'Barranquilla'),
			(default,'Soledad'),
			(default,'Cúcuta'),
			(default,'Soacha'),
			(default,'Ibagué'),
			(default,'Bucaramanga'),
			(default,'Villavicencio'),
			(default,'Santa Marta'),
			(default,'Bello'),
			(default,'Valledupar'),
			(default,'Pereira'),
			(default,'Buenaventura'),
			(default,'Pasto'),
			(default,'Manizales'),
			(default,'Montería'),
			(default,'Neiva'),
			(default,'Monte Alegre');
        
        
insert into sicloud.localidad(ID_localidad,nom_localidad,FK_ciudad)
values (default,'Usaquén',1),
(default,'Chapinero',1),
(default,'Santa Fe',1),
(default,'San Cristóbal',1),
(default,'Kennedy',1),
(default,'Tunjuelito',1),
(default,'Bosa',1),
(default,'Fontibón',1),
(default,'Engativá',1),
(default,'Suba',1),
(default,'Barrios Unidos',1),
(default,'Teusaquillo',1),
(default,'Los Mártires',1),
(default,'Antonio Nariño',1),
(default,'Puente Aranda',1),
(default,'La Candelaria',1),
(default,'Rafael Uribe Uribe',1),
(default,'Ciudad Bolívar',1),
(default,'Usme',1),
(default,'Sumapaz',1);


 
insert into sicloud.barrio (ID_barrio, nom_barrio, FK_localidad, FK_ciudad)
values 		(default,'El Porvenir',7,1),
			(default,'Caldas',7,1),
			(default,'Hermoso',7,1),
			(default,'Los Centauros',7,1),
			(default,'La Arboleda',7,1),
			(default,'San Bernardino',7,1),
			(default,'Campo Hermoso',7,1),
			(default,'El Anhelo',7,1),
			(default,'El Corzo',7,1),
			(default,'El Recuerdo',7,1),
			(default,'La Granjita',7,1),
			(default,'La Unión',7,1),
			(default,'San Miguel',7,1),
			(default,'Antonia Santos',7,1),
			(default,'Bosques de Meryland',7,1),
			(default,' El Progreso',7,1),
			(default,'La Azucena',7,1),
			(default,'La Estación',7,1),
			(default,'La Riviera',7,1),
			(default,'Laureles',7,1);
            
            
            
            
            
insert into sicloud.direccion(ID_dir,via_principal,via_generadora,CF_us,CF_tipo_doc,CF_rut,FK_barrio,FK_Localidad,FK_Ciudad)
values 		(default,'Tony','8','1636012383599','CE','464978345',1,7,1),
			(default,'Bonner','88739','1695062224499','CE','390737614',4,7,1),
			(default,'Heffernan','2144',1662041247199,'CC','719875909',3,7,1),
			(default,'American','31',1660062872399,'CC','759451251',4,7,1),
			(default,'Gerald','59',1668040515399,'CC','684382518',5,7,1),
			(default,'Mosinee','59705','1662101568299','CC','130382612',6,7,1),
			(default,'Commercial','40','1694050100899','CC','353721273',7,7,1),
			(default,'Crowley','4','1628012272099','CC','178890276',8,7,1),
			(default,'Porter','92','1608051762299','CC','481796032',9,7,1),
			(default,'Russell','9940','1670072699699','CC','478267154',10,7,1),
			(default,'Farmco','945','1676090228999','CC','769976670',11,7,1),
			(default,'Artisan','4864','1623083099799','CC','550507862',12,7,1),
			(default,'Lake View','693','1687060309399','CC','411070291',13,7,1),
			(default,'Kedzie','4306','1654011145999','CC','647278225',14,7,1),
			(default,'Toban','845','1692090422599','CC','882813547',15,7,1),
			(default,'Starling','5','1624060419399','CC','763011374',16,7,1),
			(default,'Twin Pines','326','1651011048199','CC','296342653',17,7,1),
			(default,'Orin','4','1680091992499','CC','467487188',18,7,1),
			(default,'Graedel','34','1691012831199','CC','632873939',19,7,1),
			(default,'Portage','809','1698091149999','CC','784044923',1,7,1);