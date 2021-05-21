import { TestBed } from '@angular/core/testing';

import { MethodServiceApiService } from './method-service-api.service';

describe('MethodServiceApiService', () => {
  let service: MethodServiceApiService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(MethodServiceApiService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
