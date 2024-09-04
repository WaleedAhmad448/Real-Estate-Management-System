
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { ForgetPasswordComponent } from './forget-password/forget-password.component';
import { ResetPasswordComponent } from './reset-password/reset-password.component';
import { AgentPropertyComponent } from './agent-property/agent-property.component';
import { CreatePropertyByAddButtonComponent } from './create-property-by-add-button/create-property-by-add-button.component';
import { MainComponent } from './mainPageSections/main/main.component';
import { PropertiesPageComponent } from './properties-page/properties-page.component';
import path from 'path';

export const routes: Routes = [
  { path: '', component: MainComponent},
  { path: 'login', component: LoginComponent },
  { path: 'register', component: RegisterComponent },
  { path: 'forget-password', component: ForgetPasswordComponent },
  { path: 'reset-password', component: ResetPasswordComponent }, 
  { path: 'properties', component: PropertiesPageComponent},
  {path:'agent-property',component:AgentPropertyComponent},
  { path: 'createProperty', component: CreatePropertyByAddButtonComponent },
  { path: '**', redirectTo: '' },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

