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
$reporte="Reporte_Ingresos_Tienda";
$filename = $reporte. date("Y-m-d")."_". $fecha_partir3.'_'. $fecha_partir2.'_'. $fecha_partir4.'.pdf';

//Llamando las librerias
//require_once ("http://localhost:8080/JavaBridge/java/Java.inc");
require ('../JavaBridge/java/Java.inc');
require ('../php-jru/php-jru.php');
//Llamando la funcion JRU de la libreria php-jru
$jru=new PJRU();
//Ruta del reporte compilado Jasper generado por IReports
$Reporte = $_SERVER['DOCUMENT_ROOT'] . '//UCABMART//reportes//ReporteTiendaIngresos.jrxml';
//Ruta a donde deseo guardar mi archivo de salida pdf 
$SalidaReporte=  $_SERVER['DOCUMENT_ROOT'] . '//UCABMART//salidareportes//'.$filename;
//Parametro en caso de que el reporte no este parametrizado
$Parametro=new java("java.util.HashMap");
//Indicamos la sentencia mysql
$sql = "SELECT oc.FK_tie_codigo, l.lug_nombre , oc.ord_com_fecha_despacho AS FechaI, poc.prod_ord_cantidad AS Ingresos FROM orden_de_compra oc JOIN producto_orden_compra poc ON oc.ord_com_numero = poc.ord_com_numero JOIN tienda t ON t.tie_codigo = oc.FK_tie_codigo JOIN lugar l ON l.lug_codigo = t.FK_lug_codigo WHERE oc.ord_com_fecha_despacho BETWEEN  '".$dia_inicio."' AND '".$dia_fin."' GROUP BY oc.ord_com_numero ORDER BY oc.ord_com_fecha_despacho";
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