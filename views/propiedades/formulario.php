<fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo: </lable>
            <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad" value="<?php echo $propiedad->titulo; ?>">

            <label for="precio">Precio: </lable>
            <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" value="<?php echo $propiedad->precio; ?>">

            <label for="imagen">Imagen: </lable>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]"> 

            <?php if( $propiedad->imagen ): ?>
                <img src="<?php echo "/imagenes/" . $propiedad->imagen; ?>" class="img-small">
            <?php endif; ?>

            <label for="descripcion">Descripcion: </label>
            <textarea id="descripcion" name="propiedad[descripcion]"><?php echo $propiedad->descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="habitaciones">Habitaciones: </label>
            <input type="text" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" value="<?php echo $propiedad->habitaciones; ?>">

            <label for="wc">Baños: </label>
            <input type="text" id="wc" name="propiedad[wc]" placeholder="Ej: 3"  value="<?php echo $propiedad->wc; ?>">

            <label for="estacionamientos">Estacionamientos: </label>
            <input type="text" id="estacionamientos" name="propiedad[estacionamientos]" placeholder="Ej: 3" value="<?php echo $propiedad->estacionamientos; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="propiedad[vendedor_id]">
                <option value=""> -- Seleccine -- </option>
                <?php foreach( $vendedores as $vendedor ): ?>
                    <option <?php echo ($propiedad->vendedor_id === $vendedor->id) ? "selected" : "";?> value="<?php echo $vendedor->id; ?>"> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </option>
                <?php endforeach; ?>
            </select>
        </fieldset>