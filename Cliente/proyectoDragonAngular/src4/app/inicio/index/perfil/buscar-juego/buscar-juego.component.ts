import { Component } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { Router, RouterLink, RouterOutlet } from '@angular/router';
import { ModificarJuegoComponent } from '../modificar-juego/modificar-juego.component';
import { JuegosService } from '../../../../juegos.service';
@Component({
  selector: 'app-buscar-juego',
  standalone: true,
  imports: [RouterLink,RouterOutlet,ReactiveFormsModule,FormsModule,ModificarJuegoComponent],
  templateUrl: './buscar-juego.component.html',
  styleUrl: './buscar-juego.component.css'
})
export class BuscarJuegoComponent {
  juego='';
  
  

  juegos!:any;
  usuario= localStorage.getItem('usuario')
constructor(private router:Router, private juegosService: JuegosService){
  this.juegosService.retornar()
  .subscribe(result => 
    this.juegos = result
    )
    console.log(this.juegos)
}

modificar(id : number){
  this.router.navigate((['/modificar',id]));
}

esAdmin(){

  if(this.usuario=='Admin'){
    return true;
  }else{
    return false;
  }

}

}
