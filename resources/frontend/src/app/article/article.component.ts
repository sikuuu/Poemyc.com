import { Component, OnInit } from '@angular/core';
import { HttpService } from '../http.service';
import { faEye,faPlusSquare,faTrash,faPencilAlt,faLayerGroup,faSearch,faSort } from '@fortawesome/free-solid-svg-icons';
import { EditartComponent } from '../editart/editart.component';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { OrderPipe } from 'ngx-order-pipe';


@Component({
  selector: 'articles',
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.css']
})
export class ArticleComponent implements OnInit {
  add = faPlusSquare;
  del = faTrash;
  veure = faEye;
  search = faSearch;
  sort = faSort;

  order  = "created_at";
  revesordre = true;
  buscadornoapi;
  edit = faPencilAlt;
  plans = faLayerGroup;
  articles:any = '';
  plansofart = [];
  http;

  constructor(private orderPipe: OrderPipe,http:HttpService, private modalService: NgbModal) { 
    this.getmyArticles(http);

    this.http = http;
  }

  ngOnInit(): void {
  }

  getmyArticles(http){
    http.getmyArticles().subscribe((Response) => {this.articles = Response;

      this.articles = this.articles.articles;
      console.log(this.articles);
    });
  }

  saveart(http, art){
    http.saveart(art).subscribe((Response) => {
    //console.log(Response);
    });
  }

  createart(http,art){
    http.createart(art).subscribe((Response) => {
      var data = Response;
      
      if (data.created == 'yes') {
        //console.log('megagay');
        this.getmyArticles(http);
      }
    });
  }

  deleteart(art){
    if (confirm('¿Seguro que quieres borrar el artículo "'+art.name+'"?')){
      this.http.deleteart(art.id).subscribe((Response) => {
        //console.log(Response);
        var data = Response;
        if (data.deleted == 'yes') {
        this.articles.splice(this.articles.indexOf(art),1);
        }
      });
    }
  }

  changeartplan(plaid,artid,event){

    if (event.target.checked) {
      this.http.addartplan(plaid,artid).subscribe((Response) => {
       
      });
    } else {
      this.http.delartplan(plaid,artid).subscribe((Response) => {

      });
    }
  }

  openModal(art) {
    
    const modalRef = this.modalService.open(EditartComponent,{ size: 'lg' });
    modalRef.componentInstance.art = art;

    modalRef.result.then((data) => {
      console.log(data);
      if (data != 'res'){
        if (data[1]){
          console.log('create');
          this.createart(this.http,data[0])
          //this.articles.push(data[0]);
        } else {
          console.log('update');

          this.saveart(this.http,data[0]);
        }
      }
    });
  }

  getPlansOfArt(t,art){
    this.http.getPlansOfArt(art.id).subscribe((Response) =>
      {this.plansofart[art.id] = Response;
      console.log(this.plansofart);
    t.open()});
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
