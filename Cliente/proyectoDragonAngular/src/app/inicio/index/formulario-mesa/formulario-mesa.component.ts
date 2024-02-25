import { Component } from '@angular/core';
import {
  ActivatedRoute,
  ParamMap,
  Router,
  RouterLink,
  RouterOutlet,
} from '@angular/router';
import { JuegosService } from '../../../juegos.service';
import {
  FormControl,
  FormGroup,
  FormsModule,
  ReactiveFormsModule,
} from '@angular/forms';
import { ReservasService } from '../../../reservas.service';

@Component({
  selector: 'app-formulario-mesa',
  standalone: true,
  imports: [RouterLink, RouterOutlet, ReactiveFormsModule, FormsModule],
  templateUrl: './formulario-mesa.component.html',
  styleUrl: './formulario-mesa.component.css',
})
export class FormularioMesaComponent {
  idmesa!: any;
  juegos!: any;
  usuario = localStorage.getItem('id');
  fecha: string = '';
  fechaHoraInicio!: Date;
  fechaHoraFin!: Date;
  reserva!: any;
  fechaActual!: any;

  formReserva = new FormGroup({
    juego: new FormControl(''),
    //fecha_inicio: new FormControl(),
    duracion: new FormControl(),
  });

  hora(event: any) {
    this.fecha = event.target.value;
    //console.log('Fecha y hora seleccionada:', this.fecha);
    this.fechaActual = new Date();
    this.fechaHoraInicio = new Date(this.fecha);
  }

  calcularHoraFin() {
    const duracionHoras = this.formReserva.value.duracion;
    // Convertir a milisegundos
    const duracionMilisegundos = duracionHoras * 60 * 60 * 1000;

    // Añadir la duración a la hora de inicio para obtener la hora fin
    this.fechaHoraFin = new Date(
      this.fechaHoraInicio.getTime() + duracionMilisegundos
    );
  }

  constructor(
    private router: Router,
    private juegosService: JuegosService,
    private activatedRoute: ActivatedRoute,
    private reservasService: ReservasService
  ) {
    this.activatedRoute.paramMap.subscribe((parametros: ParamMap) => {
      this.idmesa = parseInt(parametros.get('id')!);
    });
    this.juegosService.retornar().subscribe((result) => (this.juegos = result));
    console.log(this.juegos);
  }

  enviar() {
    this.calcularHoraFin();
    this.reserva = {
      fecha_inicio: this.fechaHoraInicio,
      fecha_fin: this.fechaHoraFin,
      juego_id: this.formReserva.value.juego,
      usuario_id: localStorage.getItem('id'),
      mesa_id: this.idmesa,
    };

    let fechaActual = new Date();

    if (this.fechaHoraInicio <= fechaActual) {
      alert(
        'La fecha y hora seleccionada debe ser mayor que la fecha y hora actual.'
      );
    } else {
      this.reservasService.aniadirReserva(this.reserva);

      this.router.navigate(['/index/mesa']);
    }
  }
}
