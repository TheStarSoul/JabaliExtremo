<?php
    namespace App\Controllers;
    
    use CodeIgniter\Controller;
    use App\Models\pilotosModel;

    class Resultados extends BaseController{
        public function index(){
            $data = $this->mostrar();

            return view('layouts/tabla_layouts/headTabla')
                .view('layouts/tabla_layouts/resultadosTabla', ['data' => $data]);
        }

        public function mostrar(){
            $pilotoModel = new pilotosModel;
            //Obtengo el ultimo registro de la base de datos teniendo en cuenta que el id es autoincremental
            $data['piloto'] = $pilotoModel->orderBy('id_driver', 'DESC')->first();
    
            // Validación por si no hay ningún piloto registrado
            if (!$data['piloto']) {
                return redirect()->to('tabla/vista')->with('error', 'No se encontró el piloto registrado.');
            }else{
                return $data;
            }
        }
    }
?>