<?php
include_once 'Empresa.php';
include_once 'Venta.php';
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'MotoNacional.php';
include_once 'MotoExterior.php';

$objCliente1 = new Cliente("Jorge", "Ramirez", false, "DNI", 11022030);
$objCliente2 = new Cliente("Don", "Ramon", false, "DNI", 44055060);
$obMoto11 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$obMoto12 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$obMoto13 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false, 0);
$obMoto14 = new MotoExterior(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);
$objEmpresa = new Empresa("Alta Gama", "Av Argenetina 123", [$obMoto11, $obMoto12, $obMoto13, $obMoto14], [$objCliente1, $objCliente2 ], []);

echo "Punto 4_importe final de venta :" . $objEmpresa->registrarVenta([11,12,13,14], $objCliente2) . "\n";
echo "Punto 5_importe final de venta :" . $objEmpresa->registrarVenta([13,14], $objCliente2) . "\n";
echo "Punto 6_importe final de venta :" . $objEmpresa->registrarVenta([14,2], $objCliente2) . "\n";
$i=1;
$ventasImportadas = $objEmpresa->informarVentasImportadas();
if ($ventasImportadas != null){
    echo "Punto 7_ventas importadas : ";
    foreach($ventasImportadas as $venta){
        echo "venta nro" . $i . " :" . $venta . "\n";
    }
} else {
    echo "Punto7_no hubo ninguna venta importada" . "\n";
}
$sumaVentasNacionales = $objEmpresa->informarSumaVentasNacionales();
if ($sumaVentasNacionales != 0){
    echo "Punto 8_el importe total de las ventas nacionales es: " . $sumaVentasNacionales . "\n";
}else {
    echo "Punto 8_no hubo ventas nacionales" . "\n";
}

echo "punto 9_" . $objEmpresa;

?>