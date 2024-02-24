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
    console.log(this.reservas+ "En el componente")
  }
  

  botonHabilitado(fecha: any): boolean {
    const fechaReservaJSON: string = fecha;
    // Convertir la cadena de fecha del JSON a un objeto de fecha en JavaScript
    const fechaReserva: Date = new Date(fechaReservaJSON);

    // Obtener la fecha actual
    const fechaActual: Date = new Date();

    // Calcular la diferencia en milisegundos entre la fecha de reserva y la fecha actual
    const diferenciaMilisegundos: number = fechaReserva.getTime() - fechaActual.getTime();

    // Calcular la diferencia en horas
    const diferenciaHoras: number = diferenciaMilisegundos / (1000 * 60 * 60);

    // Verificar si faltan menos de 48 horas para la reserva
    if (diferenciaHoras < 48) {
    console.log('Faltan menos de 48 horas para la reserva');
    } else {
      console.log('Faltan más de 48 horas para la reserva');
    }
   
    return diferenciaHoras >= 48; // Devuelve true si faltan más de 48 horas para la reserva
  }

  cambiar(id:any){
    let json={id: id};
    this.reservasService.anularReserva(json);
  }
    
}
