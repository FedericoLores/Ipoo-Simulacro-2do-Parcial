<?php
class Venta{
    private $numero;    
    private $fecha;
    private $objCliente;
    private $colMotos;
    private $precioFinal;

    public function __construct($numeroCnstr, $fechaCnstr, $objClienteCnstr, $colMotosCnstr, $precioFinalCnstr){
        $this->numero = $numeroCnstr;
        $this->fecha = $fechaCnstr;
        $this->objCliente = $objClienteCnstr;
        $this->colMotos = $colMotosCnstr;
        $this->precioFinal = $precioFinalCnstr;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getObjCliente(){
        return $this->objCliente;
    }

    public function getColMotos(){
        return $this->colMotos;
    }

    public function setNumero($numeroNew){
        $this->numero = $numeroNew;
    }

    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    public function setFecha($fechaNew){
        $this->fecha = $fechaNew;
    }

    public function setObjCliente($objClienteNew){
        $this->objCliente = $objClienteNew;
    }

    public function setColMotos($colMotosNew){
        $this->colMotos = $colMotosNew;
    }

    public function setPrecioFinal($precioFinalNew){
        $this->precioFinal = $precioFinalNew;
    }

    public function __toString(){
        $i=1;
        $string = "\nnumero: " . $this->getNumero()."\nfecha: " . $this->getFecha()."\ndatos cliente: " . $this->getObjCliente()."\nmotos vendidas:\n";
        foreach($this->getColMotos() as $moto){
            $string = $string . "moto " . $i . ": " . $moto . " \n";
            $i++;
        }
        $string = $string . "precio final: " . $this->getPrecioFinal() . "\n";
        return $string;
    }

    public function incorporarMoto($objMoto){
        //se asume que la empresa maneja un stock de motos, en vez de que vender una moto cambie la disponibilidad
        $precioMoto = $objMoto->darPrecioVenta();
        $coleccionMotos = $this->getColMotos();
        if($precioMoto!= -1 && !($this->getObjCliente()->getDadoBaja())){
            $coleccionMotos[count($coleccionMotos)] = $objMoto;
            $this->setPrecioFinal($this->getPrecioFinal() + $precioMoto);
            $this->setColMotos($coleccionMotos);
        }
    }

    public function retornarTotalVentaNacional(){
        $coleccionMotos = $this->getColMotos();
        $total = 0;
        foreach($coleccionMotos as $moto){
            if(is_a($moto, 'MotoNacional')){
                $precio = $moto->darPrecioVenta();
                if($precio != -1){
                    $total += $precio;
                }
            }
        }
        return $total;
    }

    public function retornarMotosImportadas(){
        $motosImportadas = [];
        $coleccionMotos = $this->getColMotos();
        foreach($coleccionMotos as $moto){
            if(is_a($moto, 'MotoExterior')){
                $motosImportadas[] = $moto;
            }
        }
        if (count($motosImportadas) == 0){
            $motosImportadas = null;
        }
        return $motosImportadas;
    }

}

?>