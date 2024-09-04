import { Injectable } from '@angular/core';
import { IProperty } from '../../interfaces/IProperty';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class PropertiesDataService {
  private propertyData: IProperty = this.defaultData();
  private baseUrl = 'http://127.0.0.1:8000/api/properties/search';
  constructor(private http: HttpClient) {}

  // -----------------------------------------------------------------------------
  // Default values, setters, and getters
  // -----------------------------------------------------------------------------
  defaultData(){
    return {
      id: 0,
      agent_id: 0,
      title: '',
      description: '',
      city_id: null,
      location: '',
      size: 0,
      buildingType: null,
      propertyType: null,
      sortBy: null,
      price: 0,
      minPrice: 0,
      maxPrice: 100000000,
      updated_at: null
    };
  }

  getData(){
    return this.propertyData;
  }

  setData(data:IProperty){
    this.propertyData = data;
  }

  setId(id: number): void {
    this.propertyData.id = id;
  }

  setAgentId(agent_id: number): void {
    this.propertyData.agent_id = agent_id;
  }

  setTitle(title: string): void {
    this.propertyData.title = title;
  }

  setDescription(description: string): void {
    this.propertyData.description = description;
  }

  setCityId(city_id: number): void {
    this.propertyData.city_id = city_id;
  }

  setLocation(location: string): void {
    this.propertyData.location = location;
  }

  setSize(size: number): void {
    this.propertyData.size = size;
  }

  setBuildingType(propertyType: string | null): void {
    let normalizedType: 'Residential' | 'Industrial' | 'Commercial' | 'Special' | null = null;
  
    if (propertyType === 'Residential properties') {
      normalizedType = 'Residential';
    } else if (propertyType === 'Industrial properties') {
      normalizedType = 'Industrial';
    } else if (propertyType === 'Commercial properties') {
      normalizedType = 'Commercial';
    } else if (propertyType === 'Special-purpose') {
      normalizedType = 'Special';
    }

    if (this.propertyData) {
      this.propertyData.buildingType = normalizedType;
    }
  }
  
  setPropertyType(propertyType: 'rent' | 'sell'): void {
    this.propertyData.propertyType = propertyType;
  }

  setPrice(price: number): void {
    this.propertyData.price = price;
  }

  // -----------------------------------------------------------------------------
  // search and filter
  // -----------------------------------------------------------------------------
  searchAndFilter(): Observable<any> {
    let params = new HttpParams();

    if (this.propertyData.city_id) {
      params = params.set('city_id', this.propertyData.city_id);
    }

    if (this.propertyData.agent_id) {
      params = params.set('agent_id', this.propertyData.agent_id);
    }

    if (this.propertyData.buildingType) {
      params = params.set('buildingType', this.propertyData.buildingType);
    }

    if (this.propertyData.propertyType) {
      params = params.set('propertyType', this.propertyData.propertyType);
    }

    if (this.propertyData.minPrice) {
      params = params.set('min_price', this.propertyData.minPrice);
    }

    if (this.propertyData.maxPrice) {
      params = params.set('max_price', this.propertyData.maxPrice);
    }

    if (this.propertyData.sortBy) {
      params = params.set('sort_by', this.propertyData.sortBy);
    }

    if (this.propertyData.sortDirection) {
      params = params.set('sort_direction', this.propertyData.sortDirection);
    }

    this.propertyData = this.defaultData();
    return this.http.get(`${this.baseUrl}`, { params });
  }
}
