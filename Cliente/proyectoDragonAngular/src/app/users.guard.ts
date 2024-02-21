import { CanActivateFn } from '@angular/router';
import { UsuarioService } from './usuario.service';
const sesion=localStorage.getItem('usuario');
export const usersGuard: CanActivateFn = (route, state) => {
  if(sesion=='Admin'){
    return true;
  }else{
    return false;
  }
};
