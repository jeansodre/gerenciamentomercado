import { Component, OnInit } from '@angular/core';
import { ProductTypeService } from '../services/product-type.service';
import { FormGroup, FormControl, Validators } from '@angular/forms';

declare var Swal: any;

@Component({
  selector: 'app-product-type-create',
  templateUrl: './product-type-create.component.html',
  styleUrls: ['./product-type-create.component.css'],
})
export class ProductTypeCreateComponent implements OnInit {
  productTypeForm = new FormGroup({
    nome: new FormControl('', Validators.required),
  });

  constructor(private productTypeService: ProductTypeService) {}

  ngOnInit(): void {}

  onSubmit(): void {
    this.productTypeService.create(this.productTypeForm.value).subscribe(
      (response) => {
        console.log(response);
        Swal.fire({
          title: 'Tudo certo!',
          text: 'Tipo de produto cadastrado com sucesso!',
          icon: 'success'
        });
        this.productTypeForm.reset();
      },
      (error) => {
        console.log(error);
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Erro ao cadastrar o tipo de produto, recarregue a página e tente novamente!'
        });
      }
    );
  }
}
