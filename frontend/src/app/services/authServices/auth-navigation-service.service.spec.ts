import { TestBed } from '@angular/core/testing';

import { AuthNavigationServiceService } from './auth-navigation-service.service';

describe('AuthNavigationServiceService', () => {
  let service: AuthNavigationServiceService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(AuthNavigationServiceService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
