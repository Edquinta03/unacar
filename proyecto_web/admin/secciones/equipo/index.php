<?php 
include("../../db.php");

//selecciona todo la tabla de equipo
$sentecia=$conexion->prepare("SELECT * FROM `tbl_equipo`");
$sentecia->execute();
$lista_equipo= $sentecia->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET['txtid']) ){
    // eliminar la informacion registro con el id (seleccionado)
$txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";

$sentecia=$conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id");
$sentecia->bindParam(":id",$txtid);
$sentecia->execute();
$registro_imagen = $sentecia->fetch(PDO::FETCH_LAZY);

if (isset($registro_imagen["imagen"])) {
    if (file_exists("../../../assets/img/team/".$registro_imagen["imagen"])) {
        unlink("../../../assets/img/team/".$registro_imagen["imagen"]);
    }
}

$sentecia=$conexion->prepare("DELETE FROM tbl_equipo WHERE id=:id");
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
        >Agregar registro</a></div>
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
                    <th scope="col">imagen</th>
                    <th scope="col">nombre</th>
                    <th scope="col">puesto</th>
                    <th scope="col">redes sociales</th>
                    <th scope="col">acciones</th>
                </tr>
            </thead>
            <tbody>
        <?PHP  foreach($lista_equipo as $resgistros){ ?>

                <tr class="">
                    <td><?php echo $resgistros['id']?></td>
                    <td>
                    <img width="50" src="../../../assets/img/team/<?php echo $resgistros['imagen']; ?>" alt="">
                    </td>
                    <td><?php echo $resgistros['nombre_completo']?></td>
                    <td><?php echo $resgistros['puesto']?></td>
                    <td>
                    <?php echo $resgistros['x']?>
                <br/><?php echo $resgistros['facebook']?>
                <br/><?php echo $resgistros['linkedin']?>
                    </td>
                    <td>
                    <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="editar.php?txtid=<?php echo $resgistros['id']; ?>"
                            role="button"
                            >Editar</a
                        >
                        |
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="index.php?txtid=<?php echo $resgistros['id']; ?>"
                            role="button"
                            >Eliminar</a
                        >
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