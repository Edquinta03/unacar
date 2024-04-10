<?php 
include("../../db.php");


//selecciona todo la tabla de portalio
$sentecia=$conexion->prepare("SELECT * FROM `tbl_entrada`");
$sentecia->execute();
$lista_entrada= $sentecia->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET['txtid']) ){
    // eliminar la informacion registro con el id (seleccionado)
$txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";

$sentecia=$conexion->prepare("SELECT imagen FROM tbl_entrada WHERE id=:id");
$sentecia->bindParam(":id",$txtid);
$sentecia->execute();
$registro_imagen = $sentecia->fetch(PDO::FETCH_LAZY);

if (isset($registro_imagen["imagen"])) {
    if (file_exists("../../../assets/img/about/".$registro_imagen["imagen"])) {
        unlink("../../../assets/img/about/".$registro_imagen["imagen"]);
    }
}


$sentecia=$conexion->prepare("DELETE FROM tbl_entrada WHERE id=:id");
$sentecia->bindParam(":id",$txtid);
$sentecia->execute();

}


include("../../templaces/header.php");?>

<div class="card">
    <div class="card-header"><a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar registro</a
    ></div>
    <div class="card-body">

    <div
        class="table-responsive-sm"
    >
        <table
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">fecha</th>
                    <th scope="col">titulo</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">imagen</th>
                    <th scope="col">acciones</th>
                </tr>
            </thead>
            <tbody>
            <?PHP  foreach($lista_entrada as $resgistros){ ?>
                <tr class="">
                    <td><?php echo $resgistros['id']?></td>
                    <td><?php echo $resgistros['fecha']?></td>
                    <td><?php echo $resgistros['titulo']?></td>
                    <td><?php echo $resgistros['descripcion']?></td>
                    <td>
                    <img width="50" src="../../../assets/img/about/<?php echo $resgistros['imagen']; ?>" alt="">
                    </td>
                    <td>
                    <a
                        name=""
                        id=""
                        class="btn btn-info"
                        href="editar.php?txtid=<?php echo $resgistros['id']; ?>"
                        role="button"
                        >Editar</a>
                        |
                        <a
                        name=""
                        id=""
                        class="btn btn-danger"
                        href="index.php?txtid=<?php echo $resgistros['id']; ?>"
                        role="button"
                        >Eliminar</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    

    </div>
    <div class="card-footer text-muted"></div>
</div>









<?php include("../../templaces/footer.php");?>