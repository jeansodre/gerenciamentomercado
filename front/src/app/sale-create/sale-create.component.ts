import { Component, OnInit } from '@angular/core';
import { ProductService } from '../services/product.service';
import { SaleService } from '../services/sale.service';

declare var Swal: any;

interface Product {
  id: number;
  nome: string;
  preco: number;
  taxrate: number;
}

interface SaleItem {
  product: Product;
  quantity: number;
  taxAmount: number;
  total: number;
}

@Component({
  selector: 'app-sale-create',
  templateUrl: './sale-create.component.html',
  styleUrls: ['./sale-create.component.css'],
})
export class SaleCreateComponent implements OnInit {
  products: Product[] = [];
  selectedProduct: Product | null = null;
  quantity = 1;
  saleItems: SaleItem[] = [];
  saleTotal = 0;
  taxTotal = 0;

  constructor(
    private productService: ProductService,
    private saleService: SaleService
  ) {}

  ngOnInit(): void {
    this.productService.getAll().subscribe((data: any[]) => {
      this.products = data.map(productData => ({
        id: productData.id,
        nome: productData.nome,
        preco: productData.preco,
        taxrate: productData.taxrate
      }));
      this.selectedProduct = this.products[0];
    });
  }

  onProductChange(): void {
    if (this.selectedProduct) {
      this.selectedProduct = this.products.find(
        (product) => product.id === this.selectedProduct!.id
      ) || null;
    }
  }


  addItem(): void {
    if (this.selectedProduct) {
      const item: SaleItem = {
        product: this.selectedProduct,
        quantity: this.quantity,
        taxAmount: (this.selectedProduct.taxrate / 100) * this.selectedProduct.preco * this.quantity,
        total: this.selectedProduct.preco * this.quantity,
      };
      this.saleItems.push(item);
      this.updateTotals();
    }
  }


  updateTotals(): void {
    this.saleTotal = this.saleItems.reduce(
      (sum, item: SaleItem) => sum + item.total,
      0
    );
    this.taxTotal = this.saleItems.reduce(
      (sum, item: SaleItem) => sum + item.taxAmount,
      0
    );
  }

  removeItem(index: number): void {
    this.saleItems.splice(index, 1);
    this.updateTotals();
  }

  onSubmit(): void {
    const saleData = {
      items: this.saleItems.map((item) => ({
        productId: item.product.id,
        quantity: item.quantity,
      })),
      total: this.saleTotal,
      total_impostos: this.taxTotal,
    };

    this.saleService.create(saleData).subscribe(
      (response) => {
        console.log(response);
        const saleId = response;
        this.saleService.createItems(saleId, this.saleItems.map(item => ({ ...item, productId: item.product.id }))).subscribe(
          (response) => {
            console.log(response);
            Swal.fire({
              title: 'Parabéns!',
              text: 'Venda realizada com sucesso!',
              icon: 'success'
            });
            this.saleItems = [];
            this.saleTotal = 0;
            this.taxTotal = 0;
          },
          (error) => {
            console.log(error);
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Erro ao realizar a venda, recarregue a página e tente novamente!'
            });
          }
        );
      },
      (error) => {
        console.log(error);
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Erro ao realizar a venda, recarregue a página e tente novamente!'
        });
      }
    );
  }


}
