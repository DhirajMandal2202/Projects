import { Component, OnInit } from '@angular/core';
import { ApiService } from '@services/api.service';

@Component({
  selector: 'app-new-user',
  templateUrl: './new-user.component.html',
  styleUrls: ['./new-user.component.scss']
})
export class NewUserComponent implements OnInit {
  usersList: any;
  constructor(private apiService: ApiService) {
    this.apiService.fetchAllUsers().subscribe(result => {

      this.usersList = result['data'];


    });
  }

  ngOnInit(): void {
  }

}
