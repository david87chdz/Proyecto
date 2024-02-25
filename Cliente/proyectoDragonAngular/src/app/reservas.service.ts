import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Reserva } from './reserva';

@Injectable({
  providedIn: 'root'
})
export class ReservasService {

  reservas!:any;
  private reservasURL='http://localhost:4200/assets/reservas.json';

  constructor(private http: HttpClient) { 

  }
  retornar(){
    return this.http.get<Reserva[]>(this.reservasURL);
  }


  aniadirReserva(reserva:any){
    let jsonData = JSON.stringify(reserva);
    return this.http.post("http://127.0.0.1:8000/reserva/aniadirReserva", reserva)
    .subscribe(
      response => {
        //return response;
        this.reservas=response;
        console.log("Reserva insertada correctamente:", this.reservas);
        //console.log(response)
      },
      error => {
        console.error("Reserva No ok:", error);
      }
    );
  }


  mostrarReservas() {
  
    let id={id: localStorage.getItem('id')}
    let jsonData = JSON.stringify(id);
   
    return this.http.post("http://127.0.0.1:8000/reserva/buscarReserva", id)
    .subscribe(
      response => {
        //return response;
        this.reservas=response;
        console.log("Reservas:", this.reservas);
        //console.log(response)
      },
      error => {
        console.log("No hay reservas para ese id:", error);
      }
    );
  }

  anularReserva(id:any){
    return this.http.put("http://127.0.0.1:8000/reserva/cambiarReserva", id)
    .subscribe(
      response => {
        //return response;
        this.reservas=response;
        console.log("Reserva Cambiada correctamente:", this.reservas);
        //console.log(response)
      },
      error => {
        console.error("No se cambio la reserva:", error);
      }
    );
  }
}
