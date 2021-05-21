<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <br>
            <a href="https://unortecapms7003dht22.com.co/" style="text-decoration: none;"><button class="btn btn-danger btn-block">Regresar a graficas</button></a>
            <br>
        </div>
        <div class="col-md-6" style="border: 2px solid black">
        <h1>Datos pm2.5 externo <a href="pm2excel.php?idsensor=3"><img src="https://e7.pngegg.com/pngimages/108/891/png-clipart-microsoft-excel-computer-icons-export-microsoft-angle-logo-thumbnail.png" width="64" style="margin-left:5%"></a></h1>
            <div id="home" class="tab-pane fade active in table-responsive">
                <table class="table table-hover">
                    <tr class="bg-info">
                        <th>Valor</th>
                        <th>Fecha</th>
                    </tr>
                    <tbody id="mostrar_tabla_pm2">
                    </tbody>
                </table>
            </div>  
        </div>   
        <div class="col-md-6" style="border: 2px solid black">
        <h1>Datos pm10 externo<a href="pm10excel.php?idsensor=3"><img src="https://e7.pngegg.com/pngimages/108/891/png-clipart-microsoft-excel-computer-icons-export-microsoft-angle-logo-thumbnail.png" width="64" style="margin-left:5%"></a></h1>
            <div id="home" class="tab-pane fade active in table-responsive">
                <table class="table table-hover">
                    <tr class="bg-info">
                        <th>Valor</th>
                        <th>Fecha</th>
                    </tr>
                    <tbody id="mostrar_tabla_pm10">
                    </tbody>
                </table>
            </div>  
        </div>   
        <div class="col-md-6" style="border: 2px solid black">
        <h1>Datos Temperatura externo<a href="tempexcel.php?idsensor=1"><img src="https://e7.pngegg.com/pngimages/108/891/png-clipart-microsoft-excel-computer-icons-export-microsoft-angle-logo-thumbnail.png" width="64" style="margin-left:5%"></a></h1>
            <div id="home" class="tab-pane fade active in table-responsive">
                <table class="table table-hover">
                    <tr class="bg-info">
                        <th>Valor</th>
                        <th>Fecha</th>
                    </tr>
                    <tbody id="mostrar_tabla_temp">
                    </tbody>
                </table>
            </div>  
        </div>   
        <div class="col-md-6" style="border: 2px solid black">
        <h1>Datos Humedad externo<a href="humexcel.php?idsensor=1"><img src="https://e7.pngegg.com/pngimages/108/891/png-clipart-microsoft-excel-computer-icons-export-microsoft-angle-logo-thumbnail.png" width="64" style="margin-left:5%"></a></h1>
            <div id="home" class="tab-pane fade active in table-responsive">
                <table class="table table-hover">
                    <tr class="bg-info">
                        <th>Valor</th>
                        <th>Fecha</th>
                    </tr>
                    <tbody id="mostrar_tabla_hum">
                    </tbody>
                </table>
            </div>  
        </div>   
    </div><!-- /.row -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        $(function () {
            $("#mostrar_tabla_pm2").html(mostrar_line(1));
            $("#mostrar_tabla_pm10").html(mostrar_line_pm10(1));
            $("#mostrar_tabla_hum").html(mostrar_line_hum(1));
            $("#mostrar_tabla_temp").html(mostrar_line_temp(1));
        });

        function mostrar_line(page) {
            $.ajax({
                type: 'POST',
                data: 'page=' + page + '&listpm2=true&idsensor=3',
                url:  './pmsList.php',
                success: function (d) {
                    $("#mostrar_tabla_pm2").html(d);
                    if (d == 'error') {
                        alert('Error');
                    }
                }
            });
        }

        function mostrar_line_pm10(page) {
            $.ajax({
                type: 'POST',
                data: 'page=' + page + '&listpm10=true&idsensor=3',
                url:  './pmsList.php',
                success: function (d) {
                    $("#mostrar_tabla_pm10").html(d);
                    if (d == 'error') {
                        alert('Error');
                    }
                }
            });
        }

        function mostrar_line_hum(page) {
            $.ajax({
                type: 'POST',
                data: 'page=' + page + '&listhum=true&idsensor=1',
                url:  './dhtList.php',
                success: function (d) {
                    $("#mostrar_tabla_hum").html(d);
                    if (d == 'error') {
                        alert('Error');
                    }
                }
            });
        }

        function mostrar_line_temp(page) {
            $.ajax({
                type: 'POST',
                data: 'page=' + page + '&listtemp=true&idsensor=1',
                url:  './dhtList.php',
                success: function (d) {
                    $("#mostrar_tabla_temp").html(d);
                    if (d == 'error') {
                        alert('Error');
                    }
                }
            });
        }
    </script>
</body>
</html>