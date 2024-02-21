import { Component, ElementRef, OnInit, Renderer2 } from '@angular/core';
import { Mesa } from '../mesa';
import { Router } from '@angular/router';
import { FormComponent } from './form/form.component';
import { MesasService } from '../mesas.service';
@Component({
  selector: 'app-mesa',
  standalone: true,
  imports: [FormComponent],
  templateUrl: './mesa.component.html',
  styleUrl: './mesa.component.css'
})
export class MesaComponent implements OnInit{

  // mesas: Mesa[] = [
  //   { id_Mesa: 1, tipomesa: 1, disponible: true },
  //   { id_Mesa: 2, tipomesa: 2, disponible: false },
  //   { id_Mesa: 3, tipomesa: 1, disponible: true },
  //   { id_Mesa: 4, tipomesa: 2, disponible: true }
  // ];

  id_mesa: number = 7;
  id_usuario: number=345;
  tipomesa: number = 2;
  disponible: boolean = true;
  elementoVisible: boolean = true;

  mesas: any;

  // ,private elRef: ElementRef, private renderer: Renderer2
  constructor( private router: Router, private mesasService: MesasService) {
  
    this.mesasService.mesas()
    .subscribe(result => 
      this.mesas = result
      )
      //console.log(this.mesas)
  }
  ngOnInit(): void {
    // this.elementoVisible =true;
    //this.mesas=this.mesasService.mesas()
  }

  ngOnChange(): void {
    // this.elementoVisible = !this.elementoVisible;
  }

  //  irAFormulario(){
  //   this.router.navigate(['/formulario']);
  //   this.elementoVisible = !this.elementoVisible;

  // }
  
   irAFormulario(id_mesa:number){

    this.router.navigate(['/formulario',this.id_mesa, this.id_usuario]);
    console.log(this.id_mesa)
    // this.elementoVisible = !this.elementoVisible;


   }



}