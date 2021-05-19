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
    this.getmyArticles(http);
  }

  ngOnInit(): void {
  }

  getmyArticles(http){
    http.getmyArticles().subscribe((Response) => {this.articles = Response;

      this.articles = this.articles.articles;
      console.log(this.articles);
    });
  }

}
