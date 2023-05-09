import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ProductCreateComponent } from './product-create/product-create.component';
import { FormsModule } from '@angular/forms';
import { ProductTypeCreateComponent } from './product-type-create/product-type-create.component';
import { TaxCreateComponent } from './tax-create/tax-create.component';
import { SaleCreateComponent } from './sale-create/sale-create.component';
import { HttpClientModule } from '@angular/common/http';
import { ReactiveFormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { SaleListComponent } from './sale-list/sale-list.component';
import { SuggestionsComponent } from './suggestions/suggestions.component';


@NgModule({
  declarations: [
    AppComponent,
    ProductCreateComponent,
    ProductTypeCreateComponent,
    TaxCreateComponent,
    SaleCreateComponent,
    SaleListComponent,
    SuggestionsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    ReactiveFormsModule,
    BrowserAnimationsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
