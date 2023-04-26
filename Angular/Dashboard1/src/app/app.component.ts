import { Component, Input, Inject, NgZone, PLATFORM_ID  } from '@angular/core';
import {EChartsOption} from 'echarts';
import * as echarts from 'echarts/types/dist/echarts';
import * as worldMap from 'src/assets/world.json'




@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  @Input() sideNavStatus:boolean=false;

  

}
