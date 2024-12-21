import { Component, OnInit, Inject, PLATFORM_ID } from '@angular/core';
import { isPlatformBrowser } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { NavbarComponent } from "./navbar/navbar.component";
import { PaginationComponent } from "./pagination/pagination.component";
import { MainComponent } from "./mainPageSections/main/main.component";
import { PropertyCardComponent } from './property-card/property-card.component';
import { AgentPropertyComponent } from './agent-property/agent-property.component';


@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, PaginationComponent, AgentPropertyComponent, PropertyCardComponent, NavbarComponent, MainComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'PalEstate';
  isBrowser: boolean;

  constructor(@Inject(PLATFORM_ID) private platformId: Object) {
    this.isBrowser = isPlatformBrowser(this.platformId);
  }

  ngOnInit() {
    if (this.isBrowser) {
      import('aos').then((AOS) => {
        AOS.default.init();
      });
    }
  }
}
