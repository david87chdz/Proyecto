import { Component } from '@angular/core';
import { Reserva } from '../../../reserva';
import { RouterLink, RouterOutlet } from '@angular/router';
import { ReservasService } from '../../../reservas.service';

@Component({
  selector: 'app-reserva',
  standalone: true,
  imports: [RouterLink,RouterOutlet],
  templateUrl: './reserva.component.html',
  styleUrl: './reserva.component.css'
})
export class ReservaComponent {
  reservas!:any;
  titulo: string= 'Miguel'
  //reservas2:any;
  constructor(private reservasService: ReservasService){
    //this.recuperar();
    
    this.reservasService.mostrarReservas();
    this.reservas=reservasService.reservas
    //console.log(this.reservas+ "En el componente")
  }
  

  botonHabilitado(fecha: any): boolean {
    const fechaReservaJSON: string = fecha;
    // Convertir fecha del JSON a fecha en JavaScript
    const fechaReserva: Date = new Date(fechaReservaJSON);

    // Obtener la fecha actual
    const fechaActual: Date = new Date();

    // Calcular la diferencia en milisegundos entre la fecha de reserva y la fecha actual
    const diferenciaMilisegundos: number = fechaReserva.getTime() - fechaActual.getTime();

    // Calcular la diferencia en horas
    const diferenciaHoras: number = diferenciaMilisegundos / (1000 * 60 * 60);

    // Comprobación
   /*  if (diferenciaHoras < 48) {
    console.log('Faltan menos de 48 horas');
    } else {
      console.log('Faltan más de 48 horas');
    } */
   
    return diferenciaHoras >= 48; 
  }

  cambiar(id:any){
    let json={id: id};
    this.reservasService.anularReserva(json);
  }
    



}
