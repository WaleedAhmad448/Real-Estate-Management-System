import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreatePropertyByAddButtonComponent } from './create-property-by-add-button.component';

describe('CreatePropertyByAddButtonComponent', () => {
  let component: CreatePropertyByAddButtonComponent;
  let fixture: ComponentFixture<CreatePropertyByAddButtonComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CreatePropertyByAddButtonComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CreatePropertyByAddButtonComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
