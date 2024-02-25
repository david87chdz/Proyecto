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
  reservas:any;
  //titulo: string= 'Miguel'

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

    const fechaActual: Date = new Date();

    // Calculamos la diferencia en milisegundos
    const diferenciaMilisegundos: number = fechaReserva.getTime() - fechaActual.getTime();

    // Calculamos la diferencia en horas
    const diferenciaHoras: number = diferenciaMilisegundos / (1000 * 60 * 60);

    return diferenciaHoras >= 48; 
  }

  cambiar(id:any){
    let json={id: id};
    this.reservasService.anularReserva(json);
  }
    
  hayReservas(){
    if (this.reservas.length === 0) {
      return true;
  } else {
      return false;
  }
  }


}
