import { Component, OnInit } from '@angular/core';
import { HttpService } from '../http.service';

@Component({
  selector: 'plans',
  templateUrl: './plans.component.html',
  styleUrls: ['./plans.component.css']
})
export class PlansComponent implements OnInit {

  plans:any = '';

  constructor(http: HttpService) { 
    this.getmyPlans(http);
  }

  ngOnInit(): void {
  }

  getmyPlans(http){
    http.getmyPlans().subscribe((Response) => {this.plans = Response;
      console.log(this.plans);
    });
  }

}
