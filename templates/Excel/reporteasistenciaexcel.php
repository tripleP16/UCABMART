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
require ('../../php-jru/php-jru.php');
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
    //$rutaArchivo = USAREMOS EL DIRECTORIO QUE PEDIREMOS EN LA VISTA
$documento = IOFactory::load($rutaArchivo);
//Se espera que en la primera hoja estén los productos
$hojaDeProductos = $documento->getSheet(0);
//Calcula el máximo valor de la fila como entero, es decir, el límite de nuestro ciclo
$numeroMayorDeFila = $hojaDeProductos->getHighestRow(); // Numérico
$letraMayorDeColumna = $hojaDeProductos->getHighestColumn(); // Letra
//Convierte la letra al número de columna correspondiente
$numeroMayorDeColumna = Coordinate::columnIndexFromString($letraMayorDeColumna);
//Recorre filas; comienza en la fila 2 porque omitimos el encabezado
for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {

    //Las columnas están en este orden: Nombres, Descripción
    $nombre = $hojaDeProductos->getCellByColumnAndRow(1, $indiceFila);
    $descripcion = $hojaDeProductos->getCellByColumnAndRow(2, $indiceFila);  

    //CODIGO PARA COMPARAR Y PONER EL CHECK EN EL QUERY

    //$query = "INSERT INTO horario (ATRIBUTOCHECK) VALUES('".$check."')";
    $result = mysqli_query($conn, $query);
}

//Parametro en caso de que el reporte no este parametrizado
$Parametro=new java("java.util.HashMap");
//Indicamos la sentencia mysql
$sql = " SELECT FK_emp_cedula,FK_hor_codigo,hor_hora_entrada,hor_hora_salida,hor_dia,hor_validacion,emp_primer_nombre,emp_segundo_nombre,emp_primer_apellido,emp_segundo_apellido,emp_cedula FROM ucabmart.horario_empleado JOIN ucabmart.empleado ON FK_emp_cedula = emp_cedula JOIN ucabmart.horario ON FK_hor_codigo = hor_codigo ";
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