<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $dadoBaja;
    private $tipoDoc;
    private $numDoc;

    public function __construct($nombreCnstr, $apellidoCnstr, $dadoBajaCnstr, $tipoDocCnstr, $numDocCnstr){
        $this->nombre = $nombreCnstr;
        $this->apellido = $apellidoCnstr;
        $this->dadoBaja = $dadoBajaCnstr;
        $this->tipoDoc = $tipoDocCnstr;
        $this->numDoc = $numDocCnstr;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDadoBaja(){
        return $this->dadoBaja;
    }

    public function getTipoDoc(){
        return $this->tipoDoc;
    }

    public function getNumDoc(){
        return $this->numDoc;
    }

    public function setNombre($nombreNew){
        $this->nombre = $nombreNew;
    }

    public function setApellido($apellidoNew){
        $this->apellido = $apellidoNew;
    }

    public function setDadoBaja($dadoBajaNew){
        $this->dadoBaja = $dadoBajaNew;
    }

    public function setTipoDoc($tipoDocNew){
        $this->tipoDoc = $tipoDocNew;
    }

    public function setNumDoc($numDocNew){
        $this->numDoc = $numDocNew;
    }

    public function __toString(){
        return "nombre: " . $this->getNombre() . " apellido: " . $this->getApellido()."esta dado de baja: " . $this->getDadoBaja() . " tipoDoc: " . $this->gettipoDoc() . " documento: " . $this->getNumDoc();
    }


}

?>