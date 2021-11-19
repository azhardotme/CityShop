
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
                          <th>ID</th>
                          <th>Size</th>
                          <th>Status</th>
                          <th style="text-align:center;">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                        @foreach ($sizes as $size)
                     <tr>
                        <td>{{$size->id}}</td>
                        <td>
                            @foreach (Json_decode($size->size) as $sizes)
                                <ul class="span4">
                                    <li>{!!$sizes!!}</li>
                                </ul>
                            @endforeach
                        </td>

                        <td class="center">
                            @if ($size->status==1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">Deactive</span>
                            @endif

                        </td>
                        <td class="row">
                            <div class="span3"></div>
                            <div class="span2">
                                @if ($size->status==1)
                                <a class="btn btn-success" href="{{url('/size-status'.$size->id)}}">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                                @else
                                <a class="btn btn-danger" href="{{url('/size-status'.$size->id)}}">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                                @endif
                           </div>
                                <div class="span2">
                                    <a class="btn btn-info" href="{{url('/sizes/'.$size->id.'/edit')}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                </div>
                                <div class="span2">
                                    <form action="{{url('/sizes/'.$size->id)}}" method="POST">
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
