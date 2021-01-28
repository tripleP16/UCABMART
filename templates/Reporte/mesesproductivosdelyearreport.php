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
$reporte="Reporte_Meses_Mas_Productivos_Del_".$year."";
$filename = $reporte. date("Y-m-d")."_". $fecha_partir3.'_'. $fecha_partir2.'_'. $fecha_partir4.'.pdf';

//Llamando las librerias
//require_once ("http://localhost:8080/JavaBridge/java/Java.inc");
require ('../JavaBridge/java/Java.inc');
require ('../php-jru/php-jru.php');
//Llamando la funcion JRU de la libreria php-jru
$jru=new PJRU();
//Ruta del reporte compilado Jasper generado por IReports
$Reporte = $_SERVER['DOCUMENT_ROOT'] . '//UCABMART//reportes//Reporte_Meses_Productivos_Year.jrxml';
//Ruta a donde deseo guardar mi archivo de salida pdf 
$SalidaReporte=  $_SERVER['DOCUMENT_ROOT'] . '//UCABMART//salidareportes//'.$filename;
//Parametro en caso de que el reporte no este parametrizado
$Parametro=new java("java.util.HashMap");
//Indicamos la sentencia mysql
$sql = "SELECT MONTH(f.fac_fecha_hora) Mes, count(f.fac_total) AS MayoresMontoYear, sum(f.fac_puntos_generado) AS PuntosGenerados  FROM factura f  WHERE YEAR(f.fac_fecha_hora) = '".$year."' GROUP BY Mes ORDER BY MayoresMontoYear DESC";
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