import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-reset-password',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './reset-password.component.html',
  styleUrls: ['./reset-password.component.css'],
})
export class ResetPasswordComponent {
  resetData = {
    email: '',
    password: '',
    confirmPassword: ''
  };

  constructor(private http: HttpClient, private router: Router) { }
  
  onSubmit() {
    const url = 'http://127.0.0.1:8000/api/reset-password';

    if (this.resetData.password !== this.resetData.confirmPassword) {
      console.error('Passwords do not match');
      return;
    }

    this.http.post(url, this.resetData).subscribe(
      response => {
        console.log('Password reset successful', response);
        this.router.navigate(['/']);
      },
      error => {
        console.error('Password reset failed', error);
      }
    );
  }
}
