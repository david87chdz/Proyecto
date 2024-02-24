import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class UsuariosService {

  respuesta:any;
  constructor(private http: HttpClient) { }


  crearUsuario(usuario:any){
    let jsonData = JSON.stringify(usuario);
    console.log(jsonData)
    return this.http.post("http://127.0.0.1:8000/usuario/crearUsuario", jsonData)
    .subscribe(
      response=> {
        console.log("Usuario:", response);
        localStorage.setItem('usuario', this.respuesta.usuario);
        localStorage.setItem('nombre' , this.respuesta.nombre);
        localStorage.setItem('id', this.respuesta.id);
        localStorage.setItem('fecha', this.respuesta.fecha);
      },
      error =>{
        console.log(error)
      }
      
    )

    }
  

  buscarUsuario(usuario: any) {
    let jsonData = JSON.stringify(usuario);
    console.log(jsonData)
    return this.http.post("http://127.0.0.1:8000/usuario/buscarUsuario", jsonData)
    .subscribe(
      response => {
        console.log("Usuario existe", response);
        this.respuesta=response;
        localStorage.setItem('usuario', this.respuesta.usuario);
        localStorage.setItem('nombre' , this.respuesta.nombre);
        localStorage.setItem('id', this.respuesta.id);
        localStorage.setItem('fecha', this.respuesta.fecha);
      },
      error => {
        console.log("Usuario:", error);
        this.respuesta=error;
        localStorage.setItem('usuario', this.respuesta.mensaje);
      }
    );
    
  }
}
