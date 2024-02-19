import { Routes,RouterModule } from '@angular/router';
import { MesaComponent } from './mesa/mesa.component';
import { FormularioComponent } from './formulario/formulario.component';
import { FormComponent } from './mesa/form/form.component';
import { PerfilComponent } from './perfil/perfil.component';
import { Component } from '@angular/core';
import { NgModule } from '@angular/core';

export const routes: Routes = [

{
path: 'formulario',
component : FormularioComponent

},
{
    path: 'mesa',
    component: MesaComponent,
    children: [{
        path: 'form',
        component: FormComponent
    }
    ]
},
{
    path: 'perfil',
    component: PerfilComponent
}

]

 @NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
  })
  
   export class AppRoutingModule { }