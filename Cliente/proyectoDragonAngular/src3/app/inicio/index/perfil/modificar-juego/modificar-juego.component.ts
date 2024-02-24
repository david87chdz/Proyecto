import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, RouterLink, RouterOutlet } from '@angular/router';
import { BuscarJuegoComponent } from '../buscar-juego/buscar-juego.component';

@Component({
  selector: 'app-modificar-juego',
  standalone: true,
  imports: [RouterLink,RouterOutlet,BuscarJuegoComponent],
  templateUrl: './modificar-juego.component.html',
  styleUrl: './modificar-juego.component.css'
})
export class ModificarJuegoComponent implements OnInit{


  id: number | undefined;

  constructor(private route: ActivatedRoute) { }

  ngOnInit(): void {
    // Recoger el ID del juego de los parámetros de la ruta
    this.route.params.subscribe(params => {
      this.id = +params['id']; // El '+' convierte el parámetro de cadena a número
    });
  }


}
