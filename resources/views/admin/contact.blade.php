@extends('layouts.admin')
@section('title', 'Contact')
@section('main')
<div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Date</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($contact as $ct)
                    <tr>
                      <td>{{$ct->id}}</td>
                      <td>{{$ct->name}}</td>
                      <td>{{$ct->email}}</td>
                      <td>{{$ct->phone}}</td>
                      <td>{{$ct->created_at}}</td>
                      <td width="400">{{$ct->message}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
@stop()