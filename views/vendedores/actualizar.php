<main class="contenedor seccion">
        <h3>Actualizar vendedor</h3>

            <a href="/admin" class="boton boton-amarillo">Volver</a>
            
            <!-- mostrar errores  -->

            <?php foreach($errores as $error): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

              <!-- formulario -->
        <form class="formulario" method="POST" >

                    <?php include 'formulario.php'; ?>

        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">

        </form>

   </main>
