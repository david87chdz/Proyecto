import { Component } from '@angular/core';
import { Router, RouterLink, RouterOutlet } from '@angular/router';
import { InicioComponent } from '../inicio.component';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [RouterLink,RouterOutlet,InicioComponent],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {


  constructor(private router: Router){

  }


  entrar(){
    this.router.navigate(['/index']);
  }
}
