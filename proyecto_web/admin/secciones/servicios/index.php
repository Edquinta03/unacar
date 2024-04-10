<?php 
include("../../db.php");

if( isset($_GET['txtid']) ){
 // borra registro con el id 

$txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";

$sentecia=$conexion->prepare("DELETE FROM tbl_servicios WHERE id=:id");
$sentecia->bindParam(":id",$txtid);
$sentecia->execute();
 }


//selecciona todo la tabla de servicios
$sentecia=$conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentecia->execute();
$lista_servicios= $sentecia->fetchAll(PDO::FETCH_ASSOC);



include("../../templaces/header.php");?>
<div class="card">
    <div class="card-header"> <a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar registro</a
    >
</div>
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
                    <th scope="col">icono</th>
                    <th scope="col">titulo</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">accion</th>
                </tr>
            </thead>
            <tbody>
                <?PHP  foreach($lista_servicios as $resgistros){ ?>
                    <tr class="">
                        <td> <?php echo $resgistros['id']?> </td>
                        <td> <?php echo $resgistros['icono']?> </td>
                        <td> <?php echo $resgistros['titulo']?> </td>
                        <td> <?php echo $resgistros['descripcion']?> </td>
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
</div>



<?php include("../../templaces/footer.php");?>