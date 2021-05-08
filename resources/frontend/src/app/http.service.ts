import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class HttpService {

  constructor(private httpClient: HttpClient) { }

  getUsuaris(){
    return this.httpClient.get('https://poemyc.com/api/users');
  }

  getArticles(){
    return this.httpClient.get('https://poemyc.com/api/articles');
  }

  getBuscador(){
    return this.httpClient.get('https://poemyc.com/api/buscador');
  }
}
