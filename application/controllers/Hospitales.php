<?php
    class Hospitales extends CI_Controller
    {
        function __construct(){
            parent :: __construct();
            $this->load->model("Hospital");
        }
        //renderizacion de la vista hospitales.
        public function index(){//Mision de renderizar una pagina.
            $data["listadoHospitales"]=$this->Hospital->consultarTodo();
            $this->load->view('header');
            $this->load->view('hospitales/index',$data);//pasamos los datos
            $this->load->view('footer');

        }
        //eliminacion de hospitales recibiendo id
        public function borrar($id_hos){
            $this->Hospital->eliminar($id_hos);
            $this->session->set_flashdata("confirmacion","Hospital Eliminado exitosamente");

            redirect("hospitales/index");
        }

        public function nuevo(){
          $this->load->view("header");
          $this->load->view("hospitales/nuevo");
          $this->load->view("footer");
        }
        //Capturando datos e insetando en Hospital
        public function guardarHospital(){
            $datosNuevosHospital=array("nombre_hos"=>$this->input->post("nombre_hos"),"direccion_hos"=>$this->input->post("direccion_hos"),"telefono_hos"=>$this->input->post("telefono_hos"),"latitud_hos"=>$this->input->post("latitud_hos"),"longitud_hos"=>$this->input->post("longitud_hos"));
            $this->Hospital->insertar($datosNuevosHospital);
            $this->session->set_flashdata("confirmacion","Hospital guardado exitosamente");
            redirect('hospitales/index');
        }

    }
?>
