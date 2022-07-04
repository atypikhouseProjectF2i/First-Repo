import { Injectable } from "@angular/core";
import { Accommodation } from "../models/accommodation.model";
import { HttpClient, HttpHeaders } from "@angular/common/http";

import { catchError, tap } from "rxjs/operators";
import { Observable } from "rxjs";
import { of } from "rxjs";

@Injectable({
    providedIn: 'root'
  })
export class ListAccommodationService{

    private listAccommodations = []
    private accommodationUrl = 'http://localhost:8000/api';

    constructor(private http: HttpClient){}

    private log(log:string){
        console.log(log);
    }

    private handleError<T>(operation='operation', result?: T){
        return (error: any): Observable<T> => {
            console.log(error);
            console.log(`${operation} failed: ${error.message}`);

            return of(result as T);
        };
    }

    getAccommodations(): Observable<Accommodation[]>{
        return this.http.get<Accommodation[]>('http://localhost:8000/api/accommodations', {
            headers : {
                'Accept' : 'application/json'
            }
        });
        
        //return POKEMONS;
    }

}
