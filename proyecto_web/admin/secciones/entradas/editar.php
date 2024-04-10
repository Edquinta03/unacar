<?php 
include("../../db.php");

if(isset($_GET['txtid']) ){
    // recuperar la informacion registro con el id (seleccionado)
   
   $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";
   
   $sentecia=$conexion->prepare("SELECT * FROM tbl_entrada WHERE id=:id");
   $sentecia->bindParam(":id",$txtid);
   $sentecia->execute();
   $registro=$sentecia->fetch(PDO::FETCH_LAZY);
   
    $fecha=$registro['fecha'];
    $titulo=$registro['titulo']; 
    $descripcion=$registro['descripcion'];
    $imagen=$registro['imagen'];

}  

if($_POST){
    //recepcion de datos
$txtid = isset($_POST['txtid'])?$_POST['txtid']:"";
$fecha = isset($_POST['fecha'])?$_POST['fecha']:""; 
$titulo = isset($_POST['titulo'])?$_POST['titulo']:"";
$descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";

$sentecia=$conexion->prepare("UPDATE `tbl_entrada`
    SET  
    fecha=:fecha,
    titulo=:titulo, 
    descripcion=:descripcion
    WHERE id=:id");

$sentecia->bindParam(":id",$txtid);
$sentecia->bindParam(":fecha",$fecha);
$sentecia->bindParam(":titulo",$titulo);
$sentecia->bindParam(":descripcion",$descripcion);

$sentecia->execute();
$mensaje = "registro modificado con exito!";
header("Location:index.php?mensaje=".$mensaje);
    // ELIMINAR IMAGEN DEL REPERTORIO
    if (!empty($_FILES['imagen']["name"])) {
        $imagen = $_FILES['imagen'];
        $fecha_imagen = new DateTime();
        $nombre_archivo_imagen = $fecha_imagen->getTimestamp()."_".$imagen["name"];
        
        $tmp_imagen = $imagen["tmp_name"];
    
        move_uploaded_file($tmp_imagen, "../../../assets/img/about/".$nombre_archivo_imagen);
        
        // Borrado del archivo anterior
        $sentencia = $conexion->prepare("SELECT imagen FROM tbl_entrada WHERE id=:id");
        $sentencia->bindParam(":id", $txtid);
        $sentencia->execute();
        $registro_imagen = $sentencia->fetch(PDO::FETCH_ASSOC);
        
        if (!empty($registro_imagen["imagen"]) && file_exists("../../../assets/img/about/".$registro_imagen["imagen"])) {
            unlink("../../../assets/img/about/".$registro_imagen["imagen"]);
        }
        
        $sentencia = $conexion->prepare("UPDATE `tbl_entrada` SET imagen=:imagen WHERE id=:id");
        $sentencia->bindParam(":id", $txtid);
        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->execute();
        $imagen=$nombre_archivo_imagen;
    }

}

include("../../templaces/header.php");?>

<div class="card">
    <div class="card-header">Entradas</div>
    <div class="card-body">

    <form action="" method="post" enctype="multipart/form-data">

<div class="mb-3">
    <label for="txtid" class="form-label">Id:</label>
    <input readonly
        type="text"
        class="form-control"
        value="<?php echo $txtid;?>"
        name="txtid"
        id="txtid"
        aria-describedby="helpId"
        placeholder="txtid"
    />
</div> 

    <div class="mb-3">
            <label for="fecha" class="form-label">fecha:</label>
            <input
                type="date"
                class="form-control"
                value="<?php echo $fecha;?>"
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
                value="<?php echo $titulo;?>"
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
                value="<?php echo $descripcion;?>"
                name="descripcion"
                id="descripcion"
                aria-describedby="helpId"
                placeholder="descripcion"
            />
        </div>
        <div class="mb-3">
        <label for="imagen" class="form-label">Imagen:</label>
        <img width="50" src="../../../assets/img/about/<?php echo $imagen; ?>" alt="">
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
        Actualizar
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