import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { CommonModule } from '@angular/common';
import { ResetPasswordComponent } from '../reset-password/reset-password.component';

@Component({
  selector: 'app-forget-password',
  templateUrl: './forget-password.component.html',
  styleUrls: ['./forget-password.component.css'],
  standalone: true,
  imports: [CommonModule, FormsModule, HttpClientModule, ResetPasswordComponent]
})
export class ForgetPasswordComponent {
  email: string = '';
  verificationCode: string = '';
  receivedCode: string = '';
  isCodeSent: boolean = false;
  isCodeVerified: boolean = false;
  errorMessage: string = '';

  constructor(private http: HttpClient) {}

  sendResetLink() {
    this.http.post('http://127.0.0.1:8000/api/forgot-password', { email: this.email }).subscribe({
      next: (response: any) => {
        this.receivedCode = response.code;
        this.isCodeSent = true;
        this.errorMessage = '';
      },
      error: (error) => {
        this.errorMessage = 'Failed to send reset code. Please try again.';
      }
    });
  }

  verifyCode() {
    const receivedCodeString = String(this.receivedCode);
    console.log('Entered Code:', this.verificationCode);
    console.log('Received Code:', receivedCodeString);

    if (this.verificationCode.trim() === receivedCodeString.trim()) {
      this.isCodeVerified = true;
      this.errorMessage = '';
    } else {
      this.errorMessage = 'The code you entered is incorrect';
    }
  }
}
