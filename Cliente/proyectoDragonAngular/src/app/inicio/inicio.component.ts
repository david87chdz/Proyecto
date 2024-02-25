import { Component } from '@angular/core';
import { Router, RouterLink, RouterOutlet } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { AppComponent } from '../app.component';
import { ImagenesService } from '../imagenes.service';

@Component({
  selector: 'app-inicio',
  standalone: true,
  imports: [RouterLink,RouterOutlet,LoginComponent],
  templateUrl: './inicio.component.html',
  styleUrl: './inicio.component.css'
})
export class InicioComponent {

  imagenes:any[]=[];
  constructor(private router: Router, private imagenesService: ImagenesService){
    this.imagenes=this.imagenesService.getImagenes();
  }

  irALogin(){

    this.router.navigate(['login']);
    // this.elementoVisible = !this.elementoVisible;


   }

   irARegistro(){
    this.router.navigate(['registro']);
   }
}
