<?php 
include("../../db.php");

if(isset($_GET['txtid']) ){
    // recuperar la informacion registro con el id (seleccionado)
   
   $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";
   
   $sentecia=$conexion->prepare("SELECT * FROM tbl_equipo WHERE id=:id");
   $sentecia->bindParam(":id",$txtid);
   $sentecia->execute();
   $registro=$sentecia->fetch(PDO::FETCH_LAZY);
   
   $imagen=$registro['imagen'];
    $nombre_completo=$registro['nombre_completo'];
    $puesto=$registro['puesto']; 
    $x=$registro['x'];
    $facebook=$registro['facebook'];
    $linkedin=$registro['linkedin'];
}  

if($_POST){
    //recepcion de datos
$txtid = isset($_POST['txtid'])?$_POST['txtid']:"";
$nombre_completo = isset($_POST['nombre_completo'])?$_POST['nombre_completo']:""; 
$puesto = isset($_POST['puesto'])?$_POST['puesto']:"";
$x = isset($_POST['x'])?$_POST['x']:"";
$facebook = isset($_POST['facebook'])?$_POST['facebook']:"";
$linkedin = isset($_POST['linkedin'])?$_POST['linkedin']:"";

$sentecia=$conexion->prepare("UPDATE `tbl_equipo`
    SET  
    nombre_completo=:nombre_completo,
    puesto=:puesto, 
    x=:x,
    facebook=:facebook,
    linkedin=:linkedin
    WHERE id=:id");

$sentecia->bindParam(":id",$txtid);
$sentecia->bindParam(":nombre_completo",$nombre_completo);
$sentecia->bindParam(":puesto",$puesto);
$sentecia->bindParam(":x",$x);
$sentecia->bindParam(":facebook",$facebook);
$sentecia->bindParam(":linkedin",$linkedin);

$sentecia->execute();
$mensaje = "registro modificado con exito!";
header("Location:index.php?mensaje=".$mensaje);
    // ELIMINAR IMAGEN DEL REPERTORIO
    if (!empty($_FILES['imagen']["name"])) {
        $imagen = $_FILES['imagen'];
        $fecha_imagen = new DateTime();
        $nombre_archivo_imagen = $fecha_imagen->getTimestamp()."_".$imagen["name"];
        
        $tmp_imagen = $imagen["tmp_name"];
    
        move_uploaded_file($tmp_imagen, "../../../assets/img/team/".$nombre_archivo_imagen);
        
        // Borrado del archivo anterior
        $sentencia = $conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id");
        $sentencia->bindParam(":id", $txtid);
        $sentencia->execute();
        $registro_imagen = $sentencia->fetch(PDO::FETCH_ASSOC);
        
        if (!empty($registro_imagen["imagen"]) && file_exists("../../../assets/img/team/".$registro_imagen["imagen"])) {
            unlink("../../../assets/img/team/".$registro_imagen["imagen"]);
        }
        
        $sentencia = $conexion->prepare("UPDATE `tbl_equipo` SET imagen=:imagen WHERE id=:id");
        $sentencia->bindParam(":id", $txtid);
        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->execute();
        $imagen=$nombre_archivo_imagen;
    }

}



include("../../templaces/header.php");?>



<div class="card">
    
    <form action="" enctype="multipart/form-data" method="post">
        <div class="card-header">Datos de la persona</div>
        <div class="card-body">

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
            <label for="imagen" class="form-label">Imagen</label>
            <img width="50" src="../../../assets/img/team/<?php echo $imagen; ?>" alt="">
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
                value="<?php echo $nombre_completo;?>"
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
                value="<?php echo $puesto;?>"
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
                value="<?php echo $x;?>"
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
                value="<?php echo $facebook;?>"
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
                value="<?php echo $linkedin;?>"
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