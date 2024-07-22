<main class="contenedor seccion">
    <h1>Contacto</h1>

    <img loading="lazy" src="/img/destacada3.jpg" alt="imagen de contacto">

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Informacion personal</legend>

            <label for="nombre">Nombre:</label>
            <input required type="text" placeholder="Tu Nombre:" id="nombre" name="contacto[nombre]>

            <label for="email">E-mail:</label>
            <input required type="email" placeholder="Tu Email:" id="email" name="contacto[email]">

            <label for="telefono">Telefono:</label>
            <input type="tel" placeholder="Tu Telefono:" id="telefono" name="contacto[telefono]">

            <label for="mensaje">Mensaje:</label>
            <textarea required id="mensaje" name="contacto[mensaje]"></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="opciones"> Vende o Compra:</label>
            <select required id="opciones" name="contacto[opciones]">
                <option value="" disabled selected>-- Seleccione -- </option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto:</label>
            <input required type="number" placeholder="Precio o Presupuesto:" id="presupuesto" name="contacto[presupuesto]">
        </fieldset>

        <fieldset>
            <legend>Contacto:</legend>

            <p>Como desea ser contactado:</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input required name="contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]">

                <label for="contactar-email">E-mail</label>
                <input required name="contacto" type="radio" value="email" id="contactar-email" name="contacto[contacto]">
            </div>

            <p>Si eligio telefono, elija la fecha y la hora</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" name="contacto[hora]">
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>