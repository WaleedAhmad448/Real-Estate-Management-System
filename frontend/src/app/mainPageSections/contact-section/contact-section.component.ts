import { Component } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import emailjs from 'emailjs-com';

@Component({
  selector: 'app-contact-section',
  templateUrl: './contact-section.component.html',
  styleUrls: ['./contact-section.component.css'],
  standalone: true,
  imports: [ReactiveFormsModule]
})
export class ContactSectionComponent {
  contactForm: FormGroup;

  constructor(private fb: FormBuilder) {
    this.contactForm = this.fb.group({
      name: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      message: ['', Validators.required]
    });
  }

  onSubmit() {
    if (this.contactForm.valid) {
      const formData = this.contactForm.value;
      
      emailjs.send('service_9a64btd', 'template_c5n8axb', {
        from_name: formData.name,
        from_email: formData.email,
        message: formData.message,
      }, 'EMhmC_4ukwCaoXPvn')
      .then((response) => {
        console.log('SUCCESS!', response.status, response.text);
        alert('Your message has been sent. Thank you!');
        this.contactForm.reset();
      }, (err) => {
        console.error('FAILED...', err);
        alert('There was an error sending your message.');
      });
    } else {
      alert('Please fill out the form correctly.');
    }
  }
}
