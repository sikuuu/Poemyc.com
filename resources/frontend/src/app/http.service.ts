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

  getmyArticles(){
    return this.httpClient.get('https://poemyc.com/myarts');
  }

  getBuscador(text){
    return this.httpClient.get('https://poemyc.com/api/buscador/'+text);
  }

  getArticles(){
    return this.httpClient.get('https://poemyc.com/arts');
  }

  getmyPlans(){
    return this.httpClient.get('https://poemyc.com/myplans');
  }

  getUserArts(name){
    return this.httpClient.get('https://poemyc.com/api/userarts/'+name);
  }
  
  getUserPlans(name){
    return this.httpClient.get('https://poemyc.com/api/userplans/'+name);
  }

  suscribe(pla){
    return this.httpClient.get('https://poemyc.com/suscribe/'+pla);
  }
}
