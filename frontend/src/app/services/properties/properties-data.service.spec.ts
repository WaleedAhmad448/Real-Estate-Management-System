import { TestBed } from '@angular/core/testing';

import { PropertiesDataService } from './properties-data.service';

describe('PropertiesDataService', () => {
  let service: PropertiesDataService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(PropertiesDataService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
