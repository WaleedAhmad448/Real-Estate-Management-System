import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PropertyTypeCardComponent } from './property-type-card.component';

describe('PropertyTypeCardComponent', () => {
  let component: PropertyTypeCardComponent;
  let fixture: ComponentFixture<PropertyTypeCardComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PropertyTypeCardComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PropertyTypeCardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
