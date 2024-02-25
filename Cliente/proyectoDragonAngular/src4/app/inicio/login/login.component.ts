import { Component } from '@angular/core';
import { Router, RouterLink, RouterOutlet } from '@angular/router';
import { InicioComponent } from '../inicio.component';
import { UsuariosService } from '../../usuarios.service';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [RouterLink,RouterOutlet,InicioComponent, ReactiveFormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  usuario!:any;
  formUsuario= new FormGroup({
    nickname: new FormControl(''),
    password: new FormControl('')
  })

  constructor(private router: Router, private usuariosService: UsuariosService){

  }


  entrar(){
    this.usuario={
      nickname: this.formUsuario.value.nickname,
      password: this.formUsuario.value.password
    }
    this.usuariosService.buscarUsuario(this.usuario)
    if(localStorage.getItem('usuario')=="Admin" || localStorage.getItem('usuario')=="Socio" ){
      this.router.navigate(['/index']);
    }
  }
}
