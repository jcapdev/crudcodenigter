<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;

  
class ProfileController extends Controller
{
    public function index()
    {
        $session = session();
        return view('list-clientes');
        //echo "Hello : ".$session->get('name');
    }
    public function salir() {
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/'));
	}
}