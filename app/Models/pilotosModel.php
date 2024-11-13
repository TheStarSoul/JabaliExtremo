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
            'country_driver'
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
            'country_driver' => 'required|regex_match[/^[a-zA-Z ]+$/]'
        ];

        protected $validationMessages = [
            'name_driver' => [
                'required' => 'El nombre de usuario es obligatorio',
                'min_length' => 'El minimo de caracteres es de 6 letras',
                'max_length' => 'El maximo de caracteres es de 30 letras',
                'regex_match' => 'El nombre no puede contener números o caracteres especiales'
            ],
            'lastname_driver' => [
                'required' => 'El correo es obligatorio',
                'min_length' => 'El minimo de caracteres es de 6 letras',
                'max_length' => 'El maximo de caracteres es de 30 letras',
                'regex_match' => 'El nombre no puede contener números o caracteres especiales'
            ],
            'dni_driver' => [
                'required' => 'El contraseña es obligatoria'
            ],
            'fono_driver' => [
                'required' => 'El contraseña es obligatoria'
            ],
            'number_driver' => [
                'required' => 'El contraseña es obligatoria'
            ],
            'email_driver' => [
                'required' => 'El contraseña es obligatoria'
            ],
            'nameContact_emergency' => [
                'required' => 'El nombre de usuario es obligatorio',
                'min_length' => 'El minimo de caracteres es de 6 letras',
                'max_length' => 'El maximo de caracteres es de 30 letras',
                'regex_match' => 'El nombre no puede contener números o caracteres especiales'
            ],
            'fonoContact_emergency' => [
                'required' => 'El contraseña es obligatoria'
            ],
            'categoria_driver' => [
                'required' => 'El contraseña es obligatoria'
            ],
            'country_driver' => [
                'required' => 'El nombre de usuario es obligatorio',
                'regex_match' => 'El nombre no puede contener números o caracteres especiales'
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