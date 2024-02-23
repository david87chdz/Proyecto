import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink, RouterOutlet } from '@angular/router';
import { InicioComponent } from './inicio/inicio.component';
import { IndexComponent } from './inicio/index/index.component';
import { MesaComponent } from './inicio/index/mesa/mesa.component';
import { PerfilComponent } from './inicio/index/perfil/perfil.component';
import { FooterComponent } from './footer/footer.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, RouterOutlet,InicioComponent,RouterLink,IndexComponent,MesaComponent,PerfilComponent,FooterComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'pruebaDragon003';
}
