import { Component, OnInit } from '@angular/core';

import {ActivatedRoute} from '@angular/router'

@Component({
  selector: 'app-news',
  templateUrl: './news.component.html',
  styleUrls: ['./news.component.scss']
})
export class NewsComponent implements OnInit {
  id:any;

  constructor(private route: ActivatedRoute) { }

  ngOnInit(): void {
    // console.log(this.route.snapshot.paramMap.get('id'));

    this.id=this.route.snapshot.paramMap.get('id');
  }

}
