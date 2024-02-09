import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-perfil',
  standalone: true,
  imports: [RouterOutlet,RouterLink],
  templateUrl: './perfil.component.html',
  styleUrl: './perfil.component.css'
})
export class PerfilComponent {

nombre:string = 'Miguel';
apellidos:string = 'Cuevas Burón';

}
