<main class="contenedor contenido-centrado">
        <h3>Iniciar Sesión</h3>

        <!-- mostrar errores  -->

        <?php foreach($errores as $error): ?>
            <div  class=" alerta error">
                <?php echo $error ;?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/login">
        <fieldset>
                <legend>E-mail & Password</legend>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu mail" id="email" name="email" >

                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Tu Password" name="password" >

            </fieldset>

            <input class="boton boton-verde" type="submit" value="Iniciar Sesión">
        </form>


   </main>
