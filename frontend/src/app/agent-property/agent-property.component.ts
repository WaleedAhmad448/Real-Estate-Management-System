import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { PropertyService } from '../property-service.service';

@Component({
  selector: 'app-agent-property',
  standalone: true,
  imports: [CommonModule, RouterModule],
  templateUrl: './agent-property.component.html',
  styleUrls: ['./agent-property.component.css'],
})
export class AgentPropertyComponent implements OnInit {
  cards: any[] = [];

  constructor(private propertyService: PropertyService) { }

  ngOnInit(): void {
    this.loadProperties();
  }

  loadProperties(): void {
    this.propertyService.getProperties().subscribe({
      next: (properties) => {
        this.cards = properties.map((card: any) => ({
          id: card.id,
          title: card.title,
          description: card.description,
          imageUrl: card.imageUrl || '/images/image.png',
          status: card.status // Ensure status is correctly mapped
        }));
      },
      error: (err) => {
        console.error('Error fetching properties:', err);
      }
    });
  }

  deleteProperty(id: number): void {
    if (confirm('Are you sure you want to delete this property?')) {
      // Simulate deletion (remove from the list)
      this.cards = this.cards.filter(card => card.id !== id);
      console.log('Property deleted successfully');
    }
  }

  updateProperty(id: number): void {
    // Implement update functionality or navigation
    console.log('Update property with ID:', id);
  }
}
