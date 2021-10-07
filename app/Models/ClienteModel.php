<?php 

namespace App\Models;  
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;


class ClienteModel extends Model{ 
     protected $db;
    protected $table = 'Clientes';
    protected $allowedFields =  ['folio','nombre','a_paterno','a_materno','correo','fecha_registro','fecha_actualizacion','id_seccionintt'];
    public function __construct() {
       $this->db = db_connect(); 
    } 

}