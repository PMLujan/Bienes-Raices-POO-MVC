
<main class="contenedor">
        <h3>Más sobre nosotros</h3>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="./build/img/icono1.svg" alt="Icono seguridad">
                <h3>Seguridad</h3>
                <p>Consectetur adipisicing elit. Nulla, quis corrupti minima deserunt beatae nam recusandae maiores sit voluptate impedit dolorem explicabo earum accusamus doloribus.</p>
            </div><!--fin icono-->
            <div class="icono">
                <img src="./build/img/icono2.svg" alt="Icono precio">
                <h3>Precio</h3>
                <p>Consectetur adipisicing elit. Nulla, quis corrupti minima deserunt beatae nam recusandae maiores sit voluptate impedit dolorem explicabo earum accusamus doloribus.</p>
            </div><!--fin icono-->
            <div class="icono">
                <img src="./build/img/icono3.svg" alt="Icono tiempo">
                <h3>A tiempo</h3>
                <p>Consectetur adipisicing elit. Nulla, quis corrupti minima deserunt beatae nam recusandae maiores sit voluptate impedit dolorem explicabo earum accusamus doloribus.</p>
            </div><!--fin icono-->
        </div>
   </main>
<!--Comienzo propiedades-->
   <section class="seccion contenedor" >
       <h3> Casas y departamentos en Ventas </h3>
   
        
          <?php include 'listado.php';  ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver todas</a>
        </div>

   </section> <!--fin propiedades-->

   <section class="imagen-contacto" style="background-image: url(./build/img/encuentra.jpg);">
   
          <h2>Encuentra la casa de tus sueños</h2>
             <p>Completa el formulario y un asesor se pondra en contacto contigo a la brevedad</p>
                <a href="/contacto" class="boton-amarillo">Contactanos</a>
   </section>

   <!--COMIENZO DE BLOG-->
   <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen de blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el . <span>24/11/2022</span> por : <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorando dinero</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen de blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p>Escrito el . <span>25/11/2021</span> por : <span>Admin</span></p>
                        <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu lugar</p>
                    </a>
                </div>
            </article>
        </section>
        <!--TESTIMONIALES-->
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma,muy buena atencion y la casa que me ofrecieron cumple con todas las expectativas.
                </blockquote>
                <p>-Lujan Paredes</p>
            </div>
        </section>
   </div>
