<?php
//Definimos la clase
class mezuabidali{
    //Atributos
    public $nombreRemitente;
    public $correoQueEnvia;
    public $correoDestino;
    public $correoAsunto;
    public $correoCuerpo;

    //Constructor
    public function __construct($Remitente, $Envia, $Destino, $Asunto, $Cuerpo){
        $this->nombreRemitente = $Remitente;
        $this->correoQueEnvia = $Envia;
        $this->correoDestino = $Destino;
        $this->correoAsunto = $Asunto;
        $this->correoCuerpo = $Cuerpo;
    }

    public function enviarEmail(){
        
    }

    //Métosos setters
    public function setRemitente($Remitente){
        $this->nombreRemitente = $Remitente;
    }

    public function setQueEnvia($Envia){
        $this->correoQueEnvia = $Envia;
    }

    public function setDestino($Destino){
        $this->correoDestino = $Destino;
    }

    public function setAsunto($Asunto){
        $this->correoAsunto = $Asunto;
    }

    public function setCuerpo($Cuerpo){
        $this->correoCuerpo = $Cuerpo;
    }
    
    //Métodos getters
    public function getRemitente(){
        return $this->nombreRemitente;
    }    

    public function getEnvia(){
        return $this->correoQueEnvia;
    }

    public function getDestino(){
        return $this->correoDestino;
    }

    public function getAsunto(){
        return $this->correoAsunto;
    }

    public function getCuerpo(){
        return $this->correoCuerpo;
    }
    
    




}


?>