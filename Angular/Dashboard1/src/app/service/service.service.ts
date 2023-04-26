import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'


@Injectable({
  providedIn: 'root'
})
export class ServiceService {

  url = 'http://localhost:3000/sales';


  constructor(private http: HttpClient) { }

  Getchartinfo() {
    return this.http.get(this.url)

  }
}
