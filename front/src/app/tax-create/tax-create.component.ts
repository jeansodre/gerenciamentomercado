import { Component, OnInit } from '@angular/core';
import { HttpErrorResponse } from '@angular/common/http';
import { TaxService } from '../services/tax.service';
import { ProductTypeService } from '../services/product-type.service';

declare var Swal: any;

@Component({
  selector: 'app-tax-create',
  templateUrl: './tax-create.component.html',
  styleUrls: ['./tax-create.component.css'],
})
export class TaxCreateComponent implements OnInit {
  tax = {
    tipo_produto_id: null,
    porcentagem: null,
  };

  productTypes: any[] = [];

  constructor(
    private taxService: TaxService,
    private productTypeService: ProductTypeService
  ) {}

  ngOnInit(): void {
    this.loadProductTypes();
  }

  loadProductTypes(): void {
    this.productTypeService.getAll().subscribe(
      (data) => {
        this.productTypes = data;
      },
      (error: HttpErrorResponse) => {
        console.log(error);
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Erro ao carregar os tipos de produtos!'
        });
      }
    );
  }

  onSubmit(): void {
    this.taxService.create(this.tax).subscribe(
      (response) => {
        console.log(response);
        Swal.fire({
          title: 'Parabéns!',
          text: 'Imposto cadastrado com sucesso!',
          icon: 'success'
        });
        this.tax = { tipo_produto_id: null, porcentagem: null };
      },
      (error: HttpErrorResponse) => {
        console.log(error);
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Erro ao cadastrar o imposto, recarregue a página e tente novamente!'
        });
      }
    );
  }
}
