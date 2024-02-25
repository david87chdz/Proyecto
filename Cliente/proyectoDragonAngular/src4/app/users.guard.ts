import { CanActivateFn } from '@angular/router';
 
const sesion=localStorage.getItem('usuario');
export const usersGuard: CanActivateFn = (route, state) => {
  if(sesion=='Admin' || sesion=="Socio"){
    return true;
  }else{
    return false;
  }
};