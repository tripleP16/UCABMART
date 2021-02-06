<?php

    function DescargarArchivo($fichero)
    {
        $basefichero = basename($fichero);
        header( "Content-Type: application/octet-stream");
        header( "Content-Length:".filesize($fichero));
        header( "Content-Disposition:attachment;filename=" .$basefichero."");
        readfile($fichero);
    }

//Obtener fecha de hoy
$fecha = time();
$fecha_partir1=date ( "h" , $fecha ) ;
$fecha_partir2=date ( "i" , $fecha ) ;
$fecha_partir4=date ( "s" , $fecha ) ;
$fecha_partir3=$fecha_partir1-1;
$reporte="Reporte_Orden_de_Compra";
$filename = $reporte. date("Y-m-d")."_". $fecha_partir3.'_'. $fecha_partir2.'_'. $fecha_partir4.'.pdf';

//Llamando las librerias
//require_once ("http://localhost:8080/JavaBridge/java/Java.inc");
require ('../JavaBridge/java/Java.inc');
require ('../php-jru/php-jru.php');
//Llamando la funcion JRU de la libreria php-jru
$jru=new PJRU();
//Ruta del reporte compilado Jasper generado por IReports
$Reporte = $_SERVER['DOCUMENT_ROOT'] . '//UCABMART//reportes//ordenes_de_compra.jrxml';
//Ruta a donde deseo guardar mi archivo de salida pdf 
$SalidaReporte=  $_SERVER['DOCUMENT_ROOT'] . '//UCABMART//salidareportes//'.$filename;
//Parametro en caso de que el reporte no este parametrizado
$Parametro=new java("java.util.HashMap");
//Indicamos la sentencia mysql
$sql = "SELECT ord.ord_com_numero, pord.prod_codigo, ord.ord_com_fecha_despacho, t.tie_direccion, pd.prod_nombre, pd.prod_descripcion, l.lug_nombre, p.pro_razon_social, p.pro_pagina_web, pord.prod_ord_cantidad, pord.prod_ord_precio,luu.NOMBREMUN,luuu.NOMBREEST, ppord.TOTAL FROM producto_orden_compra pord JOIN orden_de_compra ord ON pord.ord_com_numero = ord.ord_com_numero JOIN tienda t ON ord.FK_tie_codigo = t.tie_codigo JOIN lugar l ON t.FK_lug_codigo = l.lug_codigo JOIN proveedor p ON ord.FK_pro_rif = p.pro_rif JOIN producto pd ON pord.prod_codigo = pd.prod_codigo
JOIN (SELECT pordd.ord_com_numero, SUM(pordd.prod_ord_precio) AS TOTAL FROM producto_orden_compra pordd GROUP BY pordd.ord_com_numero) ppord ON pord.ord_com_numero = ppord.ord_com_numero
JOIN (SELECT lp.lug_codigo, lp.FK_lug_código AS MUNICIPIO FROM lugar lp )lu ON l.lug_codigo = lu.lug_codigo
JOIN (SELECT le.lug_codigo, le.FK_lug_código AS ESTADO, le.lug_nombre AS NOMBREMUN FROM lugar le)luu ON l.FK_lug_código = luu.lug_codigo
JOIN (SELECT lt.lug_codigo, lt.lug_nombre AS NOMBREEST FROM lugar lt)luuu ON luu.ESTADO = luuu.lug_codigo 
WHERE ord.ord_com_numero = '".$codigo_orden_de_compra."' ";
//Funcion de conexion a mi base de datos tipo MySql
$Conexion= new JdbcConnection("com.mysql.jdbc.Driver","jdbc:mysql://localhost/UCABMART","admin","123");
//Generamos la exportacion del reporte
$jru->runPdfFromSql($Reporte,$SalidaReporte,$Parametro,$sql,$Conexion->getConnection());

if(file_exists($SalidaReporte))
{
    DescargarArchivo($filename);
    if(file_exists($SalidaReporte))
    {
        if(unlink($filename))
        {

        }
    }
}
?>