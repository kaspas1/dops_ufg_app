<?php
require("conn.class.php");
require("validaciones.inc.php")

class persona{
    public $idpersona:
    public $nombres;
    public $apellidos;
    public $fnac;
    public $telefono;
    public $email;
    public $conexion;
    public $validacion;

    /*CONEXIONES E INSTANCIAS */
    public function __construct(){
        $this->conexion = new DB();
        $this->validacion = new Validaciones();
    }

    /*
    * GETTERS Y SETTERS
    */
    //GETTER Y SETTER DEL ATRIBUTO ID_PERSONA
    public function setIdpersona($idpersona){
        $this->idpersona =$idpersona;
    }

    public function getIdpersona(){
        return $this->idpersona;
    }

    //GETTER Y SETTER DEL ATRIBUTO NOMBRES
    public function setNombres($nombres){
        $this->nombres =$nombres;
    }

    public function getNombres(){
        return $this->nombres;
    }

    //GETTER Y SETTER DEL ATRIBUTO APELLIDOS
    public function setApellidos($apellidos){
        $this->apellidos =$apellidos;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    //GETTER Y SETTER DEL ATRIBUTO FNAC
    public function setFNac($fnac){
        $this->fnac =$fnac;
    }

    public function getFNac(){
        return $this->fnac;
    }

    //GETTER Y SETTER DEL ATRIBUTO telefono
    public function setTelefono($telefono){
        $this->telefono =$telefono;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    //GETTER Y SETTER DEL ATRIBUTO email
    public function setEmail($email){
        $this->email =$email;
    }

    public function getEmail(){
        return $this->email;
    }

    /**
    * FIN DE LOS GETTERS Y SETTERS
    */
    #---------------------------------#
    /**
    * INICIO DE LOS MÉTODOS PARA PROCESAMIENTO DE DATOS
    */

    public function obtenerPersona(int $idpersona){
        if(idpersona > 0){
            $resultado = $this->conexion->run('SELECT * FROM persona where id_persona='-$idpersona);
            $array = array("mensaje"=>"registros encontrados","valores"=>$resultado->fetch());
            return $array
        }else{
            $array = array("mensaje"=>"no se puede ejecutar la consulta el parametro ID es incorrecto","valores"=>"");
        }
    }

    public function nuevapersona($nombres,$apellidos,$fnac,$telefono,$email){
        $bandera_validacion =0;
        //validamos los nombres
        if($this->validacion::verificar_fecha($fnac, "y-m-d")){
            $thissetFNac($fnac)
        }else{
            $bandera_validacion++;
        }
        //validamos los apellidos
        if($this->validacion::verificar_fecha($fnac, "y-m-d")){
            $thissetFNac($fnac)
        }else{
            $bandera_validacion++;
        }
        //validamos la fecha de nacimiento
        if($this->validacion::verificar_fecha($fnac, "y-m-d")){
            $thissetFNac($fnac)
        }else{
            $bandera_validacion++;
        }
        //validamos la fecha de nacimiento
        if($this->validacion::verificar_fecha($fnac, "y-m-d")){
            $thissetFNac($fnac)
        }else{
            $bandera_validacion++;
        }
        //validamos la fecha de nacimiento
        if($this->validacion::verificar_fecha($fnac, "y-m-d")){
            $thissetFNac($fnac)
        }else{
            $bandera_validacion++;
        }

        if(bandera_validacion === 0){
            $parametros = array(
                "nom" => $this->getNombres(),
                "ape" => $this->getApellidos(),
                "fnac" => $this->getFNac(),
                "nom" => $this->getEmail(),
            )
        }
    }

}
?>