import { Component, OnInit } from '@angular/core';
import { ApiService } from '@services/api.service';

@Component({
  selector: 'app-new-post',
  templateUrl: './new-post.component.html',
  styleUrls: ['./new-post.component.scss']
})
export class NewPostComponent implements OnInit {

  newsList: any;

  constructor(private apiService: ApiService) {}

  ngOnInit(): void {

    this.displayNews();
  }

  displayNews() {
    this.apiService.fetchNews().subscribe(result => {

      this.newsList = result["data"];


    });

  }

}
