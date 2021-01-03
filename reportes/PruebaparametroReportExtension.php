<?php
class PruebaparametroReportExtension extends ReportExtension
{

public $reportFileName='C://Program Files//xampp//htdocs//UCABMART//reportes//pruebaparametro.jrxml';

public $alias='FUNCIONA';

public $enabled = false;

public function getParam(){
    $parameters = new java ('java.util.HashMap');
    $parameters->put('HEADER_REPORT', 'Almacen codigo <br> Almacen direccion ');
    $parameters->put('TITULO', "PRUEBAS DE ENVIOS DE DATOS");
    $parameters->put('REPORT_LOCALE', new Java('java.util.Locale','es', 'VE'));
    return $parameters;
}

public function getSqlSentence(){
    return 'select * from almacen';
}
public function getHtmlOptions(){}

public function beforeRun(){}

public function afterRun($outfilename){} 

public function getConexion(){}

}
?>
