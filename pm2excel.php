<?php
require_once('conexion.php');
$filename = "datospm2.xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=".$filename);
?>
<table>
	<thead>
		<tr> 
			<th>Valor</th>
			<th>Fecha</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$id = $_GET['idsensor'];
		$request_ac = mysqli_query($con, "SELECT * FROM pms7003 where sensor_id=$id and pm2 > 0 order by id desc");
	    while ($fila = mysqli_fetch_array($request_ac)) {
	        echo '<tr>'
	            . '<td>' . $fila['pm2'] . '</td>'
	            . '<td>' . $fila['date_reg'] . '</td></tr>';
	    }
		?>
	</tbody>
</table>