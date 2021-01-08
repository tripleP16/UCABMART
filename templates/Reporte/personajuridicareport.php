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
$reporte="Reporte_Carnet_Juridica";
$filename = $reporte. date("Y-m-d")."_". $fecha_partir3.'_'. $fecha_partir2.'_'. $fecha_partir4.'.pdf';

//Obtener el codigo identificador

$identificadorString = strval($identificador);
$cont = strlen($identificadorString);

if($cont == 1){ //00000001
    $identificadorCompleto = '0000000'.$identificadorString;
}
else if($cont == 2){ //00000011
    $identificadorCompleto = '000000'.$identificadorString;
}
else if($cont == 3){ //00000111
    $identificadorCompleto = '00000'.$identificadorString;
}
else if($cont == 4){ //00001111
    $identificadorCompleto = '0000'.$identificadorString;
}
else if($cont == 5){ //00011111
    $identificadorCompleto = '000'.$identificadorString;
}
else if($cont == 6){ //00111111
    $identificadorCompleto = '00'.$identificadorString;
}
else if($cont == 7){ //01111111
    $identificadorCompleto = '0'.$identificadorString;
}
else{ //11111111
    $identificadorCompleto = $identificadorString;
}

//Llamando las librerias
//require_once ("http://localhost:8080/JavaBridge/java/Java.inc");
require ('../JavaBridge/java/Java.inc');
require ('../php-jru/php-jru.php');
//$VALOR='AVENIDA SOUBLETTE';
//Llamando la funcion JRU de la libreria php-jru
$jru=new PJRU();
//Ruta del reporte compilado Jasper generado por IReports
$Reporte = $_SERVER['DOCUMENT_ROOT'] . '//UCABMART//reportes//ReporteCarnetJuridica.jrxml';
//Ruta a donde deseo guardar mi archivo de salida pdf 
$SalidaReporte=  $_SERVER['DOCUMENT_ROOT'] . '//UCABMART//salidareportes//'.$filename;
//Parametro en caso de que el reporte no este parametrizado
$Parametro=new java("java.util.HashMap");
$Parametro->put("codigoN", $identificadorCompleto);
//Indicamos la sentencia mysql
$sql = "SELECT per_jur_rif, per_jur_razon_social, per_jur_denominacion_comercial, lug_nombre,FK_tie_codigo FROM ucabmart.persona_juridica JOIN ucabmart.tienda ON FK_tie_codigo = tie_codigo JOIN ucabmart.lugar ON tienda.FK_lug_codigo = lug_codigo WHERE per_jur_rif = '427096W1078960492155'";
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