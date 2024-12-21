import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { BehaviorSubject, Observable } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class PropertyService {
  private properties = new BehaviorSubject<any[]>([]);
  properties$ = this.properties.asObservable();

  constructor() {
    // Initial properties with statuses
    this.properties.next([
      { id: 1, title: 'Property 1', description: 'Description 1', imageUrl: '/images/image.png', status: 'sale' },
      { id: 2, title: 'Property 2', description: 'Description 2', imageUrl: '/images/image.png', status: 'rent' },
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

