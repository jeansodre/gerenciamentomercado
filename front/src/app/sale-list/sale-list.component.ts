import { Component, OnInit } from '@angular/core';
import { SaleService } from '../services/sale.service';
import { Sale } from '../services/sale.interface';

@Component({
  selector: 'app-sale-list',
  templateUrl: './sale-list.component.html',
  styleUrls: ['./sale-list.component.css'],
})
export class SaleListComponent implements OnInit {
  sales: Sale[] = [];

  constructor(private saleService: SaleService) {}

  getTotalSalesCount(): number {
    return this.sales.length;
  }

  getTotalSaleValue(): number {
    return this.sales.reduce((sum, sale) => sum + Number(sale.total), 0);
  }

  getTotalTaxValue(): number {
    return this.sales.reduce((sum, sale) => sum + Number(sale.total_impostos), 0);
  }


  ngOnInit(): void {
    this.saleService.getAll().subscribe((data: Sale[]) => {
      this.sales = data;
    });
  }
}
