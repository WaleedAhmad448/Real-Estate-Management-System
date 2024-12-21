// src/app/services/properties/property.model.ts

export interface Property {
    id: number;
    title: string;
    description: string;
    location: string;
    price: number;
    size: number;
    propertyType: string;
    photos: { url: string }[]; // Array of photo objects with a URL property
  }
  