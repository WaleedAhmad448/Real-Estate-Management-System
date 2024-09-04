import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AgentPropertyComponent } from './agent-property.component';

describe('AgentPropertyComponent', () => {
  let component: AgentPropertyComponent;
  let fixture: ComponentFixture<AgentPropertyComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AgentPropertyComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AgentPropertyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
