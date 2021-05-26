import { Component, OnInit } from '@angular/core';
import { HttpService } from '../http.service';
import { faEye } from '@fortawesome/free-solid-svg-icons';
import { OrderPipe } from 'ngx-order-pipe';

@Component({
  selector: 'favoritos',
  templateUrl: './favoritos.component.html',
  styleUrls: ['./favoritos.component.css']
})
export class FavoritosComponent implements OnInit {
  veure = faEye;
  order  = "created_at";
  revesordre = true;
  buscadornoapi;
  articles:any = '';
  http;

  constructor(private orderPipe: OrderPipe,http: HttpService) { 
    this.getLikedArticles(http);
    this.http = http;
  }

  ngOnInit(): void {
  }

  getLikedArticles(http){
    http.getLikedArticles().subscribe((Response) => {this.articles = Response;

      this.articles = this.articles.arts;
      console.log(this.articles);
    });
  }

  veurearticle(art){
    //console.log(art);
    window.top.location.href = "/user/"+art.creador.username+"/articulo/"+art.id;
  }

  revesordref(){
    this.revesordre = !this.revesordre;
   }

   camporder(value:string){
    this.order = value;
   }
}
