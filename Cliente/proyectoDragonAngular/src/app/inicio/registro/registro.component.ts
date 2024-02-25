import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { UsuariosService } from '../../usuarios.service';

@Component({
  selector: 'app-registro',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './registro.component.html',
  styleUrl: './registro.component.css'
})
export class RegistroComponent {
  
  usuario!: any;

  formRegistro= new FormGroup({
    nombre: new FormControl(''),
    apellidos: new FormControl(''),
    nickname: new FormControl(''),
    password: new FormControl('')
  })

  constructor(private router: Router, private usuariosService: UsuariosService){

  }



  entrar(){
    this.usuario={
      nombre: this.formRegistro.value.nombre,
      apellidos: this.formRegistro.value.apellidos,
      nickname: this.formRegistro.value.nickname,
      password: this.formRegistro.value.password
    }

    this.usuariosService.crearUsuario(this.usuario);

    this.router.navigate(['/index']);
  }
}
