import { Component, OnInit } from '@angular/core';
import { ApiService } from '@services/api.service';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.scss']
})
export class UsersComponent implements OnInit {

  usersList: any;

  constructor(private apiService: ApiService) {
    this.apiService.fetchAllUsers().subscribe(result => {

      this.usersList = result['data'];


    });
  }

  ngOnInit(): void {
  }

}
