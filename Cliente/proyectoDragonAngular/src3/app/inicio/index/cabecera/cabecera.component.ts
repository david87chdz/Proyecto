import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { FormularioMesaComponent } from '../formulario-mesa/formulario-mesa.component';


@Component({
  selector: 'app-cabecera',
  standalone: true,
  imports: [RouterLink,RouterOutlet],
  templateUrl: './cabecera.component.html',
  styleUrl: './cabecera.component.css'
})
export class CabeceraComponent {

}
