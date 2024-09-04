import { Injectable } from '@angular/core';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthNavigationServiceService {

  constructor(private router: Router){}
  navigateToLogin(event?: Event){
    if(event)
      event.preventDefault();
    this.router.navigate(['/login']);
  }}
