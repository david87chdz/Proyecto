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

  mesa:any;
  //mesas: Mesa[] =[];

  id: number = 1;
  tipomesa: number = 2;
  disponible: boolean = true;
  elementoVisible: boolean = true;
  // ,private elRef: ElementRef, private renderer: Renderer2
  constructor( private mesaService: MesasService) {
  
    this.mesaService.retornar()
    .subscribe(result=>this.mesa=result)

  }
  ngOnInit(): void {
    // this.elementoVisible =true;
  }

  ngOnChange(): void {
    this.elementoVisible = !this.elementoVisible;
  }

   irAFormulario(){
    this.router.navigate(['/formulario']);
    this.elementoVisible = !this.elementoVisible;


  }


}