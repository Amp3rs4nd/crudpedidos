<!DOCTYPE html >
    <header> 
	   <!-- Custom fonts for this theme -->
        <meta charset="utf-8">
        <title>Pedido</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Theme CSS -->
        <link href="css/freelancer.min.css" rel="stylesheet">

		 <!-- Navigation -->
    <?php
      include("navegacion.php");
    ?>
</header>
 
<div class="bg-ligth"><br><br>
	<div class="container masthead">		
		<h2 class="text-secondary ">Detalles de pedidos</h2>
	    <div class="well well-small text-center">
        <table class="table">
            <thead>
                <tr>
                    <th>ID de pedido</th>
                    <th>Pan</th>
                    <th>Salsa</th>
                    <th>Ingrediente</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
            <?php
                require "conexion.php";
                session_start();
                $user = $_SESSION['iduser'];
                  $sql = "SELECT idpedido, nombre_p, nombre_s, nombre_i, preciof
                          FROM pedido 
                          INNER JOIN panes ON panes.id_p=pedido.idpan
                          INNER JOIN salsas ON salsas.id_s=pedido.idsalsa
                          INNER JOIN ingredientes ON ingredientes.id_i=pedido.idingrediente
                          WHERE iduser= $user";
				        $query=mysqli_query($conexion,$sql);
                $row = mysqli_fetch_array($query);
                while($row= mysqli_fetch_array($query)){?>
                  <tr>
                    <td><?php echo $row['idpedido']?></td>
                    <td><?php echo $row['nombre_p']?></td>
                    <td><?php echo $row['nombre_s']?></td>
                    <td><?php echo $row['nombre_i']?></td>
                    <td><?php echo $row['preciof']?></td>
                  </tr>
                <?php } 
                ?>
            </tbody>
        </table>
	</div>
</div>

  <!-- Footer -->
  <?php
  include "footer.php"
  ?>
  
  </body>
</html>