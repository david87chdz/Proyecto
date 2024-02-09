import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { RouterOutlet, RouterLink, ParamMap, ActivatedRoute} from '@angular/router';
import { Router } from '@angular/router';
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

  formReserva = new FormGroup({
    mesa: new FormControl(this.idmesa),
    usuario: new FormControl(this.idusuario)
  })

  constructor( private router: Router, private activatedRoute: ActivatedRoute) {
    this.activatedRoute.paramMap.subscribe((parametros: ParamMap) => {
      this.idmesa = parseInt(parametros.get("id_mesa")!);
      this.idusuario = parseInt(parametros.get("id_usuario")!);
      //console.log(this.idmesa)
    })
  }
 
  volverAtras() {
    this.router.navigate(['/mesa']);
  }

}
