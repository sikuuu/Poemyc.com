import { Component, OnInit } from '@angular/core';
import { HttpService } from '../http.service';
import { EditplaComponent } from '../editpla/editpla.component';

import { NgbModal } from '@ng-bootstrap/ng-bootstrap';


@Component({
  selector: 'plans',
  templateUrl: './plans.component.html',
  styleUrls: ['./plans.component.css']
})
export class PlansComponent implements OnInit {

  plans:any = '';
  http;

  constructor(http: HttpService, private modalService: NgbModal) { 
    this.http = http;
    this.getmyPlans(http);
  }

  ngOnInit(): void {
  }

  getmyPlans(http){
    http.getmyPlans().subscribe((Response) => {this.plans = Response;
      this.plans = this.plans.plans;
      console.log(this.plans);
    });
  }

  openModal(pla) {
    
    const modalRef = this.modalService.open(EditplaComponent,{ size: 'lg' });
    modalRef.componentInstance.pla = pla;

    modalRef.result.then((data) => {
      console.log(data);
      if (data != 'res'){
        if (data[1]){
          console.log(data[0]+ 'create');
          this.createpla(this.http,data[0])
          this.plans.push(data[0]);
        } else {
          console.log(data[0]+ 'update');

          this.savepla(this.http,data[0])

        }
      }
      
    });
    }

    savepla(http, pla){
      http.savepla(pla).subscribe((Response) => { });
    }
  
    createpla(http,pla){
      http.createpla(pla).subscribe((Response) => {

        var data = Response;

        if (data.created == 'yes') {
          this.getmyPlans(http);
        }
      });
    }

    deletepla(pla){
      if (confirm('¿Seguro que quieres borrar el plan "'+pla.name+'"?')){
        this.http.deletepla(pla.id).subscribe((Response) => {
          var data = Response;
          if (data.deleted == 'yes') {
            this.plans.splice(this.plans.indexOf(pla),1);
          }
        }
      );
      }
      
    }
  

}

/*

saveart(http, art){
  http.saveart(art).subscribe((Response) => {
  //console.log(Response);
  }
  );
}

createart(http,art){
  http.createart(art).subscribe((Response) => {
    var data = Response;
    
    if (data.created == 'yes') {
      //console.log('megagay');
      this.getmyArticles(http);
    }
  }
  );
}

deleteart(art){
  if (confirm('¿Seguro que quieres borrar el artículo "'+art.name+'"?')){
    this.http.deleteart(art.id).subscribe((Response) => {
      //console.log(Response);
      var data = Response;
      if (data.deleted == 'yes') {
      this.articles.splice(this.articles.indexOf(art));
      }
    }
  );
  }
  
}*/