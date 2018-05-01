<?php

require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/Entity.php';

class UserJump extends Entity
{   

    private static $email;
    private static $password;
    private static $name;
    private static $lastname;
    private static $birthdate;
    private static $nonce;
    private static $id;
    private static $idlocation;
    private static $idstate;
    private static $typenationalidentifier;
    private static $nationalidentifier;
    private static $direction;
    private static $gender;
    private static $nationality;
    private static $availablemoney;


    static protected $tableName ='UserJump';
    static protected $primaryKey='email';
    
        //getter
    public function get($attribut) {
            if (property_exists($this, $attribut)) {
                    return $this->$attribut;
            }
    }

    //setter
    public function set($attribut,$valeur) {
                    if (property_exists($this, $attribut)) {
                            $this->$attribut=$valeur;
             }
    }
    
    public function checkPassword($email,$password){
            if(!$this==false && ($this->email)==$email && ($this->password)==$password){
                    return true;
            }else{
                    return false;
            }
    }
    
    //getNonce(){}
    //verifyNonce($data,$cnonce,$hash){}
    
    ///constructeur
//    public function __construct($email=NULL, $idprofession=NULL, $name=NULL, $lastname=NULL, $passord=NULL, $birthdate=NULL, $nonce=NULL){
//            if (!is_null($email) && !is_null($idprofession) && !is_null($name) && !is_null($lastname) && !is_null($password) && !is_null($birthdate) &&!is_null($nonce)){
//                            $this->email=$email;
//                            $this->idprofession=$idprofession;
//                            $this->name=$name;
//                            $this->lastname=$lastname;
//                            $this->password=$password;
//                            $this->birthdate=$birthdate;
//                            $this->nonce=$nonce;
//            }
//    }
    
//        public function __set($name, $value) {
//            ;
//        }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $idMeta      identificador
     * @param $titulo      nuevo titulo
     * @param $descripcion nueva descripcion
     * @param $fechaLim    nueva fecha limite de cumplimiento
     * @param $categoria   nueva categoria
     * @param $prioridad   nueva prioridad
     */
//    public static function update(
//        $idMeta,
//        $titulo,
//        $descripcion,
//        $fechaLim,
//        $categoria,
//        $prioridad
//    )
//    {
//        // Creando consulta UPDATE
//        $consulta = "UPDATE meta" .
//            " SET titulo=?, descripcion=?, fechaLim=?, categoria=?, prioridad=? " .
//            "WHERE idMeta=?";
//
//        // Preparar la sentencia
//        $cmd = Database::getInstance()->getDb()->prepare($consulta);
//
//        // Relacionar y ejecutar la sentencia
//        $cmd->execute(array($titulo, $descripcion, $fechaLim, $categoria, $prioridad, $idMeta));
//
//        return $cmd;
//    }

    /**
     * Insertar una nueva meta
     *
     * @param $titulo      titulo del nuevo registro
     * @param $descripcion descripci�n del nuevo registro
     * @param $fechaLim    fecha limite del nuevo registro
     * @param $categoria   categoria del nuevo registro
     * @param $prioridad   prioridad del nuevo registro
     * @return PDOStatement
     */
//    public static function insert(
//        $titulo,
//        $descripcion,
//        $fechaLim,
//        $categoria,
//        $prioridad
//    )
//    {
//        // Sentencia INSERT
//        $comando = "INSERT INTO meta ( " .
//            "titulo," .
//            " descripcion," .
//            " fechaLim," .
//            " categoria," .
//            " prioridad)" .
//            " VALUES( ?,?,?,?,?)";
//
//        // Preparar la sentencia
//        $sentencia = Database::getInstance()->getDb()->prepare($comando);
//
//        return $sentencia->execute(
//            array(
//                $titulo,
//                $descripcion,
//                $fechaLim,
//                $categoria,
//                $prioridad
//            )
//        );
//
//    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminaci�n
     */
//    public static function delete($idMeta)
//    {
//        // Sentencia DELETE
//        $comando = "DELETE FROM meta WHERE idMeta=?";
//
//        // Preparar la sentencia
//        $sentencia = Database::getInstance()->getDb()->prepare($comando);
//
//        return $sentencia->execute(array($idMeta));
//    }
}
//echo '<pre>', print_r(UserJump), '</pre>';

?>