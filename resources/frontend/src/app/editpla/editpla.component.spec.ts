import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditplaComponent } from './editpla.component';

describe('EditplaComponent', () => {
  let component: EditplaComponent;
  let fixture: ComponentFixture<EditplaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditplaComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditplaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
