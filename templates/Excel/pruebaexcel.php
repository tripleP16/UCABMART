<?php

require ('../vendor/autoload.php');
require ('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php');
require ('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/cell/Coordinate.php');
require ('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
//Conectar la base de datos
$conn = mysqli_connect("localhost","admin","123","UCABMART");
//Importa el archivo
$rutaArchivo= $_SERVER['DOCUMENT_ROOT'] . '/UCABMART/Exceldoc/datoprueba.xlsx';
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
    $query = "INSERT INTO excelprueba (exce_nombre,exce_descripcion) VALUES('".$nombre."','".$descripcion."')";
    $result = mysqli_query($conn, $query);
}
//LOAD & USE PHPSPREADSHEET LIBRARY
/*require ('../vendor/autoload.php');
require ('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php');
require ('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/cell/Coordinate.php');
require ('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// (2) CREATE A NEW SPREADSHEET
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// (3) SET CELL VALUE
$sheet->setCellValue('A1', 'Hello World !');

// (4) SAVE TO FILE
$writer = new Xlsx($spreadsheet);
$writer->save('C:/xampp2/htdocs/UCABMART/salidareportes/hello world.xlsx');*/

?>