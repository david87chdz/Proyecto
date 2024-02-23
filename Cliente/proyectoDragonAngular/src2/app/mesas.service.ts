import { Injectable } from '@angular/core';
import { Mesa } from './mesa';
import { HttpClient } from '@angular/common/http';
// import { HttpClient, HttpErrorResponse } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class MesasService {

  constructor(private http: HttpClient) { 
    
  }

  mesas(){
    return this.http.get("http://127.0.0.1:8000/mesa/getMesas");
  }


}
