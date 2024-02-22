import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { UsuarioService } from '../usuario.service';

@Component({
  selector: 'app-perfil',
  standalone: true,
  imports: [RouterOutlet,RouterLink],
  templateUrl: './perfil.component.html',
  styleUrl: './perfil.component.css'
})
export class PerfilComponent {

nombre:string = 'david';
apellidos:string = 'Cuevas Burón';

password: string= 'david';


  constructor(private usuarioService: UsuarioService){
    
    
  }


  usuario(){
    this.usuarioService.buscarUsuario({nickname:this.nombre, password: this.password});
  }
}
