import { Component, inject, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PropertyServices } from '../services/properties/property-cards.service.spec';

@Component({
  selector: 'app-property-card',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './property-card.component.html',
  styleUrls: ['./property-card.component.css'],
})
export class PropertyCardComponent implements OnInit {

  cards: any[] = [];

  constructor(private propertyServices: PropertyServices) { }

  ngOnInit(): void {
    this.propertyServices.getProperty().subscribe((response: any) => {
      console.log('API Response:', response);  // Log the whole response object

      // Ensure response.data is an array
      if (Array.isArray(response.data)) {
        this.cards = response.data.map((card: { title: any; description: any; photos: string | any[]; propertyType: any; }) => ({
          title: card.title,
          description: card.description,
          imageUrl: card.photos.length > 0 ? card.photos[0].url : '/images/image.png',  // Use a default image if no photos are available
          status: card.propertyType
        }));
      } else {
        console.error('Unexpected response format:', response);
      }
    });
  }
}