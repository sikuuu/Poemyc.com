import { Component } from '@angular/core';
import { HttpService } from './http.service';
import { HostListener } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'frontend';
  usuaris:any = '';
  articles:any = '';
  buscador:any = '';
  buscadorresults:any = '';
  constructor(private http:HttpService){
    this.getUsuaris();
  }
  getUsuaris(){
    this.http.getUsuaris().subscribe((Response) => {this.usuaris = Response;
      //console.log(this.usuaris);
    });
  }

  getArticles(){
    this.http.getArticles().subscribe((Response) => {this.articles = Response;
      console.log(this.articles);
    });
  }

  /*focused() {
    this.buscadorfocused = true;
  }

  nofocused(){
    this.buscadorfocused = false;
  }*/

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

}
