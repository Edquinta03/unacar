<?php 
include("../../db.php");

//selecciona todo la tabla de usuario
$sentecia=$conexion->prepare("SELECT * FROM `tbl_usuarios`");
$sentecia->execute();
$lista_usuarios= $sentecia->fetchAll(PDO::FETCH_ASSOC);

if( isset($_GET['txtid']) ){
    // borra registro con el id 
   $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";
   
   $sentecia=$conexion->prepare("DELETE FROM tbl_usuarios WHERE id=:id");
   $sentecia->bindParam(":id",$txtid);
   $sentecia->execute();
   $mensaje="registro elimino con exito!";
    header("Location:index.php?mensaje".$mensaje);
    }

include("../../templaces/header.php");?>

<div
    class="table-responsive-sm"
>

<div class="card">
    <div class="card-header"> <a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar registro</a> </div>
    <div class="card-body">
        
        <table
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">usuario</th>
                    <th scope="col">password</th>
                    <th scope="col">correo</th>
                    <th scope="col">acciones</th>
                </tr>
            </thead>
            <tbody>
            <?PHP  foreach($lista_usuarios as $resgistros){ ?>
                <tr class="">
                    <td><?php echo $resgistros['id']?></td>
                    <td><?php echo $resgistros['usuario']?></td>
                    <td><?php echo $resgistros['password']?></td>
                    <td><?php echo $resgistros['correo']?></td>
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
    <div class="card-footer text-muted"></div>
</div>



</div>


<?php include("../../templaces/footer.php");?>