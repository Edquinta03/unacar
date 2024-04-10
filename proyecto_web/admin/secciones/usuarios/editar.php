<?php 
include("../../db.php");
if( isset($_GET['txtid']) ){
    // recuperar la informacion registro con el id (seleccionado)
   
   $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";
   
   $sentecia=$conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");
   $sentecia->bindParam(":id",$txtid);
   $sentecia->execute();
   $registro=$sentecia->fetch(PDO::FETCH_LAZY);

    $usuario=$registro['usuario'];
    $password=$registro['password'];
    $correo=$registro['correo'];
}

if($_POST){
    //recepcion de datos
    $txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
    $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $password=(isset($_POST['password']))?$_POST['password']:"";
    $correo=(isset($_POST['correo']))?$_POST['correo']:"";

    $sentecia=$conexion->prepare("UPDATE tbl_usuarios 
    SET 
    usuario=:usuario, 
    password=:password, 
    correo=:correo 
    WHERE id=:id");

    $sentecia->bindParam(":id",$txtid);
    $sentecia->bindParam(":usuario",$usuario);
    $sentecia->bindParam(":password",$password);
    $sentecia->bindParam(":correo",$correo);
    
    $sentecia->execute();
    $mensaje="registro modificado con exito!";
    header("Location:index.php?mensaje".$mensaje);
}

include("../../templaces/header.php");?>

<div class="card">
    <div class="card-header">actualizar datos del usuario</div>
    <div class="card-body">

<form action="" method="post">

<div class="mb-3">
        <label for="txtid" class="form-label">id</label>
        <input
            type="text"
            readonly
            class="form-control"
            value="<?php echo $txtid;?>"
            name="txtid"
            id="txtid"
            aria-describedby="helpId"
            placeholder="txtid"
        />
    </div>
    <div class="mb-3">
        <label for="usuario" class="form-label">usuario</label>
        <input
            type="text"
            class="form-control"
            value="<?php echo $usuario;?>"
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
            value="<?php echo $password;?>"
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
            value="<?php echo $correo;?>"
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
        actualizar
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