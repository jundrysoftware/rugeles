import { Component, Input, AfterViewInit, OnChanges, OnDestroy, OnInit } from '@angular/core';
import { lightningChart, ChartXY, Point,emptyFill, UILayoutBuilders, UIBackgrounds, UIOrigins, UIDraggingModes, SolidFill, emptyLine, UIElementBuilders, Themes, UIRectangle, UIElementColumn, UITextBox, UICheckBox } from '@arction/lcjs';
import { MethodServiceApiService } from '../services/method-service-api.service';

@Component({
  selector: 'app-temperatura',
  template: '<div [id]="this.chartId"></div>',
  styles: ['div { height: 100% }']
})

export class TemperaturaComponentComponent implements  OnDestroy, OnInit {
  chart: ChartXY;
  chartId: number;

  points: Point[] = [
  ];

  constructor(private _methodsApiRestService: MethodServiceApiService) {}

  async getInfo() {
    this._methodsApiRestService.GetMethod('am2302.php?getinfotemperatura=true&idsensor=1')
      .subscribe(
        response => {
          for (let obj in response) {
              this.points.push(response[obj])
          }
          
          // Create chartXY
          this.chart = lightningChart().ChartXY({container: `${this.chartId}`});
          // Set chart title
          this.chart.setTitle('Temperatura DHT22 Externo');
          // Add line series to the chart
          const lineSeries = this.chart.addLineSeries();
          // Set stroke style of the line
          lineSeries.setStrokeStyle((style) => style.setThickness(5));
          // Add data point to the line series
          lineSeries.add(this.points);
          
        },
        error => {
          if (!error.ok) {
            console.log('error');
          }
        }
      );
  }

  ngOnInit() {
    // Generate random ID to us as the containerId for the chart and the target div id
    this.chartId = Math.trunc(Math.random() * 1000000);    
    this.getInfo();
  }


  ngOnDestroy() {
    // "dispose" should be called when the component is unmounted to free all the resources used by the chart
    this.chart.dispose();
  }
}
