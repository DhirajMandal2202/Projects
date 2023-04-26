import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from '@/app-routing.module';
import { AppComponent } from './app.component';
import { MainComponent } from '@modules/main/main.component';
import { LoginComponent } from '@modules/login/login.component';
import { HeaderComponent } from '@modules/main/header/header.component';
import { FooterComponent } from '@modules/main/footer/footer.component';


import { ProfileComponent } from '@pages/profile/profile.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ToastrModule } from 'ngx-toastr';

import { registerLocaleData } from '@angular/common';
import localeEn from '@angular/common/locales/en';

import { PrivacyPolicyComponent } from './modules/privacy-policy/privacy-policy.component';
import { MainMenuComponent } from './pages/main-menu/main-menu.component';
import { SubMenuComponent } from './pages/main-menu/sub-menu/sub-menu.component';

import { StoreModule } from '@ngrx/store';
import { authReducer } from './store/auth/reducer';
import { uiReducer } from './store/ui/reducer';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

import { ChartsComponent } from './pages/charts/charts.component';
import { UsersComponent } from './pages/users/users.component';
import { NewPostComponent } from './pages/new-post/new-post.component';
import { NewsComponent } from './pages/news/news.component';
import { UpdateComponent } from './pages/update/update.component';
import { HistoryComponent } from './pages/history/history.component';
import { LogsComponent } from './pages/logs/logs.component';
import { CategoryComponent } from './pages/category/category.component';
import { SettingsComponent } from './pages/settings/settings.component';
import { UpdateSettingsComponent } from './pages/update-settings/update-settings.component';
import { UpdateCategoryComponent } from './pages/update-category/update-category.component';
import { AddCategoryComponent } from './pages/add-category/add-category.component';

import { SidebarComponent } from './modules/main/sidebar/sidebar.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { PageNotFoundComponent } from './pages/page-not-found/page-not-found.component';
import { DashboardComponent } from '@pages/dashboard/dashboard.component';
import { TokenInterceptorService } from '@services/token-interceptor.service';
import { NewUserComponent } from './pages/new-user/new-user.component';



registerLocaleData(localeEn, 'en-EN');

@NgModule({
    declarations: [
        AppComponent,
        MainComponent,
        LoginComponent,
        HeaderComponent,
        FooterComponent,



        ProfileComponent,







        PrivacyPolicyComponent,
        MainMenuComponent,
        SubMenuComponent,






        ChartsComponent,
        UsersComponent,
        NewPostComponent,
        NewsComponent,
        UpdateComponent,
        HistoryComponent,
        LogsComponent,
        CategoryComponent,
        SettingsComponent,
        UpdateSettingsComponent,
        UpdateCategoryComponent,
        AddCategoryComponent,

        SidebarComponent,
        PageNotFoundComponent,
        DashboardComponent,
        NewUserComponent


    ],
    imports: [
        BrowserModule,
        FormsModule,
        ReactiveFormsModule,
        StoreModule.forRoot({ auth: authReducer, ui: uiReducer }),
        HttpClientModule,
        AppRoutingModule,
        ReactiveFormsModule,
        BrowserAnimationsModule,
        ToastrModule.forRoot({
            timeOut: 3000,
            positionClass: 'toast-top-right',
            preventDuplicates: true
        }),
        NgbModule,
        FormsModule
    ],
    providers: [{ provide: HTTP_INTERCEPTORS, useClass: TokenInterceptorService, multi: true }],
    bootstrap: [AppComponent]
})
export class AppModule { }
