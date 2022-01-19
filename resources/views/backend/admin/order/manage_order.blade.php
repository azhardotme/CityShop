
@extends('backend.admin.admin_master')
@section('content')

<div class="container">

    <div class="row-fluid sortable">

        <div class="box span12">

                @php
                $message=Session::get('message');
                if($message){
                    echo "$message";
                    Session::put('message',null);
                }
               @endphp


            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">

                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Order ID</th>
                          <th>Customer Name</th>
                          <th>Order Total</th>
                          <th>Order Date & Time</th>
                          <th>Status</th>
                          <th style="text-align:center;">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                        @foreach ($orders as $order)

                     <tr>
                        <td class="center">{{$order->id}}</td>
                        <td class="center">{{$order->customer->name}}</td>
                        <td class="center">{{$order->total }}</td>
                        <td class="center">{{ \Carbon\Carbon::parse($order->created_at)->format('Md,Y,h:iA')}}</td>
                        <td class="center">

                            <span class="label label-success">Active</span>

                            <span class="label label-danger">Deactive</span>

                        </td>
                        <td class="row">
                            <div class="span3"></div>
                            <div class="span2">

                                <a class="btn btn-success" href="#">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>

                                <a class="btn btn-danger" href="#">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                            </div>
                                <div class="span2">
                                    <a class="btn btn-info" href="#">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                </div>
                                <div class="span2">
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="halflings-icon white trash"></i>
                                        </button>
                                    </form>

                                </div>
                            <div class="span3"></div>
                        </td>
                    </tr>
                    @endforeach

                  </tbody>
              </table>
            </div>
        </div><!--/span-->

    </div><!--/row--

</div>
@endsection
