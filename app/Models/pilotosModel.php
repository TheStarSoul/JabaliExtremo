<?php
    
    namespace App\Models;
    use CodeIgniter\Model;

    class pilotosModel extends Model {
        //------------------------------------------------------------------------------------
        // Datos de la tabla
        //------------------------------------------------------------------------------------

        protected $table = 'Piloto';
        protected $primaryKey = 'id_driver';

        protected $useAutoIncrement = true;

        protected $returnType = 'array';

        protected $allowedFields = [
            'name_driver', 
            'lastname_driver', 
            'dni_driver',
            'fono_driver',
            'number_driver',
            'email_driver',
            'nameContact_emergency',
            'fonoContact_emergency',
            'categoria_driver',
            'country_driver',
            'archivo_driver'
        ];

        //------------------------------------------------------------------------------------
        // Reglas de validación
        //------------------------------------------------------------------------------------

        protected $validationRules = [
            'name_driver' => 'required|min_length[6]|max_length[30]|regex_match[/^[a-zA-Z ]+$/]',
            'lastname_driver' => 'required|min_length[6]|max_length[30]|regex_match[/^[a-zA-Z ]+$/]',
            'dni_driver' => 'required',
            'fono_driver' => 'required',
            'number_driver' => 'required',
            'email_driver' => 'required',
            'nameContact_emergency' => 'required|min_length[6]|max_length[30]|regex_match[/^[a-zA-Z ]+$/]',
            'fonoContact_emergency' => 'required',
            'categoria_driver' => 'required',
            'country_driver' => 'required|regex_match[/^[a-zA-Z ]+$/]',
            'archivo_driver' => 'uploaded[archivo_driver]|max_size[archivo_driver,1024]|ext_in[archivo_driver,jpg,jpeg,png,pdf]'
        ];

        protected $validationMessages = [
            'name_driver' => [
                'required' => 'Este campo es necesario para continuar',
                'min_length' => 'El minimo de caracteres es de 6 letras',
                'max_length' => 'El maximo de caracteres es de 30 letras',
                'regex_match' => 'Solo se pueden ingresar letras, no se pueden ingresar caracteres especiales'
            ],
            'lastname_driver' => [
                'required' => 'Este campo es necesario para continuar',
                'min_length' => 'El minimo de caracteres es de 6 letras',
                'max_length' => 'El maximo de caracteres es de 30 letras',
                'regex_match' => 'Solo se pueden ingresar letras, no se pueden ingresar caracteres especiales'
            ],
            'dni_driver' => [
                'required' => 'Este campo es necesario para continuar'
            ],
            'fono_driver' => [
                'required' => 'Este campo es necesario para continuar'
            ],
            'number_driver' => [
                'required' => 'Este campo es necesario para continuar'
            ],
            'email_driver' => [
                'required' => 'Este campo es necesario para continuar'
            ],
            'nameContact_emergency' => [
                'required' => 'Este campo es necesario para continuar',
                'min_length' => 'El minimo de caracteres es de 6 letras',
                'max_length' => 'El maximo de caracteres es de 30 letras',
                'regex_match' => 'Solo se pueden ingresar letras, no se pueden ingresar caracteres especiales'
            ],
            'fonoContact_emergency' => [
                'required' => 'Este campo es necesario para continuar'
            ],
            'categoria_driver' => [
                'required' => 'Este campo es necesario para continuar'
            ],
            'country_driver' => [
                'required' => 'Este campo es necesario para continuar',
                'regex_match' => 'Solo se pueden ingresar letras, no se pueden ingresar caracteres especiales'
            ],
            'archivo_driver' => [
                'uploaded[archivo_driver]' => 'La subida del archivo es necesaria para continuar',
                'ext_in[archivo_driver,jpg,jpeg,png,pdf]' => 'La extension del archivo no esta permitida'
            ]
        ];

        //------------------------------------------------------------------------------------
        // Funciones
        //------------------------------------------------------------------------------------

        public function addUsuario($data){
            return $this->insert($data);
        }

        public function obtenerUsuario($id){
            return $this->find($id);
        }

        public function obtenerUsuarios(){
            return $this->findAll();
        }

        public function actualizarUsuario($id, $data){
            return $this->update($id, $data);
        }

        public function eliminarUsuario($id){
            return $this->delete($id);
        }
    }
?>