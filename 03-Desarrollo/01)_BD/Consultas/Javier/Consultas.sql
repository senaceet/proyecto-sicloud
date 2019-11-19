use sicloud;

# Javier
# 1- Listar en orden alfabético los usuarios registrados (nombres, apellidos) y el tipo de documento
select TD.ID_acronimo "Documento", U.ID_us as "No. Documento", U.nom1 as "Primer nombre", U.nom2 as "Segundo nombre", U.ape1 "Primer apellido", U.ape2 "Segundo apellido"
 from sicloud.usuario U join sicloud.tipo_doc TD on TD.ID_acronimo =  U.FK_tipo_doc
order by U.nom1;


# 6- Reporte de ventas por semana


# 11- Listar en orden alfabético todas las categorías de productos
select nom_categoria as "Categoria"
from sicloud.categoria
order by nom_categoria asc;


# 16- Ordenar ventas por fecha (Desde la más actual a la más antigua)
select F.fecha  as "Fecha", U.ID_us as "No. Documento", U.nom1 as "Primer Nombre", U.nom2 as "Segundo apellido", U.ape1 as "Primer apellido", U.ape2 as "Segundo apellido", P.nom_prod as "Producto", F.iva as "Iva", P.val_prod "Valor producto" , DF.cantidad as "Cantidad", F.total as "Total", R.nom_rol as "Cargo"
from sicloud.usuario U join rol_usuario RU on RU.FK_us = U.ID_us
join sicloud.rol R on RU.FK_rol = R.ID_rol_n
join sicloud.det_factura DF on DF.CF_us = ID_us
join sicloud.factura F on F.ID_factura = DF.FK_det_factura
join sicloud.producto P on P.ID_prod = FK_det_prod
order by fecha desc;



