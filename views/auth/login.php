<main class="contenedor seccion full-h">
    <div>

        <h1>Iniciar Sesion</h1>

        <?php foreach ( $errores as $error ): ?>
        <p class="alerta error"> <?php echo $error; ?> </p>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/login">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail:</label>
                <input type="email" placeholder="Tu Email:" id="email" name="correo">

                <label for="contrasenia">Contrasenia:</label>
                <input type="password" placeholder="Tu Contrasenia:" id="contrasenia" name="contrasenia">
            </fieldset>

            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>

    </div>    

</main>