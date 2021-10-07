<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ClientesModel;
use App\Models\ClienteModel;

class Clientes extends Controller
{
    public function index()
    {    
        $model = new ClientesModel();
        $data['clientes_detail'] = $model->obtener_clientes();
        
        return view('list-clientes', $data);

        $this->load->model('empleados_model');

    }
    public function obclient()
    {    
        $model = new ClientesModel();
        $data['registrados_detail'] = $model->obtener_clientes_reg();

        return view('list-registrados', $data);
       
    }     
    public function edit($id = null)
    {
     
     $model = new ClientesModel();
     $data = $model->edit_clientes();

	 // $data['clientes_detail'] = $model->obtener_clientes();
      echo json_encode(array("status" => true , 'data' => $data));  
	 


    }

     public function store()
    {  
        helper(['form', 'url']);
        
        $model = new ClientesModel();
        $aleat = random_int(100, 999);

        date_default_timezone_set('GMT');		
		$today = date("Y-m-d,h:m:s");
        $data = [        	
        	'folio' 		  => $aleat,
            'nombre' 		  => $this->request->getVar('txtFirstName'),
            'a_paterno'       => $this->request->getVar('txtAppPat'),
            'a_materno'       => $this->request->getVar('txtAppMat'),
            'correo'  		  => $this->request->getVar('txtCorreo'),
            'fecha_registro'  => $today,
            'fecha_actualizacion'  => $today,
            'id_seccionintt'  => $this->request->getVar('txtSeccion'),            
            ];
        $save = $model->insert_data($data);
		if($save != false){			
			$data = $model->obtener_clientes_reg();
			echo json_encode(array("status" => true,"data" => $data));
		}
		else{
			echo json_encode(array("status" => false));
		}
    }

    public function delete($id = null){
     $model = new ClientesModel();
     $delete = $model->where('idclient', $id)->delete();
		if($delete)
		{
		   echo json_encode(array("status" => true));
		}else{
		   echo json_encode(array("status" => false));
		}
    }

    public function update()
    {       $model = new ClientesModel();
            helper(['form', 'url']);
            
            $aleat = random_int(100, 999);

            date_default_timezone_set('GMT');       
            $today = date("Y-m-d,h:m:s");
             
            $id  = $this->request->getVar('hdnClientId');          
            //$idclient = (int)$id;
            $data = [ 
                    'folio'           => $aleat,
                    'nombre'          => $this->request->getVar('Nombre'),
                    'a_paterno'       => $this->request->getVar('AppPat'),
                    'a_materno'       => $this->request->getVar('AppMat'),
                    'correo'          => $this->request->getVar('Correo'),
                    'fecha_registro'  => $today,
                    'fecha_actualizacion'  => $today,
                    'id_seccionintt'  => $this->request->getVar('Seccion'),  
            ];
            
            $update = $model->update($id,$data);
            //echo json_encode(array("status" => $data, "id" => $id));
            if($update != false)
            {
                //$data = $model->where('idclient ', $id)->first();
                echo json_encode(array("status" => true));
            }
            else{
                 echo json_encode(array("status" => false));
            }
    }

}
 
?>