import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { MesaComponent } from './mesa/mesa.component';
import { CabeceraComponent } from './cabecera/cabecera.component';


@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, RouterOutlet,MesaComponent,CabeceraComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'pruebaRutasDragon01';
mostrarI:boolean=true;

  mostrar(){
this.mostrarI=false;
  }

}
