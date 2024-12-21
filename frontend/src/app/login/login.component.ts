import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router, RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [FormsModule, RouterModule],
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
})
export class LoginComponent {
  title: string = 'shahd';
  loginData = {
    email: '',
    password: ''
  };

  constructor(private http: HttpClient, private router: Router) { } 
  
  onSubmit() {
    const url = 'http://127.0.0.1:8000/api/login';
    
    this.http.post(url, this.loginData).subscribe(
      response => {
        console.log('Login successful', response);
        this.router.navigate(['/']);  
      },
      error => {
        console.error('Login failed', error);
      }
    );
  }
}
