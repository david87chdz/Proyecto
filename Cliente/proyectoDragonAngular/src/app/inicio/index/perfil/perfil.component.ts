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
  usuario="admin";

  nombre= localStorage.getItem('nombre');
  apellidos='Cuevas buron';

  constructor(){
    
  }

  esAdmin(usuario: string){
    if(usuario==='admin'){
      return true;
    }else{
      return false;
    }

  }

 
}
