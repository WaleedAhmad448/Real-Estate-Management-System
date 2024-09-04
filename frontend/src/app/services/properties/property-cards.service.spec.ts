import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';  
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class PropertyServices {
  addProperty(formData: FormData) {
    throw new Error('Method not implemented.');
  }

  constructor(private http: HttpClient) {}  

  getProperty(): Observable<any> {
    return this.http.get<any>('http://localhost:8000/api/properties');
  }
}
