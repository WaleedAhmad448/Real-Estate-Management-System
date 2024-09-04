import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PropertyTypesSectionComponent } from './property-types-section.component';

describe('PropertyTypesSectionComponent', () => {
  let component: PropertyTypesSectionComponent;
  let fixture: ComponentFixture<PropertyTypesSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PropertyTypesSectionComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PropertyTypesSectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
