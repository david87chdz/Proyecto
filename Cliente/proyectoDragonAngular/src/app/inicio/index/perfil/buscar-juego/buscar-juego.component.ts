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
  
  /* juegos=[
    {
      "id": 1,
      "nombre": "Póker",
      "max_jug": 9,
      "min_jug": 2,
      "tipomesa": "Cartas"
    },
    {
      "id": 2,
      "nombre": "Monopoly",
      "max_jug": 8,
      "min_jug": 2,
      "tipomesa": "Tablero"
    },
    {
      "id": 3,
      "nombre": "Ajedrez",
      "max_jug": 2,
      "min_jug": 2,
      "tipomesa": "Tablero"
    },
    {
      "id": 4,
      "nombre": "Scrabble",
      "max_jug": 4,
      "min_jug": 2,
      "tipomesa": "Tablero"
    }
  ] */

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
