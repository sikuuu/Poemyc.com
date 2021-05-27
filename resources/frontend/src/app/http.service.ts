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

  saveart(art){
    let headers:any = new Headers();
    headers.append('Content-Type','application/json');
    return (this.httpClient.post('https://poemyc.com/saveart', art,headers));
  }

  createart(art){
    let headers:any = new Headers();
    headers.append('Content-Type','application/json');
    return (this.httpClient.post('https://poemyc.com/createart', art,headers));
  }

  deleteart(artid){

    return (this.httpClient.get('https://poemyc.com/eliminarart/'+ artid));
  }

  savepla(pla){
    let headers:any = new Headers();
    headers.append('Content-Type','application/json');
    return (this.httpClient.post('https://poemyc.com/savepla', pla,headers));
  }

  createpla(pla){
    let headers:any = new Headers();
    headers.append('Content-Type','application/json');
    return (this.httpClient.post('https://poemyc.com/createpla', pla,headers));
  }

  deletepla(plaid){

    return (this.httpClient.get('https://poemyc.com/eliminarplan/'+ plaid));
  }

  

  getPlansOfArt(id){
    return this.httpClient.get('https://poemyc.com/getPlansOfArt/'+id);
  }

  addartplan(plaid,artid){
    return this.httpClient.get('https://poemyc.com/addartplan/'+plaid+'/'+artid);
  }

  delartplan(plaid,artid){
    return this.httpClient.get('https://poemyc.com/delartplan/'+plaid+'/'+artid);
  }

  getLikedArticles(){
    return this.httpClient.get('https://poemyc.com/getliked');
  }

  getActivitat(){
    return this.httpClient.get('https://poemyc.com/api/totaactivitat');
  }
  
}
