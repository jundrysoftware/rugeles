import { Component } from '@angular/core';
import { Point } from '@arction/lcjs';

@Component({
  selector: 'app-root',
  template: `
  <div class='container' style='text-aling: center'>
  <div class="row">
  <div class='col-md-12' style='margin-top:5%;margin-bottom:5%;'><a href="https://unortecapms7003dht22.com.co/tablas.php" style='text-decoration:none;'><button class='btn btn-success btn-block'>Reporte Tablas</button></a></div>
  <div class="col-md-6" style='height:400px'>
  <app-chart></app-chart>
  </div>
  <div class="col-md-6" style='height:400px'>
  <app-pm10></app-pm10>
  </div>
</div><br>
<div class="row">
<div class="col-md-6" style='height:400px'>
<app-humedad></app-humedad>
</div>
<div class="col-md-6" style='height:400px'>
<app-temperatura></app-temperatura>
</div>
</div>
  </div>
  `,
  styles: ['']
})

export class AppComponent {
  

}
