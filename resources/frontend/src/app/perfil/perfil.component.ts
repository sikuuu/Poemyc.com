import { Component, OnInit } from '@angular/core';
import { HttpService } from '../http.service';
import { OrderPipe } from 'ngx-order-pipe';

@Component({
  selector: 'perfil',
  templateUrl: './perfil.component.html',
  styleUrls: ['./perfil.component.css']
})
export class PerfilComponent implements OnInit {
  order  = "created_at";
  revesordre = true;
  buscadornoapi;
  activitat;
  arts:any = {
    length: 0
  };
  plans:any = {
    length: 0
  };

  http;

  constructor(private orderPipe: OrderPipe,http:HttpService) {
    var username = parent.document.getElementById('username-img').textContent;
    this.getUserArts(http,username);
    this.getUserPlans(http,username);
    this.getActivitatOfUsuari(http,username);
    this.http = http;
   }

  ngOnInit(): void {
  }

  getUserArts(http,username){
    http.getUserArts(username).subscribe((Response) => {this.arts = Response;
      this.arts = this.arts.user.articles;
      console.log(this.arts);
    });  
  }
  
  getUserPlans(http,username){
    http.getUserPlans(username).subscribe((Response) => {this.plans = Response;
      this.plans = this.plans.user.plans;

      console.log(this.plans);

    });  
  }

  getActivitatOfUsuari(http,username){
    http.getActivitatOfUsuari(username).subscribe((Response) => {this.activitat = Response;
      //this.activitat = this.activitat.user.activitat;

      console.log(this.activitat);

    });  
  }

  suscribe(pla_id){
    console.log('ok');
    this.http.suscribe(pla_id).subscribe((Response) => {
      var sub = Response;
      console.log(sub);
      if (sub == "okey") {
        alert('Te has suscrito correctamente');
      } else {
        alert('Ya estas suscrito a este plan');
      }
    })
  }

  revesordref(){
    this.revesordre = !this.revesordre;
  }

  camporder(value:string){
    this.order = value;
   }
   
  veurearticle(art){
    console.log(art);
    window.top.location.href = "/user/"+art.creador.username+"/articulo/"+art.id;
  }

  data(time){
    var parte = time.split(' ');
    var fecha = parte[0].split('-').reverse().join('-');
    var hora = parte[1].split(':');
    //console.log(time.split(' ')[0].split('-').reverse().join('-'));
    return fecha +' '+ hora[0]+':'+hora[1];
  }
}
