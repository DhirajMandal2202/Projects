import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '@services/api.service';

@Component({
  selector: 'app-logs',
  templateUrl: './logs.component.html',
  styleUrls: ['./logs.component.scss']
})
export class LogsComponent implements OnInit {

  logList: any;

  constructor(private apiService: ApiService) {
    this.apiService.fetchLog().subscribe(result => {

      this.logList = result['data'];


    });
  }

  ngOnInit(): void {
  }


}
