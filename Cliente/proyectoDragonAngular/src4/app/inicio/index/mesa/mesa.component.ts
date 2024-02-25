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

  /* mesas: Mesa[] = [
    { id_mesa: 1, tipomesa: 1, disponible: true },
    { id_mesa: 2, tipomesa: 2, disponible: false },
    { id_mesa: 3, tipomesa: 1, disponible: true },
    { id_mesa: 4, tipomesa: 2, disponible: true }
  ]; */
  mesas!: any;
  id_mesa: any;

  constructor( private router: Router, private mesasService: MesasService) {
    this.mesasService.mesas()
    .subscribe(result => 
      this.mesas = result
      )
      console.log(this.mesas)
  }


  

  ngOnInit(): void {
    // this.elementoVisible =true;
  }

  ngOnChange(): void {
    // this.elementoVisible = !this.elementoVisible;
  }

  //  irAFormulario(){
  //   this.router.navigate(['/formulario']);
  //   this.elementoVisible = !this.elementoVisible;

  // }
  
  /*  irAFormulario(id_mesa:number){

    this.router.navigate(['/formularioMesa',id_mesa]);
    console.log(this.id_mesa)
    // this.elementoVisible = !this.elementoVisible;




} */


}
