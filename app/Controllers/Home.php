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
                'errors' => session()->getFlashdata('errors')
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
            $userEmail = $this->request->getPost('email_driver');
            $nameContact = $this->request->getPost('nameContact_emergency');
            $fonoContact = $this->request->getPost('fonoContact_emergency');
            $category = $this->request->getPost('categoria_driver');
            $country = $this->request->getPost('country_driver');
            $file = $this->request->getFile('archivo_driver');

            if ($file) {
                // Obtener el nombre original del archivo
                $fileName = $file->getName();  // Usa el nombre original del archivo, sin codificarlo.
                $filePath = $fileName;  // El nombre del archivo sin prefijo


                // Guardar la ruta del archivo en la base de datos
                // 'jabali/nombre_del_archivo.ext'

                $data = [
                    'name_driver' => $name,
                    'lastname_driver' => $lastname,
                    'dni_driver' => $dni,
                    'fono_driver' => $fono,
                    'number_driver' => $number,
                    'email_driver' => $userEmail,
                    'nameContact_emergency' => $nameContact,
                    'fonoContact_emergency' => $fonoContact,
                    'categoria_driver' => $category,
                    'country_driver' => $country,
                    'archivo_driver' => $filePath
                ];
                
                if($pilotoModel->addUsuario($data)){
                    $file->move(FCPATH . 'jabali/', $fileName);

                    session()->setFlashdata('success', 'Inscripción exitosa.');

                    $cuerpo='<h4> Hola </h4>';
                    $cuerpo.='<p> Mensaje para avisar que se registro correctamente </p>';
                    $cuerpo.='<a href="https://www.jabaliextremo.cl"> WEB  </a>';
                    $emailService = service('email');
            
                    $emailService->setFrom('info@jabaliextremo.cl', 'Jabaliextremo Info');
                    $emailService->setTo($userEmail);
                    $emailService->setCC('tesorero.jabalies@gmail.com');
                    $emailService->setBCC('info@jabaliextremo.cl');
                    
                    $emailService->setSubject('Confirmacion de registro JabaliExtremo');
                    $emailService->setMessage($cuerpo);
                    $emailService->attach(FCPATH . 'jabali/' . $fileName, 'attachment', $fileName);

                   // $email->setAltMessage('Mensaje para avisar sobre el registro');
                    
                    if ($emailService->send())
                    {
                        echo "CORREO ENVIADO";
                        $emailService->printDebugger(['headers']);
                    }else{
                        echo "no se ha enviado el correo";
                    }
        
                    return redirect()->to(base_url('tabla/vista'));
                }
            }
        }
    }
}
