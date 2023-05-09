import { Component, OnInit } from '@angular/core';
import { ProductService } from '../services/product.service';
import { ProductTypeService } from '../services/product-type.service';

declare var Swal: any;

@Component({
  selector: 'app-product-create',
  templateUrl: './product-create.component.html',
  styleUrls: ['./product-create.component.css'],
})
export class ProductCreateComponent implements OnInit {
  product = {
    nome: '',
    tipo_produto_id: null,
    preco: null,
  };
  productTypes: any[] = []; // inicialização vazia da propriedade

  constructor(
    private productService: ProductService,
    private productTypeService: ProductTypeService
  ) {}

  ngOnInit(): void {
    this.getProductTypes();
  }

  getProductTypes(): void {
    this.productTypeService.getAll().subscribe(
      (data) => {
        this.productTypes = data;
      },
      (error) => {
        console.log(error);
      }
    );
  }

  onSubmit(): void {
    this.productService.create(this.product).subscribe(
      (response) => {
        console.log(response);
          Swal.fire({
            title: 'Tudo certo!',
            text: 'Produto cadastrado com sucesso!',
            icon: 'success'
          });
        this.product = { nome: '', tipo_produto_id: null, preco: null };
      },
      (error) => {
        console.log(error);
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Erro ao cadastrar produto, recarregue a página e tente novamente!'
        });
      }
    );
  }
}
