<?php
class MotoNacional extends moto{
    private $descuento; //???????

    public function __construct($codigoCnstr, $costoCnstr, $anioFabricacionCnstr, $descripcionCnstr, $porcentajeIncAnualCnstr, $activaCnstr, $descuentoCnstr){
        parent::__construct($codigoCnstr, $costoCnstr, $anioFabricacionCnstr, $descripcionCnstr, $porcentajeIncAnualCnstr, $activaCnstr);
        $this->descuento = $descuentoCnstr;
    }

    public function getDescuento(){
        return $this->descuento;
    }
    
    public function setDescuento($descuentoNew){
        $this->descuento = $descuentoNew;
    }

    public function __toString(){
        return parent::__toString() . "descuento: " . $this->getDescuento() . "%\n";
    }

    public function darPrecioVenta(){
        $precio = parent::darPrecioVenta();
        if($precio != -1){
            $precio -= $precio * ($this->getDescuento() / 100);
        }
        return $precio;
    }
}
?>