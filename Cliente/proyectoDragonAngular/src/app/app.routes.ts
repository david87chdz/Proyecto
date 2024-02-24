import { Routes } from '@angular/router';
import { LoginComponent } from './inicio/login/login.component';
import { RegistroComponent } from './inicio/registro/registro.component';
import { InicioComponent } from './inicio/inicio.component';
import { IndexComponent } from './inicio/index/index.component';
import { MesaComponent } from './inicio/index/mesa/mesa.component';
import { PerfilComponent } from './inicio/index/perfil/perfil.component';
import { ReservaComponent } from './inicio/index/reserva/reserva.component';
import { AgregarJuegoComponent } from './inicio/index/perfil/agregar-juego/agregar-juego.component';
import { BuscarJuegoComponent } from './inicio/index/perfil/buscar-juego/buscar-juego.component';
import { ModificarJuegoComponent } from './inicio/index/perfil/modificar-juego/modificar-juego.component';
import { FormularioMesaComponent } from './inicio/index/formulario-mesa/formulario-mesa.component';
import { AddMesaComponent } from './inicio/index/add-mesa/add-mesa.component';
import { usersGuard } from './users.guard';


export const routes: Routes = [

    {
        path: 'inicio',
        component: InicioComponent,
    
    },
    {
        path: 'login',
        component: LoginComponent
    },
    {
        path: 'registro',
        component: RegistroComponent
    },
    {
        path:'index',
        component:IndexComponent,
        //canActivate: [usersGuard],
        children:[
            {
                path:'mesa',
                component:MesaComponent,
                //canActivate: [usersGuard],
            },
            {
                path: 'formularioMesa/:id',
                component: FormularioMesaComponent
            },
            {
                path:'perfil',
                component:PerfilComponent,
                children:[{
                    path: 'agregar',
                    component: AgregarJuegoComponent
                },
                {
                    path: 'buscar',
                    component:BuscarJuegoComponent,
                   
                },
                {
                    path: 'modificar/:id',
                    component: ModificarJuegoComponent
                }
            ]
            },
            {
                path:'reserva',
                component:ReservaComponent
            },
            {
                path:'addmesa',
                component: AddMesaComponent

            }
        ]
    },
 


    {
    path:'',
    redirectTo:'inicio',
    pathMatch:'full'
    }
];
