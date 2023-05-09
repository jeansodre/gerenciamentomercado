import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { ProductCreateComponent } from './product-create/product-create.component';
import { ProductTypeCreateComponent } from './product-type-create/product-type-create.component';
import { TaxCreateComponent } from './tax-create/tax-create.component';
import { SaleCreateComponent } from './sale-create/sale-create.component';
import { SaleListComponent } from './sale-list/sale-list.component';
import { SuggestionsComponent } from './suggestions/suggestions.component';


const routes: Routes = [
  { path: '', redirectTo: '/products/create', pathMatch: 'full' },
  { path: 'products/create', component: ProductCreateComponent },
  { path: 'product-types/create', component: ProductTypeCreateComponent },
  { path: 'taxes/create', component: TaxCreateComponent },
  { path: 'sales/create', component: SaleCreateComponent },
  { path: 'sales', component: SaleListComponent },
  { path: 'sugestoes', component: SuggestionsComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
