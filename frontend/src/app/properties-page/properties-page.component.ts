import { Component } from '@angular/core';
import { NavbarComponent } from "../navbar/navbar.component";
import { FooterComponent } from "../footer/footer.component";
import { PropertyCardComponent } from '../property-card/property-card.component';
import { PropertiesDataService } from '../services/properties/properties-data.service';

@Component({
  selector: 'app-properties-page',
  standalone: true,
  imports: [PropertyCardComponent, NavbarComponent, FooterComponent],
  templateUrl: './properties-page.component.html',
  styleUrl: './properties-page.component.css'
})
export class PropertiesPageComponent {

  properties: any[] = [];
  constructor(private propertiesDataService: PropertiesDataService) { }
  ngOnInit(): void {
    this.getProperties();
  }

  getProperties(): void {
    this.propertiesDataService.searchAndFilter().subscribe(
      (response) => {
        this.properties = response.data;
        console.log('Properties:', this.properties);
      },
      (error) => {
        console.error('Error fetching properties', error);
      }
    );
  }
}
