
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MainComponent } from '@modules/main/main.component';
import { LoginComponent } from '@modules/login/login.component';
import { ProfileComponent } from '@pages/profile/profile.component';
import { DashboardComponent } from '@pages/dashboard/dashboard.component';
import { AuthGuard } from '@guards/auth.guard';
import { NonAuthGuard } from '@guards/non-auth.guard';

import { PrivacyPolicyComponent } from '@modules/privacy-policy/privacy-policy.component';
import { ChartsComponent } from '@pages/charts/charts.component';
import path from 'path';
import { UsersComponent } from '@pages/users/users.component';
import { NewPostComponent } from '@pages/new-post/new-post.component';
import { NewsComponent } from '@pages/news/news.component';
import { UpdateComponent } from '@pages/update/update.component';
import { HistoryComponent } from '@pages/history/history.component';
import { LogsComponent } from '@pages/logs/logs.component';
import { CategoryComponent } from '@pages/category/category.component';
import { SettingsComponent } from '@pages/settings/settings.component';
import { UpdateSettingsComponent } from '@pages/update-settings/update-settings.component';
import { UpdateCategoryComponent } from '@pages/update-category/update-category.component';
import { AddCategoryComponent } from '@pages/add-category/add-category.component';
import { PageNotFoundComponent } from '@pages/page-not-found/page-not-found.component';
import { NewUserComponent } from '@pages/new-user/new-user.component';
import { CreateAgentComponent } from '@pages/create-agent/create-agent.component';
import { AgentListComponent } from '@pages/agent-list/agent-list.component';


const routes: Routes = [
  {
    path: 'admin',
    component: MainComponent,
    canActivate: [AuthGuard],
    // canActivateChild: [AuthGuard],
    children: [
      {
        path: 'profile',
        component: ProfileComponent
      },







      {
        path: '', redirectTo: 'dashboard', pathMatch: 'full'

      },
      {
        path: 'logs', component: LogsComponent
      },
      {
        path: 'settings',
        component: SettingsComponent,
      },

      {
        path: 'category', component: CategoryComponent
      },
      {
        path: 'addCategory', component: AddCategoryComponent
      },

      {
        path: 'updateSettings', component: UpdateSettingsComponent
      },
      {
        path: 'createAgent', component: CreateAgentComponent
      },
      {
        path: 'agentList', component: AgentListComponent
      },
      {
        path: 'updateCategory/:id/:status/:category_name', component: UpdateCategoryComponent
      },

      {
        path: 'dashboard',
        component: DashboardComponent,
        children: [
          { path: 'charts', component: ChartsComponent },
          { path: 'users', component: UsersComponent },
          { path: 'newpost', component: NewPostComponent },
          { path: 'news/:id', component: NewsComponent },
          { path: 'update/:id', component: UpdateComponent },
          { path: 'history', component: HistoryComponent },
          { path: 'newUser', component: NewUserComponent },
          { path: '', redirectTo: 'charts', pathMatch: 'full' },


        ]
      }
    ]
  },


  {
    path: 'login',
    component: LoginComponent,
    // canActivate: [AuthGuard],
  },






  {
    path: 'privacy-policy',
    component: PrivacyPolicyComponent,
    // canActivate: [NonAuthGuard]
  },
  {
    path: 'pageNotFound',
    component: PageNotFoundComponent,
    // canActivate: [NonAuthGuard]
  },
  { path: '', redirectTo: 'login', pathMatch: 'full' },
  { path: '**', redirectTo: 'pageNotFound', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes, { relativeLinkResolution: 'legacy' })],
  exports: [RouterModule]
})
export class AppRoutingModule { }
