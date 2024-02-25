import { Component } from '@angular/core';
import { ActivatedRoute, ParamMap, Router, RouterLink, RouterOutlet } from '@angular/router';
import { JuegosService } from '../../../juegos.service';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ReservasService } from '../../../reservas.service';

@Component({
  selector: 'app-formulario-mesa',
  standalone: true,
  imports: [RouterLink,RouterOutlet, ReactiveFormsModule, FormsModule],
  templateUrl: './formulario-mesa.component.html',
  styleUrl: './formulario-mesa.component.css'
})
export class FormularioMesaComponent {
  idmesa!: any;
  juegos!:any;
  usuario= localStorage.getItem('id');
  fecha: string =""
  fechaHoraInicio!: Date;
  fechaHoraFin!: Date;
  reserva!: any;

  formReserva= new FormGroup({
    juego: new FormControl(''),
    //fecha_inicio: new FormControl(),
    duracion: new FormControl(),
  })
  

  hora(event: any) {
    this.fecha = event.target.value;
    console.log('Fecha y hora seleccionada:', this.fecha);
    console.log(typeof(this.fecha));
    // Convertir this.fecha a un objeto Date
    this.fechaHoraInicio = new Date(this.fecha);
    this.calcularHoraFin();
  }

  calcularHoraFin() {
    // Asegúrate de que this.formReserva.value.duracion tenga el valor esperado en horas
    const duracionHoras = this.formReserva.value.duracion;
    const duracionMilisegundos = duracionHoras * 60 * 60 * 1000; // Convertir horas a milisegundos

    // Añadir la duración a la hora de inicio para obtener la hora de fin
    this.fechaHoraFin = new Date(this.fechaHoraInicio.getTime() + duracionMilisegundos);

    // Formatear la hora de fin en caso de necesitarlo
    console.log('Hora de fin:', this.fechaHoraFin);
}



  constructor(private router: Router, private juegosService: JuegosService, 
    private activatedRoute: ActivatedRoute, private reservasService: ReservasService){
    this.activatedRoute.paramMap.subscribe((parametros: ParamMap) => {
      this.idmesa = parseInt(parametros.get("id")!);
    })
    this.juegosService.retornar()
    .subscribe(result => 
      this.juegos = result
      )
      console.log(this.juegos)
  }
 
  enviar(){
    this.reserva={
      fecha_inicio: this.fechaHoraInicio,
      fecha_fin: this.fechaHoraFin,
      juego_id: this.formReserva.value.juego,
      usuario_id: localStorage.getItem('id'),
      mesa_id: this.idmesa
    }

    this.reservasService.aniadirReserva(this.reserva);
    //console.log(this.reserva);
    /* console.log(this.fechaHoraInicio)
    console.log(this.fechaHoraFin)
    console.log(this.formReserva.value.duracion) */
    this.router.navigate(['/index/mesa']);
  }

}
