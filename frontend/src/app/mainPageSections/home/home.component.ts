import { Component } from '@angular/core';
import { NavbarComponent } from "../../navbar/navbar.component";
import { AuthNavigationServiceService } from '../../services/authServices/auth-navigation-service.service';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [NavbarComponent],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {
  constructor(public router: AuthNavigationServiceService){}
}
