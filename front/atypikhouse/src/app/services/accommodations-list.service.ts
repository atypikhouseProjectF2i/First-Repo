import { Injectable } from '@angular/core';
import { Accommodation } from '../models/accommodation.model';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { catchError, tap } from 'rxjs/operators';
import { Observable } from 'rxjs';
import { of } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class AccommodationListService {
  private accommodationUrl = 'http://localhost:8000/api';

  constructor(private http: HttpClient) {}

  getAccommodations(): Observable<Accommodation[]> {
    return this.http.get<Accommodation[]>(
      'http://localhost:8000/api/accommodations',
      {
        headers: {
          Accept: 'application/json',
        },
      }
    );
  }
}
