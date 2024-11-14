<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\pilotosModel;

class Home extends BaseController
{
    public function index(): string
    {
        //Retorno de vistas
        return view('layouts/formulario_layouts/header')
            .view('layouts/formulario_layouts/welcome_message', [
                'errors' => session()->getFlashdata('errors'),
                'success' => session()->getFlashdata('success')
                ])
           .view('layouts/formulario_layouts/footer');
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
                return redirect()->to('tabla/vista');
            }
        }
    }
}
