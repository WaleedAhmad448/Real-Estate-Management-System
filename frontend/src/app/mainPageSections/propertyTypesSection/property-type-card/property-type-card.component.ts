import { Component, Input } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';
import { PropertiesDataService } from '../../../services/properties/properties-data.service';

@Component({
  selector: 'app-property-type-card',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './property-type-card.component.html',
  styleUrl: './property-type-card.component.css'
})
export class PropertyTypeCardComponent {
  @Input() title:string | undefined;
  @Input() image:string | undefined;
  constructor(private router: Router, private propertyDataService: PropertiesDataService) { }

  navigateToPage(){
    if(this.title)
      this.propertyDataService.setBuildingType(this.title);
    this.router.navigate(['/properties']);
  }
}
