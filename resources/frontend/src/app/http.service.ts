import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class HttpService {

  constructor(private httpClient: HttpClient) { }

  getUsuarisHome(){
    return this.httpClient.get('https://poemyc.com/api/creadorshome');
  }

  getArticles(){
    return this.httpClient.get('https://poemyc.com/myarts');
  }

  getBuscador(text){
    return this.httpClient.get('https://poemyc.com/api/buscador/'+text);
  }
}
