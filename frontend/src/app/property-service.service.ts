import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class PropertyService {
  deleteProperty(id: number) {
    throw new Error('Method not implemented.');
  }
  private properties = new BehaviorSubject<any[]>([]);
  properties$ = this.properties.asObservable();

  constructor() {
    // Sample data with 'rent' and 'sale' statuses
    this.properties.next([
      { id: 1, title: 'Property 1', description: 'Description 1', imageUrl: '/images/image.png', status: 'sale' },
      { id: 2, title: 'Property 2', description: 'Description 2', imageUrl: '/images/image.png', status: 'rent' },
      // Add more properties as needed
    ]);
  }

  addProperty(property: any): void {
    const currentProperties = this.properties.value;
    const newId = currentProperties.length ? Math.max(...currentProperties.map(p => p.id)) + 1 : 1;
    this.properties.next([...currentProperties, { id: newId, ...property }]);
  }

  getProperties(): Observable<any[]> {
    return this.properties$;
  }
}
