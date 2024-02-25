import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
 
@Injectable({
  providedIn: 'root'
})
export class JuegosService {
 
  constructor(private http: HttpClient) { }
 
  retornar() {
    return this.http.get("http://127.0.0.1:8000/juego/getJuegos");
  }
 
  insertarJuego(juego: any) {
    let jsonData = JSON.stringify(juego);
    console.log(jsonData)
    return this.http.post("http://127.0.0.1:8000/juego/insertarJuego", jsonData)
    .subscribe(
      response => {
        console.log("Juego insertado correctamente:", response);
       
      },
      error => {
        console.error("Error al insertar juego:", error);
      }
    );
  }

  modificarJuego(juego:any){
    let jsonData = JSON.stringify(juego);
    console.log(jsonData)
    return this.http.put("http://127.0.0.1:8000/juego/modificaJuego", jsonData)
    .subscribe(
      response => {
        console.log("Juego Modificado correctamente:", response);
       
      },
      error => {
        console.error("Error al Modificar juego:", error);
      }
    );
  }
}
 