import { Component } from '@angular/core';
import { HttpService } from './http.service';
import { HostListener } from '@angular/core';

@Component({
  selector: 'app',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  ruta;

  constructor(private http:HttpService){
    this.ruta = window.top.location.pathname;
   }

}
