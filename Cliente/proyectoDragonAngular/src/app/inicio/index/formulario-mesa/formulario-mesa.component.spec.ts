import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormularioMesaComponent } from './formulario-mesa.component';

describe('FormularioMesaComponent', () => {
  let component: FormularioMesaComponent;
  let fixture: ComponentFixture<FormularioMesaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [FormularioMesaComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(FormularioMesaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
