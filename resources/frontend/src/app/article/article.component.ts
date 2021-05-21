import { Component, OnInit } from '@angular/core';
import { HttpService } from '../http.service';
import { faPlusSquare,faTrash,faPencilAlt,faLayerGroup } from '@fortawesome/free-solid-svg-icons';
import { EditartComponent } from '../editart/editart.component';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';


@Component({
  selector: 'articles',
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.css']
})
export class ArticleComponent implements OnInit {
  add = faPlusSquare;
  del = faTrash;
  edit = faPencilAlt;
  plans = faLayerGroup;
  articles:any = '';
  plansofart;
  http;

  constructor(http:HttpService, private modalService: NgbModal) { 
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
    http.saveart(art).subscribe((Response) => {alert(Response);
    console.log(Response);
    }
    );
  }

  openModal(art) {
    const modalRef = this.modalService.open(EditartComponent,{ size: 'lg' });
    modalRef.componentInstance.art = art;

    modalRef.result.then((data) => this.saveart(this.http,data));
    }

    getPlansOfArt(t,art){
      this.http.getPlansOfArt(art.id).subscribe((Response) =>
        {this.plansofart = Response;
        console.log(this.plansofart);
      t.open()});
      
    }

}
