@extends('admin.main')

@section('contents')

<!-- table starts -->
<div class="container-fluid pt-4 px-4">
                <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4" style="text-align:center">Contacts</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">SNo.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{$contact->id}}</th>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->description}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table end -->

@endsection