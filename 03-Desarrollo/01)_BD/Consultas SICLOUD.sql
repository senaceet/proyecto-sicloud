use sicloud;

#Fabian

#5- Reporte de ventas por día
select cantidad, sum(f.total) as Total, day(f.fecha) as Dia
from sicloud.det_factura detf
join sicloud.factura f on f.ID_factura = detf.FK_det_factura 
group by dia;

#10- Cantidad total de productos registrados
select nom_prod as "Producto", sum(stok_prod) as Cantidad
from sicloud.producto
group by nom_prod
union
select estado_prod, sum(stok_prod) as Total
from sicloud.producto;


#15- Nombres y apellidos, documento de identidad del clientes que no hayan realizado compras
select ID_us as "No. documento", nom1 as "Nombre de usuario", ape1 as "Apellido", f.fecha as "Fecha", f.total as "Total"
from sicloud.det_factura detf
join sicloud.factura f on f.ID_factura = detf.FK_det_factura
right join sicloud.usuario u on u.ID_us = detf.CF_us;

#20- Consulta factura cliente con todos los campos requeridos en una factura de acuerdo al modelo de negocio (ordenadas DES)
select ID_factura as "ID factura", total as "Total", f.fecha as "Fecha", sub_total as "Subtotal", CalculoIVA(total) as "Iva"
from sicloud.det_factura detf
join sicloud.usuario u on u.ID_us = detf.CF_us
join sicloud.factura f on f.ID_factura = detf.FK_det_factura
order by ID_factura desc;


# Javier 

# 1- Listar en orden alfabético los usuarios registrados (nombres, apellidos) y el tipo de documento
select TD.ID_acronimo "Documento", U.ID_us as "No. Documento", U.nom1 as "Primer nombre", U.nom2 as "Segundo nombre", U.ape1 "Primer apellido", U.ape2 "Segundo apellido"
 from sicloud.usuario U join sicloud.tipo_doc TD on TD.ID_acronimo =  U.FK_tipo_doc
order by U.nom1;

# 6- Reporte de ventas por semana
select count(*) as "Cantidad de ventas por semana",sum(F.total) as Total,  DATE_ADD( 
DATE (F.fecha),
interval(7 - dayofweek(F.fecha)) day)
dia_final_semana FROM sicloud.factura F 
group by dia_final_semana
order by fecha asc;


# 11- Listar en orden alfabético todas las categorías de productos
select nom_categoria as "Categoria"
from sicloud.categoria
order by nom_categoria asc;


# 16- Ordenar ventas por fecha (Desde la más actual a la más antigua)
select F.fecha  as "Fecha", U.ID_us as "No. Documento", U.nom1 as "Primer Nombre", U.nom2 as "Segundo apellido", U.ape1 as "Primer apellido", U.ape2 as "Segundo apellido", P.nom_prod as "Producto", CalculoIVA(total) as "Iva", P.val_prod "Valor producto" , DF.cantidad as "Cantidad", F.total as "Total", R.nom_rol as "Cargo"
from sicloud.usuario U join rol_usuario RU on RU.FK_us = U.ID_us
join sicloud.rol R on RU.FK_rol = R.ID_rol_n
join sicloud.det_factura DF on DF.CF_us = ID_us
join sicloud.factura F on F.ID_factura = DF.FK_det_factura
join sicloud.producto P on P.ID_prod = FK_det_prod
order by fecha desc;


# David

#Listar en orden alfabético los usuarios con rol "administrador" con todos sus datos
select *from sicloud.usuario u
join sicloud.rol_usuario rs on rs.FK_us = u.ID_us
join sicloud.rol r on r.ID_rol_n = rs.FK_rol
where nom_rol = 'administrador';

#Listar en orden alfabético todos los productos, la cantidad existente y la categoría a la que pertenece el producto (inventario)
select nom_prod as "Producto", stok_prod as "Stok", nom_categoria as "Categoria" from sicloud.producto sp
join sicloud.categoria sc on sp.CF_categoria = sc.ID_categoria order by nom_prod asc;

#Nombres y apellidos, documento de identidad del cliente que realizó la compra de menor valor
select nom1 as "Primer nombre", nom2 as "Segundo nombre", ape1 "Primer apellido" , ape2 as "Segundo apellido", ID_us "No. Documento", total as "Total" 
from sicloud.usuario u
join sicloud.det_factura df on df.CF_us = u.ID_us
join sicloud.factura f on f.ID_factura = df.FK_det_factura where total = (select min(total) from sicloud.factura);

#Consulta factura cliente con todos los campos requeridos en una factura de acuerdo al modelo de negocio (ordenadas ASC)
select ID_us as "No. Documento" , nom1 as "Primer Nombre", nom2 as "Segundo nombre", ape1 as "Primer apellido", ape2 as "Segundo apellido", nom_prod as "Producto", cantidad as "Cantidad" ,sub_total as "Sub total", CalculoIVA(total) as "Iva", total as "Total", f.fecha as "Fecha" from sicloud.usuario u
join sicloud.det_factura df on df.CF_us = u.ID_us
join sicloud.factura f on f.ID_factura = df.FK_det_factura
join sicloud.producto sp on sp.ID_prod = df.FK_det_prod
order by nom1 asc ;

# Alejandro
#Cantidad de usuarios registrados
select ID_us as "No. Documento", nom1 as "Primer nombre", ape1 as "Segundo nombre" from sicloud.usuario;


#Cantidad de usuarios registrados 2
select count(1) as "Cantidad de usuarios registrados" from sicloud.usuario;


#Listar en orden alfabetico los usuarios, la compra que realizo, el metodo de pago y el total de la compra
select  ID_us as "No. Documento" ,nom1 as "Primer nombre",ape1 as "Primer apellido",nom_prod as "Producto",nom_tipo_pago as "Medio de pago", total as "Total"
 from sicloud.det_factura df
join sicloud.usuario u on df.CF_us = u.ID_us and df.CF_tipo_doc = u.FK_tipo_doc
join sicloud.producto p on df.FK_det_prod = p.ID_prod
join sicloud.factura f on df.FK_det_factura = f.ID_factura
join sicloud.tipo_pago  tp on f.FK_c_tipo_pago = tp.ID_tipo_pago  order by nom1 asc;


#Nombres y apellidos, documento de identidad del cliente que realizo la compra de mayor valor
select nom1 as "Primer nombre",nom2 as "Segundo nombre",ape1 as "Primer apellido", ape2 as "Segundo apelido",ID_us as "No. Documento", total as "Total"
 from sicloud.det_factura df
join sicloud.usuario u on df.CF_us = u.ID_us and df.CF_tipo_doc = u.FK_tipo_doc
join sicloud.factura f on df.FK_det_factura = f.ID_factura
where total = (select max(total) from sicloud.factura );

#Listar los posibles errores con la fecha, hora exacta y la descripcion del error ordenados desde el ultimo al mas antiguo
select ID_error as "ID error ",descrip_error as "Descripcion del error" ,fecha as "Fecha",hora as "Hora" from sicloud.log_error order by fecha desc;


#Daniel

#2- Listar en orden alfabético los usuarios registrados con el tipo de documento diferente de 'CC'
select nom1 as "Primer nombre" ,ape1 as "Primer apellido" , ID_us as "No. Docunmento",FK_tipo_doc  "Documento"
from sicloud.usuario U join sicloud.tipo_doc TD
on U.FK_tipo_doc=TD.ID_acronimo where not (FK_tipo_doc='CC');

#7- Reporte de ventas por mes
select count(*) as 'Ventas por mes',DATE_ADD(DATE(F.Fecha),interval(31 - dayofmonth(F.Fecha))day)
Dia_Final_Mes from sicloud.factura F group by Dia_Final_Mes order by fecha asc ;


/*12- Cantidad de categorías*/
select *from sicloud.categoria;



#17- Ordenar ventas por fecha (Desde la más antigua a la actual)
select F.fecha  as "Fecha", U.ID_us as "No. Documento", U.nom1 as "Primer Nombre", U.nom2 as "Segundo apellido", U.ape1 as "Primer apellido", U.ape2 as "Segundo apellido", P.nom_prod as "Producto", CalculoIVA(total) as "Iva", P.val_prod "Valor producto" , DF.cantidad as "Cantidad", F.total as "Total", R.nom_rol as "Cargo"
from sicloud.usuario U join rol_usuario RU on RU.FK_us = U.ID_us
join sicloud.rol R on RU.FK_rol = R.ID_rol_n
join sicloud.det_factura DF on DF.CF_us = ID_us
join sicloud.factura F on F.ID_factura = DF.FK_det_facturaCalculoIVA
join sicloud.producto P on P.ID_prod = FK_det_prod
order by fecha asc;