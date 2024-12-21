import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router, RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms'; 

@Component({
  selector: 'app-register',
  standalone: true, 
  imports: [FormsModule, RouterModule], 
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent {
  registerData = {
    username: '',
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    phone_number: '',
    role: 'agent'
  };

  constructor(private http: HttpClient, private router: Router) {}

  onSubmit() {
    const url = 'http://127.0.0.1:8000/api/register';

    this.http.post(url, this.registerData).subscribe(
      (response: any) => {
        console.log('Registration successful', response);

        if (response.status === 'success') {
          this.router.navigate(['/']);  
        } else {
          console.error('Registration failed', response.message);
        }
      },
      error => {
        console.error('Registration failed', error);
        if (error.status === 400 && error.error && error.error.errors) {
          const validationErrors = error.error.errors;
          for (const field in validationErrors) {
            if (validationErrors.hasOwnProperty(field)) {
              const errorMessages = validationErrors[field];
              errorMessages.forEach((message: string) => {
                console.error(`${field}: ${message}`);
                alert(`${field}: ${message}`);
              });
            }
          }
        }
      }
    );
  }
}
