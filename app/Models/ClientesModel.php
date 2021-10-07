<?php 

namespace App\Models;  
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;


class ClientesModel extends Model{    
    protected $db;
    protected $table = 'Clientes';
    protected $allowedFields =  ['folio','nombre','a_paterno','a_materno','correo','fecha_registro','fecha_actualizacion','id_seccionintt'];
    public function __construct() {
       $this->db = db_connect(); 
    }
    public function obtener_clientes(){      
    	$builder = $this->db->table('clientes');
        $builder->select('clientes.id,
                            clientes.folio,
                            clientes.nombre,
                            clientes.a_paterno,
                            clientes.a_materno,
                            clientes.correo,
                            clientes.fecha_registro,
                            clientes.fecha_actualizacion,
                            clientes.id_seccionintt,
                            secciones_interes.seccion');
        $builder->join('secciones_interes', 'secciones_interes.id = clientes.id_seccionintt');    	
        $query = $builder->get(10,0)->getResultArray(); 
        return $query; 
   }
   public function edit_clientes(){      
    	$builder = $this->db->table('clientes');
        $builder->select('*');
        $builder->join('secciones_interes', 'secciones_interes.id = clientes.id_seccionintt');
        $builder->where('clientes.id',1);      
        $query = $builder->get(1,0)->getResultArray(); 
        return $query; 
   }


   public function obtener_clientes_reg(){
        $query = "SELECT COUNT(secciones_interes.id)as total,secciones_interes.seccion  FROM clientes
                    INNER JOIN secciones_interes
                    ON secciones_interes.id = clientes.id_seccionintt
                    GROUP BY secciones_interes.id,secciones_interes.seccion";        
        $query=$this->db->query($query);      
        return $query->getResultArray();
   }



   public function insert_data($data) {
	if($this->db->table($this->table)->insert($data))
        {
            return $this->db->insertID();
        }
        else
        {
            return false;
        }
    }

}