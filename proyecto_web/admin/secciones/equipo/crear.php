<?php 
include("../../db.php");


if($_POST){
    //recepcion de datos
    $imagen=(isset($_FILES['imagen']["name"]))? $_FILES['imagen']["name"]:"";
    $nombre_completo=(isset($_POST['nombre_completo']))?$_POST['nombre_completo']:"";
    $puesto=(isset($_POST['puesto']))?$_POST['puesto']:"";
    $x=(isset($_POST['x']))?$_POST['x']:"";
    $facebook=(isset($_POST['facebook']))?$_POST['facebook']:"";
    $linkedin=(isset($_POST['linkedin']))?$_POST['linkedin']:"";
    
    
    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen = ($imagen!=""? $fecha_imagen->getTimestamp()."_".$imagen:"");
    $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    if ($tmp_imagen!="") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/team/".$nombre_archivo_imagen);
    }
    
    $sentecia=$conexion->prepare("INSERT INTO `tbl_equipo` (`id`, `imagen`, `nombre_completo`,`puesto`, `x`, `facebook`, `linkedin`) VALUES (NULL, :imagen, :nombre_completo, :puesto, :x, :facebook, :linkedin);");
    
    $sentecia->bindParam(":imagen",$nombre_archivo_imagen);
    $sentecia->bindParam(":nombre_completo",$nombre_completo);
    $sentecia->bindParam(":puesto",$puesto);
    $sentecia->bindParam(":x",$x);
    $sentecia->bindParam(":facebook",$facebook);
    $sentecia->bindParam(":linkedin",$linkedin);
    
    $sentecia->execute();
    $mensaje="registro agregado con exito!";
    header("Location:index.php?mensaje".$mensaje);
}



include("../../templaces/header.php");?>

<div class="card">
    
    <form action="" enctype="multipart/form-data" method="post">
        <div class="card-header">Datos de la persona</div>
        <div class="card-body">

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input
            type="file"
            class="form-control"
            name="imagen"
            id="imagen"
            aria-describedby="helpId"
            placeholder="imagen"
            />
        </div>
        
        <div class="mb-3">
            <label for="nombre_completo" class="form-label">Nombre completo:</label>
            <input
                type="text"
                class="form-control"
                name="nombre_completo"
                id="nombre_completo"
                aria-describedby="helpId"
                placeholder="nombre_completo"
            />
        </div>

        <div class="mb-3">
            <label for="puesto" class="form-label">Puesto:</label>
            <input
                type="text"
                class="form-control"
                name="puesto"
                id="puesto"
                aria-describedby="helpId"
                placeholder="puesto"
            />
        </div>

        <div class="mb-3">
            <label for="x" class="form-label">X:</label>
            <input
                type="text"
                class="form-control"
                name="x"
                id="x"
                aria-describedby="helpId"
                placeholder="x"
            />
        </div>

        <div class="mb-3">
            <label for="facebook" class="form-label">facebook:</label>
            <input
                type="text"
                class="form-control"
                name="facebook"
                id="facebook"
                aria-describedby="helpId"
                placeholder="facebook"
            />
        </div>

        <div class="mb-3">
            <label for="linkedin" class="form-label">linkedin:</label>
            <input
                type="text"
                class="form-control"
                name="linkedin"
                id="linkedin"
                aria-describedby="helpId"
                placeholder="linkedin"
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