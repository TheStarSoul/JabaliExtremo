<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\pilotosModel;

class Home extends BaseController
{
    public function index(): string
    {
        //Retorno de vistas
        return view('layouts/header')
            .view('welcome_message', [
                'errors' => session()->getFlashdata('errors'),
                'success' => session()->getFlashdata('success')
                ])
           .view('layouts/footer');
    } 

    public function registrar(){
        $pilotoModel = new pilotosModel;

        $reglas = $pilotoModel->validationRules;
        $validacionMensajes = $pilotoModel->validationMessages;

        if(!$this->validate($reglas,$validacionMensajes))
        {
            return redirect()->to('/')->withInput()->with('errors', \Config\Services::validation()->getErrors());
        }
        else
        {
            // Obtener los datos del formulario
            $name = $this->request->getPost('name_driver');
            $lastname = $this->request->getPost('lastname_driver');
            $dni = $this->request->getPost('dni_driver');
            $fono = $this->request->getPost('fono_driver');
            $number = $this->request->getPost('number_driver');
            $email = $this->request->getPost('email_driver');
            $nameContact = $this->request->getPost('nameContact_emergency');
            $fonoContact = $this->request->getPost('fonoContact_emergency');
            $category = $this->request->getPost('categoria_driver');
            $country = $this->request->getPost('country_driver');

            $data = [
                'name_driver' => $name,
                'lastname_driver' => $lastname,
                'dni_driver' => $dni,
                'fono_driver' => $fono,
                'number_driver' => $number,
                'email_driver' => $email,
                'nameContact_emergency' => $nameContact,
                'fonoContact_emergency' => $fonoContact,
                'categoria_driver' => $category,
                'country_driver' => $country
            ];

            //$file = $this->request->getFile('archivo');

            if($pilotoModel->addUsuario($data)){
                return redirect()->to(site_url('home/mostrar'));
            }else{
                $error = $pilotoModel->errors();
                echo var_dump($error);
            }
        }
    }

    public function mostrar(){
        $pilotoModel = new pilotosModel;
        //Obtengo el ultimo registro de la base de datos teniendo en cuenta que el id es autoincremental
        $data['piloto'] = $pilotoModel->orderBy('id_driver', 'DESC')->first();

        // Validación por si no hay ningún piloto registrado
        if (!$data['piloto']) {
            return redirect()->to('/')->with('error', 'No se encontró el piloto registrado.');
        } else {
            // Si se encuentra un piloto, retornamos la vista con los datos
            return view('resultados_message', $data);
        }
    }
}
