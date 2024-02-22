import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { RouterOutlet, RouterLink, ParamMap, ActivatedRoute} from '@angular/router';
import { Router } from '@angular/router';
import { JuegosService } from '../juegos.service';
//import { Location } from '@angular/common';
@Component({
  selector: 'app-formulario',
  standalone: true,
  imports: [RouterOutlet,RouterLink, ReactiveFormsModule],
  templateUrl: './formulario.component.html',
  styleUrl: './formulario.component.css'
})
export class FormularioComponent {
 
  idmesa:number=0;
  idusuario:number=0;
  juegos: any=[];

  
  
  formReserva = new FormGroup({
    mesa: new FormControl(this.idmesa),
    usuario: new FormControl(this.idusuario)
  })

  constructor( private router: Router, private activatedRoute: ActivatedRoute, private juegosService: JuegosService) {
    this.activatedRoute.paramMap.subscribe((parametros: ParamMap) => {
      //Importantisimo llamar al parametro como lo hemos llamado en routes
      this.idmesa = parseInt(parametros.get("id_mesa")!);
      this.idusuario = parseInt(parametros.get("id_usuario")!);
      //console.log(this.idmesa)
    })

    this.juegosService.retornar()
      .subscribe(result => 
        this.juegos = result
        )
        console.log(this.juegos)
  }
  //console.log(this.juegos);
  volverAtras() {
    this.router.navigate(['/mesa']);
  }

  //Prueba
  nuevoJuego: any = {
    nombre: 'Mara',
    min_jug: 2,
    max_jug: 4,
    // Añaadir el resto ¿Como meter los campos que son objetos?
  };

  insertarJuego() {
    this.juegosService.insertarJuego(this.nuevoJuego)
    console.log(this.nuevoJuego)
    
  }

}
