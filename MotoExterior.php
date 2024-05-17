<?php
class MotoExterior extends moto{
    private $pais;
    private $impuestoImportacion;

    public function __construct($codigoCnstr, $costoCnstr, $anioFabricacionCnstr, $descripcionCnstr, $porcentajeIncAnualCnstr, $activaCnstr, $paisCnstr, $impuestoImportacionCnstr){
        parent::__construct($codigoCnstr, $costoCnstr, $anioFabricacionCnstr, $descripcionCnstr, $porcentajeIncAnualCnstr, $activaCnstr);
        $this->pais = $paisCnstr;
        $this->impuestoImportacion = $impuestoImportacionCnstr;
    }

    public function getPais(){
        return $this->pais;
    }
    
    public function setPais($paisNew){
        $this->pais = $paisNew;
    }

    public function getImpuestoImportacion(){
        return $this->impuestoImportacion;
    }
    
    public function setImpuestoImportacion($impuestoImportacionNew){
        $this->impuestoImportacion = $impuestoImportacionNew;
    }

    public function __toString(){
        return parent::__toString() . "pais: " . $this->getPais() . "\nimpuesto de importación: " . $this->getImpuestoImportacion() . "%\n";
    }

    public function darPrecioVenta(){
        $precio = parent::darPrecioVenta();
        if($precio != -1){
            $precio += $precio * $this->getImpuestoImportacion() /100;
        }
        return $precio;
    }


}
?>