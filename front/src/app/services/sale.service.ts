import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { SaleItem } from './sale-item.interface';

@Injectable({
  providedIn: 'root',
})
export class SaleService {
  private apiUrl = 'http://localhost:8080/api/sale';

  constructor(private http: HttpClient) {}

  getAll(): Observable<any> {
    return this.http.get(this.apiUrl);
  }

  create(data: any): Observable<any> {
    return this.http.post(this.apiUrl, data);
  }

  createItems(saleId: number, items: SaleItem[]): Observable<any> {
    return this.http.post(`${this.apiUrl}-item`, { saleId, items });
  }

  // Adicione outros métodos conforme necessário
}
