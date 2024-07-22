
<div class="contenedor-anuncios">
    <?php foreach( $propiedades as $propiedad ) : ?>

        <div class="anuncio">

            <img src="<?php echo "imagenes/" . $propiedad->imagen; ?>" class="img-anuncio" alt="anuncio" loading="lazy">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo;?></h3>
                <p><?php echo $propiedad->descripcion;?></p>
                <p class="precio"><?php echo $propiedad->precio;?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad->wc;?></p>
                    </li>

                    <li>
                        <img class="icono"  loading="lazy" src="/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad->estacionamientos;?></p>
                    </li>

                    <li>
                        <img class="icono"  loading="lazy" src="/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $propiedad->habitaciones;?></p>
                    </li>
                </ul>

                <a href="/propiedad?id=<?php echo $propiedad->id?>" class="boton boton-amarillo-block">Ver Propiedad</a>
            </div>
        </div> <!--anuncio-->
    <?php endforeach; ?>
</div> <!--Contenedor-anuncios-->
