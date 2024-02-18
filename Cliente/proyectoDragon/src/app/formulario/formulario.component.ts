import { Component } from '@angular/core';
import { RouterOutlet, RouterLink, ActivatedRoute , ParamMap} from '@angular/router';
import { Router } from '@angular/router';
import { Location } from '@angular/common';
@Component({
  selector: 'app-formulario',
  standalone: true,
  imports: [RouterOutlet,RouterLink],
  templateUrl: './formulario.component.html',
  styleUrl: './formulario.component.css'
})
export class FormularioComponent {
 
  idmesa=0;

  constructor( private router: Router, private activatedRoute: ActivatedRoute) {
    this.activatedRoute.paramMap.subscribe((parametros: ParamMap) => {
      this.idmesa = parseInt(parametros.get("id")!);

    })
  }

  volverAtras() {
    this.router.navigate(['/mesa']);
  }

}
