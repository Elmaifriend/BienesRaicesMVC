
<fieldset>
    
    <legend>Informacion General</legend>

    <label for="nombre">Nombre: </lable>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre del vendedor" value="<?php echo $vendedor->nombre; ?>">

    <label for="apellido">Apellido: </lable>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido del vendedor" value="<?php echo $vendedor->apellido; ?>">
</fieldset>

<fieldset>
    <legend>Informacion extra</legend>

    <label for="telefono">Telefono: </lable>
    <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Telefono del vendedor" value="<?php echo $vendedor->telefono; ?>">

</fieldset>