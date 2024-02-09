import { Component } from '@angular/core';
import { RouterOutlet, RouterLink } from '@angular/router';
import { Router } from '@angular/router';
import { Location } from '@angular/common';
@Component({
  selector: 'app-formulario',
  standalone: true,
  imports: [RouterOutlet,RouterLink],
  templateUrl: './formulario.component.html',
  styleUrl: './formulario.component.css'
})
export class FormularioComponent {
 
  

  constructor( private router: Router) {

  }

  volverAtras() {
    this.router.navigate(['/mesa']);

  }

}
