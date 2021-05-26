import { Component } from '@angular/core';
import { HttpService } from '../http.service';
import { HostListener } from '@angular/core';
import { faEye,faSearch } from '@fortawesome/free-solid-svg-icons';
import { OrderPipe } from 'ngx-order-pipe';


@Component({
  selector: 'home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent {
  title = 'frontend';
  order  = "created_at";
  revesordre = true;
  buscadornoapi;
  veure = faEye;
  search = faSearch;
  usuaris:any = '';
  articles:any = '';
  buscador:any = '';
  buscadorresults:any = '';
  constructor(private orderPipe: OrderPipe,private http:HttpService){
    this.getUsuarisHome();
    this.getArticles();
  }

  getUsuarisHome(){
    this.http.getUsuarisHome().subscribe((Response) => {this.usuaris = Response;
      console.log(this.usuaris);
    });
  }

  getArticles(){
    this.http.getArticles().subscribe((Response) => {this.articles = Response;
      this.articles = this.articles.arts;
      console.log(this.articles);
    });
  }

  updatebuscador(){
    if (this.buscador != ''){
    this.http.getBuscador(this.buscador).subscribe((Response) => {this.buscadorresults = Response;
      console.log(this.buscadorresults);
    });  
    } else {
      this.buscadorresults = '';
      console.log(this.buscadorresults);
    }
    
  }

  articleslength(){
    if (this.buscadorresults != '') {
      return ' - ('+this.buscadorresults.articles.length+')';
    }
  }

  usuarislength(){
    if (this.buscadorresults != '') {
      return ' - ('+this.buscadorresults.users.length+')';
    }
  }
  planslength(){
    if (this.buscadorresults != '') {
      return ' - ('+this.buscadorresults.plans.length+')';
    }
  }

  viewprofile(usuari){
    window.top.location.href = "/user/"+usuari;
  }

  veurearticle(art){
    console.log(art);
    window.top.location.href = "/user/"+art.creador.username+"/articulo/"+art.id;
  }

  revesordref(){
    this.revesordre = !this.revesordre;
   }

   camporder(value:string){
    this.order = value;
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

}
