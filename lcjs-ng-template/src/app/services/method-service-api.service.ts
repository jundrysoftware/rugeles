import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class MethodServiceApiService {
  domain = "https://unortecapms7003dht22.com.co/";
  //domain = "http://localhost/test/";

  constructor(private http: HttpClient) { }

  public PostMethod(endpoint, params, domain = this.domain) {
    let headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Access-Control-Allow-Origin': '*',
      'Access-Control-Allow-Methods': 'POST',
      'Access-Control-Allow-Headers': '*'
    });
    return this.http.post<any>(domain + endpoint, JSON.stringify(params), { headers });
  }

  public GetMethod(endpoint, domain = this.domain) {
    let headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Access-Control-Allow-Origin': '*',
      'Access-Control-Allow-Methods': 'GET',
      'Access-Control-Allow-Headers': '*'
    });
    return this.http.get<any>(domain + endpoint, { headers });
  }
}
