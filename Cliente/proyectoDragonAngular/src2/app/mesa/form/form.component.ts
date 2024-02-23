import { Component } from '@angular/core';
import { RouterOutlet, RouterLink } from '@angular/router';
import { Location } from '@angular/common';
@Component({
  selector: 'app-form',
  standalone: true,
  imports: [RouterOutlet,RouterLink],
  templateUrl: './form.component.html',
  styleUrl: './form.component.css'
})
export class FormComponent {


  constructor(private location: Location) {

  }

  volverAtras() {
    this.location.back();
  }

  
}
