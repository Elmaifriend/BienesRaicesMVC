<main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>
        <?php include __DIR__ ."/nosotros.php"?>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en venta</h2>
        
        <?php 
            $limite = 3;
            require __DIR__ . "/listado.php"; 
        ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section> <!--Fin imagen contacto-->


    <div class="contenedor seccion seccion-inferior">
        <div>
            <section class="blog">
                <h3>Nuestro Blog</h3>
            </section>
            <article class="entrada-blog">
                <div class="imagen">
                    <img loading="lazy" src="/img/blog1.jpg" alt="Texto entrada blog">   
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article> <!--Fin Entrada-->
    
            <article class="entrada-blog">
                <div class="imagen">
                    <img loading="lazy" src="/img/blog2.jpg" alt="Texto entrada blog"> 
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article> <!--Fin Entrada-->
        </div>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Juan De La Torre</p>
            </div>
        </section>
        
    </div> <!--Fin de blog-->