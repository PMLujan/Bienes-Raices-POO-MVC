<fieldset>
            <legend>Información Vendedor</legend>

                <label for="titulo">Nombre:</label>
                <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre" value="<?php echo s($vendedor->nombre); ?>">

                <label for="titulo">Apellido:</label>
                <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido" value="<?php echo s($vendedor->apellido); ?>">

                <label for="titulo">Teléfono:</label>
                <input type="tel" id="titulo" name="vendedor[telefono]" placeholder="Teléfono" value="<?php echo s($vendedor->telefono); ?>">

</fieldset>