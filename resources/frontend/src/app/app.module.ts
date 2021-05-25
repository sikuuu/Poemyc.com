import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { FormatWidth } from '@angular/common';

import { MatTabsModule } from '@angular/material/tabs';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ArticleComponent } from './article/article.component';
import { HomeComponent } from './home/home.component';
import { PlansComponent } from './plans/plans.component';
import { PerfilComponent } from './perfil/perfil.component';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { EditartComponent } from './editart/editart.component';
import { EditplaComponent } from './editpla/editpla.component';
import { FavoritosComponent } from './favoritos/favoritos.component';



@NgModule({
  declarations: [
    AppComponent,
    ArticleComponent,
    HomeComponent,
    PlansComponent,
    PerfilComponent,
    EditartComponent,
    EditplaComponent,
    FavoritosComponent
  ],
  imports: [
    BrowserModule,
    NgbModule,
    HttpClientModule,
    FormsModule,
    MatTabsModule,
    BrowserAnimationsModule,
    FontAwesomeModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
