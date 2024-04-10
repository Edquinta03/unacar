<?php 
include("../../db.php");


if ($_POST) {
    $fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $imagen=(isset($_FILES['imagen']["name"]))? $_FILES['imagen']["name"]:"";

    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen = ($imagen!=""? $fecha_imagen->getTimestamp()."_".$imagen:"");
    $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    if ($tmp_imagen!="") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/about/".$nombre_archivo_imagen);
    }

    $sentecia=$conexion->prepare("INSERT INTO `tbl_entrada` (`id`, `fecha`,`titulo`,`descripcion`,`imagen` ) VALUES (NULL, :fecha,:titulo, :descripcion,:imagen );");
    
    $sentecia->bindParam(":fecha",$fecha);
    $sentecia->bindParam(":titulo",$titulo);
    $sentecia->bindParam(":descripcion",$descripcion);
    $sentecia->bindParam(":imagen",$nombre_archivo_imagen);

    $sentecia->execute();
}


include("../../templaces/header.php");?>

<div class="card">
    <div class="card-header">Entradas</div>
    <div class="card-body">

    <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
            <label for="fecha" class="form-label">fecha:</label>
            <input
                type="date"
                class="form-control"
                name="fecha"
                id="fecha"
                aria-describedby="helpId"
                placeholder="fecha"
            />
        </div>
        <div class="mb-3">
            <label for="titulo" class="form-label">titulo:</label>
            <input
                type="text"
                class="form-control"
                name="titulo"
                id="titulo"
                aria-describedby="helpId"
                placeholder="titulo"
            />
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">descripcion:</label>
            <input
                type="text"
                class="form-control"
                name="descripcion"
                id="descripcion"
                aria-describedby="helpId"
                placeholder="descripcion"
            />
        </div>
        <div class="mb-3">
        <label for="imagen" class="form-label">Imagen:</label>
        <input
            type="file"
            class="form-control"
            name="imagen"
            id="imagen"
            placeholder="imagen"
            aria-describedby="fileHelpId"
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
        >cancelar</a
    >
    </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>






<?php include("../../templaces/footer.php");?>