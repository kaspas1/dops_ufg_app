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
    public $validaciones;

    /*CONEXIONES E INSTANCIAS */
    public function __construct(){
        $this->conexion = new DB();
        $this->validaciones = new Validaciones();
    }

    /*
    * GETTERS Y SETTERS
    */
    //GETTER Y SETTER DEL ATRIBUTO ID_PERSONA
    public function setIdPersona($idpersona){
        $this->idpersona = intval($idpersona);
    }

    public function getIdPersona($idpersona){
        return = intval($this->idpersona);
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
            $resultado = $this->conexion->run('SELECT * FROM persona where id_persona='. $idpersona);
            $array = array("mensaje"=>"registros encontrados","valores"=>$resultado->fetch());
            return $array
        }else{
            $array = array("mensaje"=>"no se puede ejecutar la consulta, el parametro ID es incorrecto","valores"=>"");
        }
    }

    public function nuevapersona($nombres,$apellidos,$fnac,$telefono,$email){
        $bandera_validacion =0;
        
        //validamos los nombres
        if($this->validacion::verificar_solo_letras(trim($nombres),true)){
            $this->setNombres($nombres);
        }else{
            $bandera_validaciones++;
        }
        
        //validamos los apellidos
        if($this->validacion::verificar_solo_letras(trim($apellidos),true)){
            $this->setApellidos($apellidos);
        }else{
            $bandera_validacion++;
        }
        
        //validamos la fecha de nacimiento
        if($this->validacion::verificar_fecha($fnac, "y-m-d")){
            $thissetFNac($fnac)
        }else{
            $bandera_validacion++;
        }
        
        //validamos el telefono
        if($this->validacion::validar_telefono(trim($telefono))){
            $this->setTelefono($telefono);
        }else{
            $bandera_validacion++;
        }
        
        //validamos el email
        if($this->validacion::validar_email($email)){
            $this->setEmail($email);
        }else{
            $bandera_validacion++;
        }

        if($bandera_validacion === 0){
            $parametros = array(
                "nom" => $this->getNombres(),
                "ape" => $this->getApellidos(),
                "fnac" => $this->getFNac(),
                "email" => $this->getEmail(),
            );

            $resultado = $this->conexion->run('INSERT INTO persona(nombres,apellidos,fnac,telefono,email) VALUES (:nom,:ape,:fnac,:tel,:email);' ,$parametros);
            if($this->conexion->n > 0 and $this->conexion->id > 0){
                
                //SI SE INSERTARON LOS DATOS
                $resultado = $this->obtenerPersona($this->conexion->id);
                $array = array("mensaje"=>"se ha registrado la persona correctamente","valores"=>$resultado);
                return $array;
            }else{
                $array = array("mensaje"=>"hubo un problema al registrar la persona","valores"=>"");
                return $array;
            }
        }else{
            $array = array("mensaje"=>"existe al menos un campo obligatorio que no se ha enviado","valores"=>"");
                return $array;
        }
    }

}
?>
