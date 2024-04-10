<?php 
include("../../templaces/header.php");
include("../../db.php");

if($_POST){
    //recepcion de datos
    $icono=(isset($_POST['icono']))?$_POST['icono']:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

    $sentecia=$conexion->prepare("INSERT INTO `tbl_servicios` (`id`, `icono`, `titulo`, `descripcion`) VALUES (NULL, :icono, :titulo, :descripcion);");
    
    $sentecia->bindParam(":icono",$icono);
    $sentecia->bindParam(":titulo",$titulo);
    $sentecia->bindParam(":descripcion",$descripcion);

    $sentecia->execute();
 
    $mensaje="registro agregado con exito!";
    header("Location:index.php?mensaje".$mensaje);
}

?>


<div class="card">
    <div class="card-header">Crear servicio</div>
    
    <div class="card-body">

    <form action="" enctype="multipart/form-data" method="post">

   <div class="mb-3">
    <label for="icono" class="form-label">icono</label>
    <input
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
        <label for="descripcion" class="form-label">descripcion</label>
        <input
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
    <div class="card-footer text-muted">

    </div>
</div>



<?php include("../../templaces/footer.php");?>