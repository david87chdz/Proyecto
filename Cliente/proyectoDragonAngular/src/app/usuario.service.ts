import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class UsuarioService {
  respuesta:any;
  constructor(private http: HttpClient) { }


  buscarUsuario(usuario: any) {
    let jsonData = JSON.stringify(usuario);
    console.log(jsonData)
    return this.http.post("http://127.0.0.1:8000/usuario/buscarUsuario", jsonData)
    .subscribe(
      response => {
        console.log("Usuario existe", response);
        this.respuesta=response;
        localStorage.setItem('usuario', this.respuesta.usuario);
      },
      error => {
        console.log("Usuario no existe", error);
        this.respuesta=error;
        //localStorage.setItem('usuario', this.respuesta.usuario);
      }
    );
    
  }
}
