
<main class="contenedor">
        <h3>Administrador de Bienes Raices</h3>
        <?php
        if($resultado){
        $mensaje=mostrarNotifiacion( intval($resultado) );//intval transforma el string en entero
        if($mensaje) { ?>
        <p class="alerta verde"><?php echo s($mensaje) ; ?></p>
          <?php }
            }
         ?>

        <a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
        <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo Vendedor</a>

        <h2>Propiedades</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        <tbody><!-- Mostrar los resultados de la BD-->

            <?php foreach( $propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img class="imagenTabla" src= '../imagenes/<?php echo $propiedad->imagen; ?>' alt="Imagen propiedad"></td>
                    <td><?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/propiedades/actualizar?id=<?php echo $propiedad->id ; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        <tbody><!-- Mostrar los resultados de la BD-->

            <?php foreach( $vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre ." ". $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/vendedores/actualizar?id=<?php echo $vendedor->id ; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</main>