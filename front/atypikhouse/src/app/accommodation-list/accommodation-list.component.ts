import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Accommodation } from '../models/accommodation.model';
import { AccommodationListService } from '../services/accommodations-list.service';

@Component({
  selector: 'app-accommodation-list',
  templateUrl: './accommodation-list.component.html',
  styleUrls: ['./accommodation-list.component.scss'],
})
export class AccommodationListComponent implements OnInit {
  accommodation$!: Observable<Accommodation[]>;
  constructor(private accommodationService: AccommodationListService) {}

  ngOnInit(): void {
    this.accommodation$ = this.accommodationService.getAccommodations();
  }
}
