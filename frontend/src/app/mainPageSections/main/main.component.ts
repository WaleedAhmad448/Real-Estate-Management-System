import { Component } from '@angular/core';
import { HomeComponent } from "../home/home.component";
import { NavbarComponent } from "../../navbar/navbar.component";
import { PropertyTypesSectionComponent } from '../propertyTypesSection/property-types-section/property-types-section.component';
import { ContactSectionComponent } from "../contact-section/contact-section.component";
import { FooterComponent } from "../../footer/footer.component";

@Component({
  selector: 'app-main',
  standalone: true,
  imports: [HomeComponent, NavbarComponent, PropertyTypesSectionComponent, ContactSectionComponent, FooterComponent],
  templateUrl: './main.component.html',
  styleUrl: './main.component.css'
})
export class MainComponent {

}
