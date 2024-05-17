<?php
class Empresa {
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($denominacionCnstr, $direccionCnstr, $colMotosCnstr, $colClientesCnstr, $colVentasCnstr){
        $this->denominacion = $denominacionCnstr;
        $this->direccion = $direccionCnstr;
        $this->colClientes = $colClientesCnstr;
        $this->colMotos = $colMotosCnstr;
        $this->colVentas = $colVentasCnstr;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getColClientes(){
        return $this->colClientes;
    }

    public function getColMotos(){
        return $this->colMotos;
    }

    public function getColVentas(){
        return $this->colVentas;
    }

    public function setDenominacion($denominacionNew){
        $this->denominacion = $denominacionNew;
    }

    public function setDireccion($direccionNew){
        $this->direccion = $direccionNew;
    }

    public function setColClientes($colClientesNew){
        $this->colClientes = $colClientesNew;
    }

    public function setColMotos($colMotosNew){
        $this->colMotos = $colMotosNew;
    }

    public function setColVentas($colVentasNew){
        $this->colVentas = $colVentasNew;
    }

    public function setUnColVentas($indice, $unaVenta){
        $this->colVentas[$indice] = $unaVenta;
    }

    public function __toString(){
        $i=1;
        $string = "denominacion: " . $this->getDenominacion() . "\ndireccion: " . $this->getDireccion() . "\nclientes: ";
        foreach($this->getColClientes() as $cliente){
            $string = $string . "cliente " . $i . ": " . $cliente . " \n";
            $i++;
        }
        $string = $string . "motos: ";
        $i=1;
        foreach($this->getColMotos() as $moto){
            $string = $string . "moto " . $i . ": " . $moto . " \n";
            $i++;
        }
        $i=1;
        $string = $string . "ventas" ;
        foreach($this->getColVentas() as $venta){
            $string = $string . "venta " . $i . ": " . $venta . " \n";
            $i++;
        }
        return $string;
    }

    //retorna una moto vacia si no se encuentra para solo retornar un tipo de dato
    public function retornarMoto($codigoMoto){
        $i=0;
        $moto = null;
        while($i<count($this->getColMotos()) && $codigoMoto != $this->colMotos[$i]->getCodigo()){
            $i++;
        }
        if($i!=count($this->getColMotos())){
            $moto =  $this->colMotos[$i];
        }
        return $moto;
    }

    /** recibe arreglo codigos moto y un cliente, agrega ventas a coleccion venta y retorna importe final
     * @param array $colCodigosMoto
     * @param Cliente $objCliente
     * @return int
     */
    public function registrarVenta($colCodigosMoto, $objCliente){
        $importeFinal = 1;
        if(!($objCliente->getDadoBaja())){
            $objVenta = new Venta(count($this->getColVentas()), date("d,m,y"), $objCliente, [],0);
            foreach($colCodigosMoto as $codigo){
                if($this->retornarMoto($codigo) != null){
                    $objVenta->incorporarMoto($this->retornarMoto($codigo));
                    $this->setUnColVentas(count($this->getColVentas()), $objVenta);
                }
            }
            $importeFinal = $objVenta->getPrecioFinal();
        }
        return $importeFinal;
    }

    public function retornarVentasXCLiente($tipo, $numDoc){
        $colVentasCliente = [];
        foreach($this->getColVentas() as $venta){
            if($venta->getObjCliente()->getTipoDoc() == $tipo && $venta->getObjCliente()->getNumDoc() == $numDoc){
                $colVentasCliente[count($colVentasCliente)] = $venta; 
            }
        }
        return $colVentasCliente;
    }

    public function informarSumaVentasNacionales(){
        $importe = 0;
        $coleccionVentas = $this->getColVentas();
        foreach($coleccionVentas as $venta){
            $importe += $venta->retornarTotalVentaNacional();
        }
        return $importe;
    }

    public function informarVentasImportadas(){
        $ventasImportadas = [];
        $coleccionVentas = $this->getColVentas();
        foreach($coleccionVentas as $venta){
            if($venta->retornarMotosImportadas() != null){
                $ventasImportadas[] = $venta;
            }
        }
        if ($ventasImportadas == []){
            $ventasImportadas = null;
        }
        return $ventasImportadas;
    }

}

?>