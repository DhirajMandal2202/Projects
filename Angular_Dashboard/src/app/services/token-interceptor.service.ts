import { HttpEvent, HttpHandler, HttpInterceptor, HttpRequest } from '@angular/common/http';
import { Injectable } from '@angular/core';

import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TokenInterceptorService implements HttpInterceptor {

  constructor() { }
  intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {

    let token = localStorage.getItem("token");

    if (!req.url.endsWith('login')) {
      let jwttoken = req.clone({
        setHeaders: {
          Authorization: token
        }
      })
      return next.handle(jwttoken);
    }
    else {
      return next.handle(req);
    }
  }
}
