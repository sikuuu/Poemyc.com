import { Component } from '@angular/core';
import { HttpService } from '../http.service';
import { HostListener } from '@angular/core';

@Component({
  selector: 'home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent {
  title = 'frontend';
  usuaris:any = '';
  articles:any = '';
  buscador:any = '';
  buscadorresults:any = '';
  constructor(private http:HttpService){
    this.getUsuarisHome();
  }
  getUsuarisHome(){
    this.http.getUsuarisHome().subscribe((Response) => {this.usuaris = Response;
      console.log(this.usuaris);
    });
  }

  getArticles(){
    this.http.getArticles().subscribe((Response) => {this.articles = Response;
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

}
