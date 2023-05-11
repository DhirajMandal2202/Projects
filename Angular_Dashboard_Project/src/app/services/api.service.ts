import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable, Subject, of } from 'rxjs';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { tap } from 'rxjs/operators';
import Swal from 'sweetalert2';

// import { CategoryComponent } from '@pages/category/category.component';

@Injectable({
    providedIn: 'root'
})
export class ApiService {
    constructor(private http: HttpClient, private router: Router, private toastr: ToastrService) { }
    token: any;
    url: string = "http://products.pisystindia.com/non-agency-news-api";

    private _refreshRequired = new Subject<void>();
    get Refreshrequired() {
        return this._refreshRequired;
    }

    // Login and LogOut API ----------------
    login(data) {

        this.http.post(this.url + "/admin/login", data).subscribe((result) => {

            // console.log(result);

            if (result['success']) {
                // Swal.fire('You are Logged In!!', "", 'success');
                this.toastr.success("You are Logged In!!");
                localStorage.setItem("token", result['payload']['token']);
                localStorage.setItem("email", result['payload']['email']);
                this.router.navigate(['admin']);
            }


            else {
                this.toastr.error(result['error']['message']);
                this.router.navigate(['login']);
            }
        });
    }

    isLoggedIn() {
        return localStorage.getItem("token") != null; //if token availabe then return true else false


    }

    logOut() {


        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to Log Out',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Log Out',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/admin/logout", "").subscribe((result) => {
                    // console.log(result);
                    localStorage.removeItem('token');
                    localStorage.removeItem('email');
                    this.router.navigate(['login']);
                    Swal.fire('Logged Out !', '', 'success');

                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
            }
        });
    }



    // LOG API -----------------------------
    fetchLog() {
        return this.http.get(this.url + "/admin/fetchAllLogs");
    }



    // CATEGORY API -------------------
    fetchAllCategory(): Observable<object> {


        return this.http.get(this.url + "/category/fetchAllCategory");
    }

    addCategory(data) {

        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Add',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/category/addcategory", data).subscribe((result) => {
                    // console.log(result);
                    if (result['success']) {

                        Swal.fire(result['payload']['message'], '', 'success');

                        this.router.navigate(['/admin/category']);



                    }
                    else {

                        Swal.fire(result['error']['message'], '', 'error');

                        // this.toastr.error(result['error']['message']);
                        this.router.navigate(['/admin/addCategory']);
                    }

                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
            }
        });
    }

    delCategory_api(id) {


        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/category/deleteCategory", id)
                    .pipe(tap(() => {
                        this.Refreshrequired.next();
                    }))
                    .subscribe((result) => {
                        // console.log(result);
                        if (result['success']) {

                            Swal.fire(result['payload']['message'], '', 'success');

                        }
                        else {

                            Swal.fire(result['error']['message'], '', 'error');

                        }

                    });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
            }
        });

    }


    updateCategory(data) {

        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/category/editCategory", data).subscribe((result) => {
                    console.log(result);
                    if (result['success']) {

                        Swal.fire(result['payload']['message'], '', 'success');

                        this.router.navigate(['/admin/category']);



                    }
                    else {

                        Swal.fire(result['error']['message'], '', 'error');

                        // this.toastr.error(result['error']['message']);
                        this.router.navigate(['/admin/category']);
                    }

                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
                this.router.navigate(['/admin/category']);
            }
        });


    }

    statusCategory(categoryId) {


        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/category/statusChange", categoryId)
                    .pipe(tap(() => {
                        this.Refreshrequired.next();
                    }))
                    .subscribe((result) => {
                        // console.log(result);
                        if (result['success']) {

                            Swal.fire(result['payload']['message'], '', 'success');

                        }
                        else {

                            Swal.fire(result['error']['message'], '', 'error');

                        }

                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
                this.Refreshrequired.next();
            }
        });
    }



    // NEWS API -----------------------

    fetchNews() {
        return this.http.get(this.url + "/admin/fetchAllNews");
    }

    blockNews(data) {


        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Block',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/admin/blockNews", data)
                    .pipe(tap(() => {
                        this.Refreshrequired.next();
                    }))
                    .subscribe((result) => {
                        // console.log(result);
                        if (result['success']) {

                            Swal.fire(result['payload']['message'], '', 'success');




                        }
                        else {

                            Swal.fire(result['error']['message'], '', 'error');

                            // this.toastr.error(result['error']['message']);
                        }

                    });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
            }
        });

    }

    updateNews(data, id) {

        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/admin/editNews", data)
                    .pipe(tap(() => {
                        this.Refreshrequired.next();
                    }))
                    .subscribe((result) => {

                        if (result['success']) {

                            Swal.fire(result['payload']['message'], '', 'success');


                            this.router.navigate(['/admin/dashboard/news/:id', { id: id }]);



                        }
                        else {

                            Swal.fire(result['error']['message'], '', 'error');

                            // this.toastr.error(result['error']['message']);
                            this.router.navigate(['/admin/update/:id', { id: id }]);




                        }

                    });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
                this.router.navigate(['/admin/dashboard/news/:id', { id: id }]);

            }
        });
    }
    uploadNews(data) {
        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Upload',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/admin/verifyNews", data)
                    .pipe(tap(() => {
                        this.Refreshrequired.next();
                    }))
                    .subscribe((result) => {

                        if (result['success']) {

                            Swal.fire(result['payload']['message'], '', 'success');


                            this.router.navigate(['/admin/dashboard/history']);



                        }
                        else {

                            Swal.fire(result['error']['message'], '', 'error');

                            // this.toastr.error(result['error']['message']);
                            this.router.navigate(['/admin/dashboard/newpost']);




                        }

                    });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');


            }
        });
    }


    // USER API ------------------------

    fetchAllUsers() {
        return this.http.get(this.url + "/admin/fetchAllUsers");
    }

    userVerified(data) {


        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/admin/verifyUser", data)
                    .pipe(tap(() => {
                        this.Refreshrequired.next()
                    }))
                    .subscribe((result) => {
                        console.log(result);
                        if (result['success']) {

                            Swal.fire(result['payload']['message'], '', 'success');




                        }
                        else {

                            Swal.fire(result['error']['message'], '', 'error');

                            // this.toastr.error(result['error']['message']);
                        }

                    });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
            }
        });
    }

    userRejected(data) {
        // this.http.post(this.url + "/admin/blockUser", data)
        //     .pipe(tap(() => {
        //         this.Refreshrequired.next();
        //     }))
        //     .subscribe((result) => {
        //         // console.log(result);
        //         if (result['success']) {
        //             this.toastr.success(result['payload']['message']);


        //         }


        //         else {
        //             this.toastr.error(result['error']['message']);

        //         }
        //     })

        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/admin/regectUser", data)
                    .pipe(tap(() => {
                        this.Refreshrequired.next()
                    }))
                    .subscribe((result) => {
                        console.log(result);
                        if (result['success']) {

                            Swal.fire(result['payload']['message'], '', 'success');




                        }
                        else {

                            Swal.fire(result['error']['message'], '', 'error');

                            // this.toastr.error(result['error']['message']);
                        }

                    });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
            }
        });
    }

    fetchNewsByUserId(data) {
        return this.http.post(this.url + "/admin/fetchNewsByID", data);
    }


    userStatus(userId) {


        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/admin/toggleUserStatus", userId)
                    .pipe(tap(() => {
                        this.Refreshrequired.next();
                    }))
                    .subscribe((result) => {
                        // console.log(result);
                        if (result['success']) {

                            Swal.fire(result['payload']['message'], '', 'success');

                        }
                        else {

                            Swal.fire(result['error']['message'], '', 'error');

                        }

                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
                this.Refreshrequired.next();
            }
        });
    }


    // Agent API -----------------------

    allAgent() {
        return this.http.get(this.url + "/agent/fetchAllAgents");

    }

    createAgent(data) {


        Swal.fire({
            title: 'Are you sure?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Create',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                this.http.post(this.url + "/agent/addAgent", data)
                    .subscribe((result) => {
                        // console.log(result);
                        if (result['success']) {

                            Swal.fire(result['payload']['message'], '', 'success');
                            this.router.navigate(['/admin/agentList']);

                        }
                        else {

                            Swal.fire(result['error']['message'], '', 'error');
                            this.router.navigate(['/admin/createAgent']);

                        }

                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', '', 'error');
                this.Refreshrequired.next();
            }
        });

    }


























}
