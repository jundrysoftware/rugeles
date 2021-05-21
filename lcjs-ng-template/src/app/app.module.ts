import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {HttpClientModule} from '@angular/common/http';
import { AppComponent } from './app.component';
import { ChartComponent } from './chart/chart.component';
import { Pm10ComponentComponent } from './chart/pm10-component.component';
import { HumedadComponentComponent } from './chart/humedad-component.component';
import { TemperaturaComponentComponent } from './chart/temperatura-component.component';

@NgModule({
  declarations: [
    AppComponent,
    ChartComponent,
    Pm10ComponentComponent,
    HumedadComponentComponent,
    TemperaturaComponentComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})

export class AppModule {}