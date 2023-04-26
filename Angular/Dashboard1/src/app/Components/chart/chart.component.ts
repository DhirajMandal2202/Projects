import { Component, OnInit } from '@angular/core';
import {Chart,registerables} from 'node_modules/chart.js';
import { ServiceService } from 'src/app/service/service.service';
Chart.register(...registerables);

@Component({
  selector: 'app-chart',
  templateUrl: './chart.component.html',
  styleUrls: ['./chart.component.css']
})
export class ChartComponent implements OnInit {

  chartdata:any;


  realdata: any[] = [];
  colordata: any[] = [];
  labeldata: any[] = [];

  constructor(private service: ServiceService) { }

  ngOnInit(): void {

    this.service.Getchartinfo().subscribe(results=>{
      this.chartdata=results;
      if(this.chartdata!=null){
        // console.log(this.chartdata)
        for(let i=0;i<this.chartdata.length; i++){
          this.labeldata.push(this.chartdata[i].year)
          this.realdata.push(this.chartdata[i].amount)
          this.colordata.push(this.chartdata[i].colorcode)
        }
       
        this.RenderChart(this.labeldata,this.realdata,this.colordata,'bar','barchart');
        this.RenderChart(this.labeldata,this.realdata,this.colordata,'pie','piechart');


        
      }
    });
  }


  RenderChart(labeldata:any,maindata:any,colordata:any,type:any,id:any){
   

    const myChart = new Chart(id, {
      type: type,
      data: {
        labels: labeldata,
        datasets: [{
          label: '# of Votes',
          data:maindata,
          borderWidth: 1,
          backgroundColor:colordata
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  

  }

}
