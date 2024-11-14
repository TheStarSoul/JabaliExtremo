        <div class="container my-5">
        <h2 class="text-center mb-4">Tabla</h2>
            <?php if (!empty($success)): ?>
                <div class="alert alert-success">
                    <?= esc($success); ?>
                </div>
            <?php endif; ?>
        <!-- Tabla básica con clases de Bootstrap -->
            <div class="table-responsive">
            
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Telefono</th>
                            <th>Número de competición</th>
                            <th>Correo</th>
                            <th>Categoria</th>
                            <th>Ciudad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><?= esc($data['piloto']['name_driver'])?></td>
                            <td><?= esc($data['piloto']['lastname_driver'])?></td>
                            <td><?= esc($data['piloto']['dni_driver'])?></td>
                            <td><?= esc($data['piloto']['fono_driver'])?></td>
                            <td><?= esc($data['piloto']['number_driver'])?></td>
                            <td><?= esc($data['piloto']['email_driver'])?></td>
                            <td><?= esc($data['piloto']['categoria_driver'])?></td>
                            <td><?= esc($data['piloto']['country_driver'])?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre del contacto de emergencia</th>
                            <th>Telefono del contacto de emergencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= esc($data['piloto']['nameContact_emergency'])?></td>
                            <td><?= esc($data['piloto']['fonoContact_emergency'])?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
