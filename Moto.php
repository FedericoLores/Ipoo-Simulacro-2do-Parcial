<?php
class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncAnual;
    private $activa;

    public function __construct($codigoCnstr, $costoCnstr, $anioFabricacionCnstr, $descripcionCnstr, $porcentajeIncAnualCnstr, $activaCnstr){
        $this->codigo = $codigoCnstr;
        $this->costo = $costoCnstr;
        $this->anioFabricacion = $anioFabricacionCnstr;
        $this->descripcion = $descripcionCnstr;
        $this->porcentajeIncAnual = $porcentajeIncAnualCnstr;
        $this->activa = $activaCnstr;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getCosto(){
        return $this->costo;
    }

    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }
    
    public function getPorcentajeIncAnual(){
        return $this->porcentajeIncAnual;
    }

    public function getActiva(){
        return $this->activa;
    }

    public function setCodigo($codigoNew){
        $this->codigo =$codigoNew;
    }

    public function setCosto($costoNew){
        $this->costo =$costoNew;
    }

    public function setAnioFabricion($anioFabricacionNew){
        $this->anioFabricacion =$anioFabricacionNew;
    }

    public function setDescripcion($descripcionNew){
        $this->descripcion =$descripcionNew;
    }

    public function setPorcentajeIncAnual($porcentajeIncAnualNew){
        $this->porcentajeIncAnual =$porcentajeIncAnualNew;
    }

    public function setActiva($activaNew){
        $this->activa =$activaNew;
    }

    public function __toString(){
        if ($this->getActiva()){
            $activa = "si";
        }else{
            $activa = "no";
        }
        return "codigo: " . $this->getCodigo() . "\ncosto: " . $this->getCosto() . "\naño de fabricación: " . $this->getAnioFabricacion() . "\ndescripción: " . $this->getDescripcion() .  "\nporcentaje de incremento anual: " . $this->getPorcentajeIncAnual() . "\nesta activa?: " . $activa . "\n" ;
    }

    public function darPrecioVenta(){
        $precio_venta = -1;
        $precio_compra = $this->getCosto();
        $anio = date("Y") - $this->getAnioFabricacion();
        if($this->getActiva()){
            $precio_venta = $precio_compra + $precio_compra * ($anio * ($this->getPorcentajeIncAnual()/100));
        }
        return $precio_venta;
    }

}


?>