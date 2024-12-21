import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';
import { PropertyService } from '../property-service.service';

@Component({
  selector: 'app-create-property-by-add-button',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule],
  templateUrl: './create-property-by-add-button.component.html',
  styleUrls: ['./create-property-by-add-button.component.css']
})

export class CreatePropertyByAddButtonComponent implements OnInit {
  propertyForm: FormGroup;

  constructor(private fb: FormBuilder, private propertyService: PropertyService) {
    this.propertyForm = this.fb.group({
      title: ['', Validators.required],
      type: ['', Validators.required], // 'For Rent' or 'For Sale'
      location: ['', Validators.required],
      size: ['', [Validators.required, Validators.pattern('^[0-9]+$')]],
      price: ['', [Validators.required, Validators.pattern('^[0-9]+$')]],
      photos: [''],
      description: ['', Validators.required],
    });
  }

  ngOnInit(): void {}

  onFileChange(event: any): void {
    // Handle file changes
  }

  onSubmit(): void {
    if (this.propertyForm.valid) {
      const newProperty = this.propertyForm.value;
      newProperty.status = newProperty.type === 'For Rent' ? 'rent' : 'sale';
      this.propertyService.addProperty(newProperty);

      // Navigate back to agent-property page
      window.history.back();
    }
  }
}