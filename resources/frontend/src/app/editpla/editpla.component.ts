import { Input } from '@angular/core';
import { Component, OnInit } from '@angular/core';
import { NgbActiveModal } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-editpla',
  templateUrl: './editpla.component.html',
  styleUrls: ['./editpla.component.css']
})
export class EditplaComponent implements OnInit {

 
  @Input() pla;

  isnew = false;

  foto:any = '';
  preu:any = '';
  name:any ='';
  text:any = '';

  constructor(public modal: NgbActiveModal) { }

  ngOnInit(): void {
    if (!(this.pla == 'new')) {
      this.foto = this.pla.foto;
      this.preu = this.pla.preu;
      this.name = this.pla.name;
      this.text = this.pla.text;
    } else {
      this.pla = {};
      this.isnew = true;
    }
   
    //console.log(this.pla);
  }

  update(){
    this.pla.name = this.name;
    this.pla.foto = this.foto;
    this.pla.preu = this.preu;
    this.pla.text = this.text;
    this.modal.close([this.pla, this.isnew]);
  }
}
