Create database sicloud;
use sicloud;

create table sicloud.rol(
ID_rol_n int(3),
nom_rol varchar(25) not null,
primary key(ID_rol_n)
);

create table sicloud.tipo_doc(
ID_acronimo varchar(5) not null,
nom_doc varchar(25) not null,
primary key (ID_acronimo));


create table sicloud.factura(
ID_factura integer auto_increment not null,
total float(20,2),
fecha date,
sub_total float(20,2),
iva float(20,2),
primary key (ID_factura));


create table sicloud.tipo_medida (
ID_medida int auto_increment not null,
nom_medida varchar(35),
acron_medida varchar(5),
primary key (ID_medida)
);


 create table sicloud.categoria(
 ID_categoria int auto_increment not null,
 nom_categoria varchar(30) not null,
 primary key (ID_categoria));
 
 
 
create table sicloud.producto( 
ID_prod varchar(40) not null,
nom_prod varchar(30) not null,
val_prod float(15,3) not null,
stok_prod float(15,3) not null,
estado_prod varchar(20) not null,
CF_categoria int not null,
CF_tipo_medida int not null,
foreign key(CF_categoria) references sicloud.categoria(ID_categoria),
foreign key(CF_tipo_medida) references sicloud.tipo_medida(ID_medida),
primary key(ID_prod));


create table sicloud.usuario(
ID_us varchar(25) not null,
nom1 varchar(20) not null,
nom2 varchar(20),
ape1 varchar(20)not null,
ape2 varchar(20),
fecha date,
pass varchar(25) not null,
foto blob,
correo varchar(25) not null,
FK_tipo_doc varchar(5),
foreign key (FK_tipo_doc) references sicloud.tipo_doc(ID_acronimo),
primary key (ID_us, FK_tipo_doc)
); 


create table sicloud.det_factura(
FK_det_factura int not null,
FK_det_prod varchar(40) not null,
cantidad float(25,2),
CF_us varchar(25),
CF_tipo_doc varchar(5),
foreign key (FK_det_factura) references sicloud.factura(ID_factura),
foreign key (FK_det_prod) references sicloud.producto(ID_prod),
foreign key (CF_us, CF_tipo_doc) references sicloud.usuario(ID_us, FK_tipo_doc),
primary key (FK_det_factura, FK_det_prod)); 


create table sicloud.rol_usuario(
FK_rol int(3),
FK_us varchar(25),
FK_tipo_doc varchar(5),
fecha_asignacion date not null,
estado bit,
foreign key(FK_rol) references sicloud.rol(ID_rol_n),
foreign key(FK_us, FK_tipo_doc) references sicloud.usuario(ID_us, FK_tipo_doc),
primary key(FK_rol, FK_us, FK_tipo_doc)
);


 create table sicloud.orden_entrada (
 ID_ord integer auto_increment not null,
 fecha_ingreso date not null,
 CF_rol int(3),
 CF_rol_us varchar(25), 
 CF_tipo_doc varchar(5),
 foreign key (CF_rol, CF_rol_us, CF_tipo_doc ) references sicloud.rol_usuario(FK_rol, FK_us, FK_tipo_doc),
primary key(ID_ord));
 
  
 create table sicloud.det_orden (
 FK_ord int,
 FK_prod varchar(40),
 cantidad_prod float(20,2),
 foreign key (FK_ord) references sicloud.orden_entrada(ID_ord),
 foreign key (FK_prod) references sicloud.producto(ID_prod),
 primary key(FK_ord, FK_prod)
 );
 
 
create table sicloud.empresa_provedor(
ID_rut varchar(20),
nom_empresa varchar(25),
primary key(ID_rut));


create table sicloud.det_producto(
FK_prod varchar(40),
FK_rut varchar(20),
fecha date,
num_fac_ing varchar(25),
foreign key (FK_prod) references sicloud.producto(ID_prod),
foreign key (FK_rut) references empresa_provedor(ID_rut),
primary key(FK_prod, FK_rut)
);


create table sicloud.servidor_correo(
ID_SC integer auto_increment not null,
tipo_correo varchar(25),
primary key(ID_SC)
); 


create table sicloud.telefono (
ID_tel integer auto_increment not null,
tel varchar(25) not null,
CF_us varchar(25),
CF_tipo_doc varchar(5),
CF_rut varchar(20),
foreign key(CF_us, CF_tipo_doc) references sicloud.usuario(ID_us, FK_tipo_doc),
foreign key(CF_rut) references sicloud.empresa_provedor(ID_rut),
primary key(ID_tel));


create table sicloud.log_error(
ID_error int auto_increment not null,
descrip_error varchar(255),
fecha date not null,
hora time,
primary key	(ID_error)
);


create table sicloud.ciudad(
ID_ciudad integer auto_increment not null,
nom_ciudad varchar(25),
primary key(ID_ciudad));


create table sicloud.localidad(
ID_localidad int auto_increment not null,
nom_localidad varchar(25),
FK_ciudad int,
foreign key(FK_ciudad) references sicloud.ciudad(ID_ciudad),
primary key(ID_Localidad, FK_ciudad )
);


create table sicloud.barrio(
ID_barrio int auto_increment not null,
nom_barrio varchar(25),
FK_localidad int,
FK_ciudad int,
foreign key(FK_Localidad, FK_ciudad ) references sicloud.localidad(ID_localidad, FK_ciudad),
primary key (ID_barrio, FK_Localidad, FK_ciudad )
);


create table sicloud.direccion(
ID_dir integer auto_increment not null,
via_principal varchar(15) not null,
via_generadora varchar(15) not null,
CF_us varchar(25),
CF_tipo_doc varchar(5),
CF_rut varchar(20),
FK_barrio integer,
FK_Localidad integer,
FK_Ciudad integer,
foreign key (CF_us, CF_tipo_doc) references sicloud.usuario(ID_us, FK_tipo_doc),
foreign key (CF_rut) references sicloud.empresa_provedor(ID_rut),
foreign key (FK_barrio, FK_Localidad, FK_Ciudad) references sicloud.barrio(ID_barrio, FK_localidad, FK_ciudad),
primary	key (ID_dir, FK_barrio, FK_Localidad, FK_Ciudad));

