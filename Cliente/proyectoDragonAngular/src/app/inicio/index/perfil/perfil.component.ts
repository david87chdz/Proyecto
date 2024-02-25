import { Component } from '@angular/core';
import { Router, RouterLink, RouterOutlet } from '@angular/router';
import { CabeceraComponent } from '../cabecera/cabecera.component';
import { AgregarJuegoComponent } from './agregar-juego/agregar-juego.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-perfil',
  standalone: true,
  imports: [RouterLink,RouterOutlet,CabeceraComponent,AgregarJuegoComponent,ReactiveFormsModule,FormsModule],
  templateUrl: './perfil.component.html',
  styleUrl: './perfil.component.css'
})
export class PerfilComponent {

  rol=true;
  usuario=localStorage.getItem('usuario');

  nombre= localStorage.getItem('nombre');
  puntuacion= localStorage.getItem('puntuacion');
  //apellidos='Cuevas buron';

  constructor(){
    
  }

  esAdmin(){

    if(this.usuario=='Admin'){
      return true;
    }else{
      return false;
    }

  }

 
}
