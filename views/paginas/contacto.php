
<main class="contenedor contenido-centrado">
    <h1>Contactanos</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="image/jpeg">
        </picture>
    <h2>Llene el formulario de contacto</h2>
    <form class="formulario" action="/contacto" method="post">
        <fieldset>
            <legend>Datos personales</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required requiered>

                <label for="mensaje">Mensaje</label>
                <textarea placeholder="Mensaje" id="mensaje" name="contacto[mensaje]" required requiered></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>
            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto[tipo]" requiered>
                <option value="" disabled selected> --Seleccione-- </option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Precio o presupuesto" id="presupuesto" name="contacto[precio]" requiered>

        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contacto-telefono">Teléfono</label>
                    <input type="radio" value="telefono" id="contacto-telefono" name="contacto[contacto]" requiered>

                    <label for="contacto-email">E-mail</label>
                    <input type="radio" value="email" id="contacto-email" name="contacto[contacto]" requiered>
                </div>

                <!-- muestra con js el metodo de contacto -->
                <div id="contacto"></div>
        </fieldset>

        <?php if($mensaje){ ?>
            <p class="alerta verde" ><?php echo $mensaje ;?></p>
        <?php } ?>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>

   </main>
