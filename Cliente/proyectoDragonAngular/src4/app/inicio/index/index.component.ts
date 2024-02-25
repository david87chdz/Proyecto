import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { CabeceraComponent } from './cabecera/cabecera.component';
import { PerfilComponent } from './perfil/perfil.component';
import { MesaComponent } from './mesa/mesa.component';
import { FooterComponent } from '../../footer/footer.component';

@Component({
  selector: 'app-index',
  standalone: true,
  imports: [RouterLink,RouterOutlet,CabeceraComponent,PerfilComponent,MesaComponent,FooterComponent],
  templateUrl: './index.component.html',
  styleUrl: './index.component.css'
})
export class IndexComponent {

  
}
