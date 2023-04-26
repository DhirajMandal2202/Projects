import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
// import { CategoryComponent } from '@pages/category/category.component';

@Injectable({
    providedIn: 'root'
})
export class ApiService {
    constructor(private http: HttpClient, private router: Router, private toastr: ToastrService) { }
    token: any;
    url: string = "http://products.pisystindia.com/non-agency-news-api";

    login(data) {

        this.http.post(this.url + "/admin/login", data).subscribe((result) => {

            // console.log(result);

            if (result['success']) {
                localStorage.setItem("token", result['payload']['token']);
                this.router.navigate(['admin']);
            }


            else {
                this.toastr.error(result['error']['message']);
                this.router.navigate(['login']);
            }
        });
    }













    isLoggedIn() {
        console.log('working');
        return localStorage.getItem("token") != null; //if token availabe then return true else false
        // return true;
    }


    fetchAllCategory() {


        return this.http.get(this.url + "/category/fetchAllCategory");
    }

    fetchLog() {
        return this.http.get(this.url + "/admin/fetchAllLogs");
    }

    fetchNews() {
        return this.http.get(this.url + "/admin/fetchNews");
    }

    fetchAllUsers() {
        return this.http.get(this.url + "/admin/fetchAllUsers");
    }

    addCategory(data) {
        // console.log(data);
        return this.http.post(this.url + "/category/addcategory", data).subscribe((result) => {
            if (result['success']) {
                this.toastr.success(result['payload']['message']);
                console.log(result);

                this.router.navigate(['/admin/category']);
            }


            else {
                this.toastr.error(result['error']['message']);
                this.router.navigate(['/admin/addCategory']);
            }
        });
    }


    delCategory_api(id) {
        return this.http.post(this.url + "/category/deleteCategory", id).subscribe((result) => {
            if (result['success']) {
                this.toastr.success(result['payload']['message']);
                console.log(result);

            }


            else {
                this.toastr.error(result['error']['message']);
                this.router.navigate(['/admin/addCategory']);
            }

        });

    }

    updateCategory(data) {

        // console.log(data);

        return this.http.post(this.url + "/category/editCategory", data).subscribe((result) => {
            console.log(result);
        })
    }







}
