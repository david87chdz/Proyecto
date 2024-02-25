import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { JuegosService } from '../../../../juegos.service';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { MesasService } from '../../../../mesas.service';

@Component({
  selector: 'app-agregar-juego',
  standalone: true,
  imports: [RouterLink,RouterOutlet, ReactiveFormsModule],
  templateUrl: './agregar-juego.component.html',
  styleUrl: './agregar-juego.component.css'
})
export class AgregarJuegoComponent {

  /* nuevoJuego: any = {
    nombre: 'Mara',
    min_jug: 2,
    max_jug: 4,
    // Añadir el resto ¿Como meter los campos que son objetos?
  }; */

  formJuego= new FormGroup({
    nombre: new FormControl(''),
    min_jug: new FormControl( ),
    max_jug: new FormControl(''),
    mesa: new FormControl(''),
    imagen: new FormControl('')
  })

  tipoMesa!: any;
  nuevoJuego:any;

  constructor(private juegosService: JuegosService, private tipoMesas: MesasService){
    this.tipoMesas.tipomesas()
    .subscribe(result =>
      this.tipoMesa=result
      )
  }

 

  insertarJuego() {
    this.nuevoJuego = {
      nombre: this.formJuego.value.nombre,
      min_jug: this.formJuego.value.min_jug,
      max_jug: this.formJuego.value.max_jug,
      id_mesa: this.formJuego.value.mesa,
  
    };
    this.juegosService.insertarJuego(this.nuevoJuego)
    console.log(this.nuevoJuego)
    
  }
  
 

  


 /*  onFileSelected(event: any) {
    const file: File = event.target.files[0];
  
    if (file) {
      const imagen = {
        nombreArchivo: file.name,
        tipoMIME: file.type
      };
  
      this.convertToBlob(file).then(blob => {
        this.nuevoJuego.imagen.datos = blob;
        this.nuevoJuego.imagen = imagen;
      });
    }
  }
  convertToBlob(file: File): Promise<Blob> {
    return new Promise((resolve, reject) => {
      const reader = new FileReader();
  
      reader.onloadend = () => {
        const blob = new Blob([reader.result as ArrayBuffer], { type: file.type });
        resolve(blob);
      };
  
      reader.onerror = () => {
        reject(reader.error);
      };
  
      reader.readAsArrayBuffer(file);
    });
  } */




}
