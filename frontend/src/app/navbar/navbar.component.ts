import { Component } from '@angular/core';
import { AuthNavigationServiceService } from '../services/authServices/auth-navigation-service.service';

@Component({
  selector: 'app-navbar',
  standalone: true,
  imports: [],
  templateUrl: './navbar.component.html',
  styleUrl: './navbar.component.css'
})
export class NavbarComponent {
  constructor(public authRouter: AuthNavigationServiceService){}
}
