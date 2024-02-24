import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { MesaComponent } from '../mesa/mesa.component';

@Component({
  selector: 'app-add-mesa',
  standalone: true,
  imports: [RouterLink,RouterOutlet,MesaComponent],
  templateUrl: './add-mesa.component.html',
  styleUrl: './add-mesa.component.css'
})
export class AddMesaComponent {

}
