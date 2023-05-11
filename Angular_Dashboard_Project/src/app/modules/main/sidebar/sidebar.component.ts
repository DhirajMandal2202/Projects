import { Component, OnInit, Input } from '@angular/core';
import { Route, Router } from '@angular/router';
import { ApiService } from '@services/api.service';

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.scss']
})
export class SidebarComponent implements OnInit {
  @Input() sideNavStatus: boolean = false;

  email:any;

  constructor(private router: Router,private apiService: ApiService) { }


  ngOnInit(): void {
    this.email=localStorage.getItem("email");
  }

  logout() {
    // localStorage.removeItem('token');
    // this.router.navigate(['login']);

    this.apiService.logOut();

 
  }

}
