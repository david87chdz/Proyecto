import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ImagenesService {

  constructor() { }
  getImagenes() {
    return [
      { id: 1, nombre:'ajedre', imagen: 'http://localhost:4200/assets/images/chess.jpg' },
      { id: 2, nombre:'dragon', imagen: 'http://localhost:4200/assets/images/continuar.png' },
      { id: 3, nombre:'monopolio', imagen: 'http://localhost:4200/assets/images/monopoly.jpg' },
      { id: 4,  nombre:'hachis',imagen: 'http://localhost:4200/assets/images/parchis.png' }
    ];
  }
}
