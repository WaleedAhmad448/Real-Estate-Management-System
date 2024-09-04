
export interface IProperty {
    id?: number; 
    agent_id?: number;
    title?: string; 
    description?: string; 
    city_id?: number | null;
    location?: string; 
    size?: number; 
    buildingType?: 'Residential' | 'Commercial' | 'Special' | 'Industrial' | null;
    propertyType?: 'rent' | 'sell' | null;
    sortDirection?: 'asc' | 'desc' | null;
    sortBy?: string | null;
    price?: number; 
    minPrice?: number; 
    maxPrice?: number; 
    updated_at?: string | null; 
}