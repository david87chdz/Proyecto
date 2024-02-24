export interface Reserva {
    id_reserva:number,
    idUsuario:number,
    idJuego: number,
    idMesa:number,
    completado:boolean,
    fecha_inicio:Date,
    fecha_fin:Date

}
