<?php 
include("../../db.php");

if($_POST){
    //recepcion de datos
    $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $password=(isset($_POST['password']))?$_POST['password']:"";
    $correo=(isset($_POST['correo']))?$_POST['correo']:"";
    
    $sentecia=$conexion->prepare("INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `correo`) VALUES (NULL, :usuario, :password, :correo);");
    
    $sentecia->bindParam(":usuario",$usuario);
    $sentecia->bindParam(":password",$password);
    $sentecia->bindParam(":correo",$correo);
    
    $sentecia->execute();
    $mensaje="registro agregado con exito!";
    header("Location:index.php?mensaje".$mensaje);
}

include("../../templaces/header.php");?>

<div class="card">
    <div class="card-header">nuevo usuario</div>
    <div class="card-body">

<form action="" method="post">

    <div class="mb-3">
        <label for="usuario" class="form-label">usuario</label>
        <input
            type="text"
            class="form-control"
            name="usuario"
            id="usuario"
            aria-describedby="helpId"
            placeholder="usuario"
        />
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input
            type="password"
            class="form-control"
            name="password"
            id="password"
            aria-describedby="helpId"
            placeholder="password"
        />
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">correo</label>
        <input
            type="email"
            class="form-control"
            name="correo"
            id="correo"
            aria-describedby="helpId"
            placeholder="correo"
        />
    </div>
    <button
        type="submit"
        class="btn btn-success"
    >
        Agregar
    </button>
    <a
        name=""
        id=""
        class="btn btn-primary"
        href="index.php"
        role="button"
        >cancelar</a>

</form>

    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templaces/footer.php");?>