
<div class="contenedor-anuncio">
    <!-- iterar en la BD -->
    <?php foreach ($propiedades as $propiedad) { ?>
    <div class="anuncio">
                    <picture>
                        <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen ;?>" alt="Anuncio">
                    </picture>
        
                 <div class="contenido-anuncio">
                        <h3> <?php echo $propiedad->titulo ;?> </h3>
                            <p><?php echo $propiedad->descripcion ;?></p>
                                <p class="precio"><?php echo $propiedad->precio; ?></p>
                             <ul class="iconos-caracteristicas">
                                <li>
                                    <img class="iconoAnuncios" loading="lazy" src="build/img/icono_wc.svg" alt="Baños">
                                    <p><?php echo $propiedad->baños; ?></p>
                                </li><!--fin icono-->
                                <li>
                                    <img class="iconoAnuncios" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Habitaciones">
                                    <p><?php echo $propiedad->habitaciones; ?></p>
                                </li><!--fin icono-->
                                <li>
                                    <img class="iconoAnuncios" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Garage">
                                    <p><?php echo $propiedad->estacionamiento; ?></p>
                                </li><!--fin icono-->
                            </ul>
                        <a href="/propiedad?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Ver propiedad</a>
                 </div> <!--fin contenido anuncio-->
            </div> <!--fin anuncio-->
    <!-- finalizar iteracion  -->
<?php } ?>

</div> <!--fin contenedor anuncio-->