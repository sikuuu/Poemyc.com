import { Component, OnInit } from '@angular/core';
import { HttpService } from '../http.service';


@Component({
  selector: 'articles',
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.css']
})
export class ArticleComponent implements OnInit {

  articles:any = '';

  constructor(http:HttpService) { 
    this.getArticles(http);
  }

  ngOnInit(): void {
  }

  getArticles(http){
    http.getArticles().subscribe((Response) => {this.articles = Response;
      console.log(this.articles);
    });
  }

}
