import { Component, Input, OnInit } from '@angular/core';
import { NgbActiveModal, NgbModal } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-editart',
  templateUrl: './editart.component.html',
  styleUrls: ['./editart.component.css']
})
export class EditartComponent implements OnInit {

  @Input() art;

  foto:any = '';
  name:any ='';
  text:any = '';

  constructor(public modal: NgbActiveModal) { }

  ngOnInit(): void {

    this.foto = this.art.foto;
    this.name = this.art.name;
    this.text = this.art.text;
    //console.log(this.art);
  }

  update(){
    this.art.name = this.name;
    this.art.foto = this.foto;
    this.art.text = this.text;
    this.modal.close();
  }

}
