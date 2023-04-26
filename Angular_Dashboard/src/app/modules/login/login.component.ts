import {
    Component,
    OnInit,
    OnDestroy,
    Renderer2,
    HostBinding
} from '@angular/core';
import { FormGroup, FormControl, Validators, FormBuilder, FormControlName } from '@angular/forms';
import { ToastrService } from 'ngx-toastr';
import { AppService } from '@services/app.service';
import { ApiService } from '@services/api.service';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
    @HostBinding('class') class = 'login-box';

    data: any;
    myForm: FormGroup;



    // public loginForm: FormGroup;
    // public isAuthLoading = false;
    // public isGoogleLoading = false;
    // public isFacebookLoading = false;


    constructor(

        private formBuilder: FormBuilder,
        private apiService: ApiService,
        private toastr: ToastrService
    ) { }

    ngOnInit() {

        this.initForm();




    }
    initForm() {
        this.myForm = new FormGroup({
            email: new FormControl('', [Validators.required, Validators.email,]),
            password: new FormControl('', [Validators.required, Validators.minLength(8)]),
        });

    }





    get email() { return this.myForm.get('email') };
    get password() { return this.myForm.get('password'); }

    onSubmit() {


        // this.apiService.login(this.data);

        if (this.myForm.valid) {
            this.apiService.login(this.myForm.value);


        }
        else {
            this.toastr.error("Empty Field!!");
        }

    }


}



