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
$reporte="Reporte_Cumplimiento_Horario";
$filename = $reporte. date("Y-m-d")."_". $fecha_partir3.'_'. $fecha_partir2.'_'. $fecha_partir4.'.pdf';

//Llamando las librerias
require ('../JavaBridge/java/Java.inc');
require ('../php-jru/php-jru.php');
require ('../vendor/autoload.php');
require ('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php');
require ('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/cell/Coordinate.php');
require ('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
//Llamando la funcion JRU de la libreria php-jru
$jru=new PJRU();
//Ruta del reporte compilado Jasper generado por IReports
$Reporte = $_SERVER['DOCUMENT_ROOT'] . '//UCABMART//reportes//ReporteCumplimientoHorario.jrxml';
//Ruta a donde deseo guardar mi archivo de salida pdf 
$SalidaReporte=  $_SERVER['DOCUMENT_ROOT'] . '//UCABMART//salidareportes//'.$filename;
//Conectar la base de datos
$conn = mysqli_connect("localhost","admin","123","UCABMART");
//Importa el archivo
$documento = IOFactory::load($rutaArchivo);
//Se espera que en la primera hoja estén los productos
$hojaDeProductos = $documento->getSheet(0);
//Calcula el máximo valor de la fila como entero, es decir, el límite de nuestro ciclo
$numeroMayorDeFila = $hojaDeProductos->getHighestRow(); // Numérico
$letraMayorDeColumna = $hojaDeProductos->getHighestColumn(); // Letra
//Convierte la letra al número de columna correspondiente
$numeroMayorDeColumna = Coordinate::columnIndexFromString($letraMayorDeColumna);
//Hago la sentencia para buscar la cedula del empleado y recorrerla

//Recorre filas; comienza en la fila 2 porque omitimos el encabezado
for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {

//Las columnas están en este orden: Cedula, Codigo, Hora Entrada, Hora Salida, Dia, Primer Nombre, Segundo Nombre, Primer Apellido, Segundo Apellido
    $cedulaExcel = $hojaDeProductos->getCellByColumnAndRow(1, $indiceFila)->getFormattedValue();
    $codigohorarioExcel = $hojaDeProductos->getCellByColumnAndRow(2, $indiceFila)->getFormattedValue();
    $hora_entradaExcel = $hojaDeProductos->getCellByColumnAndRow(3, $indiceFila)->getFormattedValue();
    $hora_salidaExcel = $hojaDeProductos->getCellByColumnAndRow(4, $indiceFila)->getFormattedValue(); 
    $diaExcel = $hojaDeProductos->getCellByColumnAndRow(5, $indiceFila); 
    $primer_nombreExcel = $hojaDeProductos->getCellByColumnAndRow(6, $indiceFila);
    $primer_apellidoExcel = $hojaDeProductos->getCellByColumnAndRow(8, $indiceFila);


    //CODIGO PARA COMPARAR Y PONER EL CHECK EN EL QUERY
    $select = $conn->prepare("SELECT hor_hora_entrada, hor_hora_salida FROM ucabmart.horario JOIN horario_empleado ON FK_hor_codigo =  hor_codigo JOIN empleado ON FK_emp_cedula = emp_cedula WHERE emp_cedula = ? AND hor_codigo = ?");
    $select->bind_param("si",$cedulaExcel,intval($codigohorarioExcel)); 
    $select->execute();
    $result=$select->get_result();
   
    if($hora_entradaExcel != NULL || $hora_entradaExcel != ""){
      $compa = $result->fetch_assoc();
      echo "<p class='white-text'>".$hora_entradaExcel." ".$compa['hor_hora_salida']."</p>";
            if (strtotime($hora_entradaExcel) > strtotime($compa['hor_hora_entrada'])){
                $query = " UPDATE ucabmart.horario_empleado SET hor_validacion = 'incumplio' WHERE FK_hor_codigo =  ".intval($codigohorarioExcel)." AND FK_emp_cedula = '".$cedulaExcel."' ;";
                $result = mysqli_query($conn, $query);
            }elseif(strtotime($hora_entradaExcel) == strtotime($compa['hor_hora_entrada']) &&  strtotime($hora_salidaExcel) == strtotime($compa['hor_hora_salida'])){
                $query = " UPDATE ucabmart.horario_empleado SET hor_validacion = 'cumplio' WHERE FK_hor_codigo =  ".intval($codigohorarioExcel)." AND FK_emp_cedula = '".$cedulaExcel."' ;";
                $result = mysqli_query($conn, $query);
            }elseif(strtotime($hora_entradaExcel) == strtotime($compa['hor_hora_entrada']) &&  strtotime($hora_salidaExcel) > strtotime($compa['hor_hora_salida'])){
                $query = " UPDATE ucabmart.horario_empleado SET hor_validacion = 'hora extras' WHERE FK_hor_codigo =  ".intval($codigohorarioExcel)." AND FK_emp_cedula = '".$cedulaExcel."' ;";
                $result = mysqli_query($conn, $query);
            }
    
    
    }else{
        $query = " UPDATE ucabmart.horario_empleado SET hor_validacion = 'falto' WHERE FK_hor_codigo =  ".intval($codigohorarioExcel)." AND FK_emp_cedula = '".$cedulaExcel."' ;";
        $result = mysqli_query($conn, $query);
    }
    
    //recorre la consulta
   
}

//Parametro en caso de que el reporte no este parametrizado
$Parametro=new java("java.util.HashMap");
//Indicamos la sentencia mysql
$sql = " SELECT * FROM ucabmart.horario_empleado JOIN ucabmart.empleado ON FK_emp_cedula = emp_cedula JOIN ucabmart.horario ON FK_hor_codigo = hor_codigo WHERE hor_dia BETWEEN  '".$dia_inicio."' AND '".$dia_fin."'  ORDER BY hor_dia";
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