<?php
  class Clinica extends CI_Model
  {
    function __construct()
    {
      parent::__construct();
    }
    //Insertar nuevos hospitales
    function insertar($datos){
        $respuesta=$this->db->insert("clinica",$datos);
        return $respuesta;
    }
    //consulta de datos
    function consultarTodo(){
        $clinicas=$this->db->get("clinica");
        if($clinicas->num_rows()>0){
            return $clinicas->result();
        }else{
            return false;
        }
    }
    //eliminacion de hospital por ID
    function eliminar($id){
        $this->db->where("id_rc",$id);
        return $this->db->delete("clinica");
    }

  }//Fin de la clase
?>
