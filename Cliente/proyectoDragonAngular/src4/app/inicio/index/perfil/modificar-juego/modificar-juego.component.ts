import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, RouterLink, RouterOutlet } from '@angular/router';
import { BuscarJuegoComponent } from '../buscar-juego/buscar-juego.component';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { JuegosService } from '../../../../juegos.service';

@Component({
  selector: 'app-modificar-juego',
  standalone: true,
  imports: [RouterLink,RouterOutlet,BuscarJuegoComponent, ReactiveFormsModule],
  templateUrl: './modificar-juego.component.html',
  styleUrl: './modificar-juego.component.css'
})
export class ModificarJuegoComponent implements OnInit{


  id: number | undefined;

  formJuego= new FormGroup({
    nombre: new FormControl(''),
    min_jug: new FormControl(''),
    max_jug: new FormControl('')
  })

  juego!: any;

  constructor(private route: ActivatedRoute, private juegosService: JuegosService) { }

  ngOnInit(): void {
    // Recoger el ID del juego de los parámetros de la ruta
    this.route.params.subscribe(params => {
      this.id = +params['id']; // El '+' convierte el parámetro de cadena a número
    });
  }

  modificar(){
    this.juego={
      id: this.id,
      nombre: this.formJuego.value.nombre,
      min_jug: this.formJuego.value.min_jug,
      max_jug: this.formJuego.value.max_jug
    }
    this.juegosService.modificarJuego(this.juego);
  }
}
