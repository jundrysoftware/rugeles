<?php
require_once('conexion.php');

if (isset($_POST['listpm2'])) {
    $page = $_POST['page'];
    $id = $_POST['idsensor'];
    $request = mysqli_query($con, "SELECT count(*) FROM pms7003 where sensor_id=$id and pm2 > 0");
    if ($request) {
        $request = mysqli_fetch_row($request) or die(mysqli_error($con));
        $num_items = $request[0];
    } else {
        $num_items = 0;
    }
    $rows_by_page = 10;
    $last_page = ceil($num_items / $rows_by_page);
    $limit = 'LIMIT ' . ($page - 1) * $rows_by_page . ',' . $rows_by_page;
    $request_ac = mysqli_query($con, "SELECT * FROM pms7003 where sensor_id=$id and pm2 > 0 order by id desc  " . $limit);
    $total2 = 0;
    while ($fila = mysqli_fetch_array($request_ac)) {
        echo '<tr>'
            . '<td>' . $fila['pm2'] . '</td>'
            . '<td>' . $fila['date_reg'] . '</td></tr>';
    }
    echo '<tr><td colspan="2">';
    if ($page > 1) {
        ?>
        <img src="./img/at2.png" onclick="mostrar_tabla_pm2(1)" style="cursor: pointer;">
        <img src="./img/at1.png" onclick="mostrar_tabla_pm2(<?php echo $page - 1; ?>)"
             style="cursor: pointer;">
        <?php
    } else {
        ?><img src="./img/at2.png"> <img src="./img/at1.png"><?php
    }
    ?>
    (<b>Pagina</b> <input type="text" id="page" value="<?php echo $page; ?>"
                          style="width: 50px; height: 20px;text-align: center;" disabled><b>
        de </b><?php echo ' ' . $last_page; ?>)
    <?php
    if ($page < $last_page) {
        ?>
        <img src="./img/sig1.png" onclick="mostrar_tabla_pm2(<?php echo $page + 1; ?>)"
             style="cursor: pointer;">
        <img src="./img/sig2.png" onclick="mostrar_tabla_pm2(<?php echo $last_page; ?>)"
             style="cursor: pointer;">
        <?php
    } else {
        ?><img src="./img/sig1.png"> <img src="./img/sig2.png"> <?php
    }
    echo 'Cantidad de registro ' . $num_items;
    echo '</td></tr>';
    ?>
    </div>
    </div><?php
}


if (isset($_POST['listpm10'])) {
    $page = $_POST['page'];
    $id = $_POST['idsensor'];
    $request = mysqli_query($con, "SELECT count(*) FROM pms7003 where sensor_id=$id and pm10 > 0");
    if ($request) {
        $request = mysqli_fetch_row($request) or die(mysqli_error($con));
        $num_items = $request[0];
    } else {
        $num_items = 0;
    }
    $rows_by_page = 10;
    $last_page = ceil($num_items / $rows_by_page);
    $limit = 'LIMIT ' . ($page - 1) * $rows_by_page . ',' . $rows_by_page;
    $request_ac = mysqli_query($con, "SELECT * FROM pms7003 where sensor_id=$id and pm10 > 0 order by id desc  " . $limit);
    $total2 = 0;
    while ($fila = mysqli_fetch_array($request_ac)) {
        echo '<tr>'
            . '<td>' . $fila['pm10'] . '</td>'
            . '<td>' . $fila['date_reg'] . '</td></tr>';
    }
    echo '<tr><td colspan="2">';
    if ($page > 1) {
        ?>
        <img src="./img/at2.png" onclick="mostrar_tabla_pm10(1)" style="cursor: pointer;">
        <img src="./img/at1.png" onclick="mostrar_tabla_pm10(<?php echo $page - 1; ?>)"
             style="cursor: pointer;">
        <?php
    } else {
        ?><img src="./img/at2.png"> <img src="./img/at1.png"><?php
    }
    ?>
    (<b>Pagina</b> <input type="text" id="page" value="<?php echo $page; ?>"
                          style="width: 50px; height: 20px;text-align: center;" disabled><b>
        de </b><?php echo ' ' . $last_page; ?>)
    <?php
    if ($page < $last_page) {
        ?>
        <img src="./img/sig1.png" onclick="mostrar_tabla_pm10(<?php echo $page + 1; ?>)"
             style="cursor: pointer;">
        <img src="./img/sig2.png" onclick="mostrar_tabla_pm10(<?php echo $last_page; ?>)"
             style="cursor: pointer;">
        <?php
    } else {
        ?><img src="./img/sig1.png"> <img src="./img/sig2.png"> <?php
    }
    echo 'Cantidad de registro ' . $num_items;
    echo '</td></tr>';
    ?>
    </div>
    </div><?php
}