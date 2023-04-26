import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '@services/api.service';

@Component({
  selector: 'app-category',
  templateUrl: './category.component.html',
  styleUrls: ['./category.component.scss']
})
export class CategoryComponent implements OnInit {


  categoryList: any;
  categoryId: any;


  constructor(private http: HttpClient, private route: Router, private apiService: ApiService) { }


  ngOnInit(): void {

    this.displayCategory();

  }

  delCategory(id) {

    // console.log(id);
    this.categoryId = { "id": id };

    this.apiService.delCategory_api(this.categoryId);
    this.ngOnInit();



  }
  displayCategory() {
    this.apiService.fetchAllCategory().subscribe(result => {

      this.categoryList = result['data'];


    });

  }


}
