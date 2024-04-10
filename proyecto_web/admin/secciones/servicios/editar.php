<?php 
include("../../db.php");
include("../../templaces/header.php");


if( isset($_GET['txtid']) ){
    // recuperar la informacion registro con el id (seleccionado)
   
   $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";
   
   $sentecia=$conexion->prepare("SELECT * FROM tbl_servicios WHERE id=:id");
   $sentecia->bindParam(":id",$txtid);
   $sentecia->execute();
   $registro=$sentecia->fetch(PDO::FETCH_LAZY);

    $icono=$registro['icono'];
    $titulo=$registro['titulo'];
    $descripcion=$registro['descripcion'];
}
    if($_POST){
        //recepcion de datos
        $txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
        $icono=(isset($_POST['icono']))?$_POST['icono']:"";
        $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
        $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    
        $sentecia=$conexion->prepare("UPDATE tbl_servicios 
        SET 
        icono=:icono, 
        titulo=:titulo, 
        descripcion=:descripcion 
        WHERE id=:id");

        $sentecia->bindParam(":id",$txtid);
        $sentecia->bindParam(":icono",$icono);
        $sentecia->bindParam(":titulo",$titulo);
        $sentecia->bindParam(":descripcion",$descripcion);
        
        $sentecia->execute();
        $mensaje="registro modificado con exito!";
        header("Location:index.php?mensaje".$mensaje);
    }

?>

<div class="card">
    <div class="card-header">Editando la informacion de servicios</div>
    
    <div class="card-body">

    <form action="" enctype="multipart/form-data" method="post">

    <div class="mb-3">
        <label for="txtid" class="form-label">id:</label>
        <input readonly value=" <?php echo $txtid; ?> "
            type="text"
            class="form-control"
            name="txtid"
            id="txtid"
            aria-describedby="helpId"
            placeholder="id"
        />
    </div>
    

   <div class="mb-3">
    <label for="icono" class="form-label">icono</label>
    <input value=" <?php echo $icono; ?> "
        type="text"
        class="form-control"
        name="icono"
        id="icono"
        aria-describedby="helpId"
        placeholder="icono"
    />
   </div>
    
    <div class="mb-3">
        <label for="titulo" class="form-label">titulo</label>
        <input value=" <?php echo $titulo; ?> "
            type="text"
            class="form-control"
            name="titulo"
            id="titulo"
            aria-describedby="helpId"
            placeholder="titulo"
        />
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">descripcion</label>
        <input value=" <?php echo $descripcion; ?> "
            type="text"
            class="form-control"
            name="descripcion"
            id="descripcion"
            aria-describedby="helpId"
            placeholder="descripcion"
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
    <div class="card-footer text-muted">

    </div>
</div>



<?php include("../../templaces/footer.php");?>