import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BuscarJuegoComponent } from './buscar-juego.component';

describe('BuscarJuegoComponent', () => {
  let component: BuscarJuegoComponent;
  let fixture: ComponentFixture<BuscarJuegoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [BuscarJuegoComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(BuscarJuegoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
