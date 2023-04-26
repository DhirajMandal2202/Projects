import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ChartComponent } from './Components/chart/chart.component';
import { SalesComponent } from './Components/sales/sales.component';

const routes: Routes = [
  {path:'chart',component:ChartComponent},
  {path:'sales',component:SalesComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
