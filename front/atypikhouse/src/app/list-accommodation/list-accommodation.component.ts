import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Accommodation } from "../models/accommodation.model";
import { ListAccommodationService } from '../services/list-accommodations.service';


@Component({
  selector: 'app-list-accommodation',
  templateUrl: './list-accommodation.component.html',
  styleUrls: ['./list-accommodation.component.scss']
})
export class ListAccommodationComponent implements OnInit {

  accommodation$!: Observable<Accommodation[]>;

  constructor(private accommodationService:ListAccommodationService) { }

  ngOnInit(): void {
    this.accommodation$ = this.accommodationService.getAccommodations();
  }

}
