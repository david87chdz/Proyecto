import { Component } from '@angular/core';
import { Router, RouterLink, RouterOutlet } from '@angular/router';
import { CabeceraComponent } from '../cabecera/cabecera.component';
import { Mesa } from '../../../mesa';
import { FormularioMesaComponent } from '../formulario-mesa/formulario-mesa.component';
import { AddMesaComponent } from '../add-mesa/add-mesa.component';
import { MesasService } from '../../../mesas.service';

@Component({
  selector: 'app-mesa',
  standalone: true,
  imports: [RouterLink,RouterOutlet,CabeceraComponent,FormularioMesaComponent,AddMesaComponent],
  templateUrl: './mesa.component.html',
  styleUrl: './mesa.component.css'
})
export class MesaComponent {

  
  mesas!: any;
  id_mesa: any;

  constructor( private router: Router, private mesasService: MesasService) {
    this.mesasService.mesas()
    .subscribe(result => 
      this.mesas = result
      )
  }




}
