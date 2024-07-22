<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>


    <?php 
        $mensaje = mostrarNotificacion( intval( $alert_type ));
        if( $mensaje ){ ?>
            <p class="alerta exito"><?php echo $mensaje ?> </p>
    <?php } ?>
    
    <h2> Propiedades </h2>

    <a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
    <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo(a) vendedor</a>


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
        <tbody>
            <?php foreach( $propiedades as $propiedad ): ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td><img class="imagen-tabla" src="imagenes/<?php echo $propiedad->imagen ?>"></td>
                <td><?php echo $propiedad->precio ?></td>
                <td>
                    <form method="post" action="/propiedades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2> Vendedores </h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Registrado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $vendedores as $vendedor ): ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre; ?></td>
                <td><?php echo $vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td><?php echo $vendedor->creado; ?></td>
                <td>
                    <form method="post" action="/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>