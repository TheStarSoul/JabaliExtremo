<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/bootstrap.css" />
  </head>
  <body>
    <table class="table">
      <thead>
        <tr>
        <th scope="col">ID</th>
          <th scope="col">Names</th>
          <th scope="col">Lastnames</th>
          <th scope="col">DNI</th>
          <th scope="col">Fono</th>
          <th scope="col">Numero de piloto</th>
          <th scope="col">Email</th>
          <th scope="col">Número de contacto de emergencia</th>
          <th scope="col">Nombre de contacto de emergencia</th>
          <th scope="col">Categoria</th>
          <th scope="col">País de residencia</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td><?=esc($piloto['id_driver'])?></td>
            <td><?=esc($piloto['name_driver'])?></td>
            <td><?=esc($piloto['lastname_driver'])?></td>
            <td><?=esc($piloto['dni_driver'])?></td>
            <td><?=esc($piloto['fono_driver'])?></td>
            <td><?=esc($piloto['number_driver'])?></td>
            <td><?=esc($piloto['email_driver'])?></td>
            <td><?=esc($piloto['nameContact_emergency'])?></td>
            <td><?=esc($piloto['fonoContact_emergency'])?></td>
            <td><?=esc($piloto['categoria_driver'])?></td>
            <td><?=esc($piloto['country_driver'])?></td>
          </tr>
      </tbody>
    </table>
  </body>
</html>