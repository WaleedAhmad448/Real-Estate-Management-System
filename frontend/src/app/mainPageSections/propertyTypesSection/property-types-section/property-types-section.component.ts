import { Component} from '@angular/core';
import { PropertyTypeCardComponent } from "../property-type-card/property-type-card.component";
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-property-types-section',
  standalone: true,
  imports: [PropertyTypeCardComponent, CommonModule],
  templateUrl: './property-types-section.component.html',
  styleUrl: './property-types-section.component.css'
})
export class PropertyTypesSectionComponent {
  cards = [
    { title: 'Residential properties', image: '../../assets/mainPage/propertyTypes/residential-properties.png' },
    { title: 'Industrial properties', image: '/assets/mainPage/propertyTypes/industrial-properties.png' },
    { title: 'Commercial properties', image: '/assets/mainPage/propertyTypes/commercial-properties.png' },
    { title: 'Special-purpose', image: '/assets/mainPage/propertyTypes/special-purpose.png' }
  ];
}
