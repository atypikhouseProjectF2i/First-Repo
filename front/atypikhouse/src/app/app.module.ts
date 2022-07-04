import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AccommodationComponent } from './accommodation/accommodation.component';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { HostComponent } from './host/host.component';
import { ContactComponent } from './contact/contact.component';
import { LoginComponent } from './login/login.component';
import { SignupComponent } from './signup/signup.component';
import { FooterComponent } from './footer/footer.component';
import { ListAccommodationComponent } from './list-accommodation/list-accommodation.component';
import { HttpClientModule } from '@angular/common/http';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    AccommodationComponent,
    HostComponent,
    ContactComponent,
    LoginComponent,
    SignupComponent,
    FooterComponent,
    ListAccommodationComponent,
  ],
  imports: [BrowserModule, AppRoutingModule, HttpClientModule],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}
