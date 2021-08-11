@extends('layouts.video')

@section('content')
    <!-- start page title -->
    <div class="row pr-5 pl-5">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Clubs</a></li>
                        <li class="breadcrumb-item active">All Class</li>
                    </ol>
                </div>
                <h4 class="page-title">All Class</h4>
            </div>
        </div>
    </div>  

    <div class="row pr-3 pl-3">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title">Video Playback</h4>
                <p class="sub-header">
                   Search class need to view.
                </p>

                <div class="mb-2">
                    <div class="row">
                        <div class="col-12 text-sm-center form-inline">
                            <div class="form-group mr-2">
                                <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                    <option value="">Show all</option>
                                    <option value="nco">NCO Class</option>
                                    <option value="nc">NC Class</option>
                                    <option value="active">Active</option>
                                    <option value="expire">Expire</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                            </div>
                        </div>
                    </div>
                </div>

                <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="100">
                    <thead>
                    <tr>
                        <th data-sort-initial="true">NC-Code</th>
                        <th data-sort-initial="true" data-toggle="true">Tehacer</th>
                        <th data-sort-initial="true" data-toggle="true">Start Date</th>
                        <th data-sort-initial="true" data-toggle="true">Expiredate</th>
                        <th data-sort-initial="true" data-toggle="true">Status</th>
                    </tr>
                    </thead>
                        <tbody>
                            @foreach ($class as $key)
                                <tr>
                                    <td>
                                        <a href="{{url('class/'.$key->nccode)}}">
                                        {{$key->nccode}}
                                        </a>
                                    </td>
                                    <td data-field="date">{{$key->th_name}}</td>
                                    <td data-field="date">{{$key->startdate}}</td>
                                    <td data-field="date">{{$key->lastdate}}</td>
                                    <td data-field="date">
                                    
                                    <?php $lastdate=$key->lastdate.'23:59:59'?>
                                    @if( strtotime($lastdate) >= strtotime(Carbon\Carbon::now()) )
                                        <span class="badge badge-success p-2">Active</span>
                                    @else
                                        <span class="badge badge-danger p-2">Expire</span>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    <tfoot>
                    <tr class="active">
                        <td colspan="5">
                            <div class="text-right">
                                <ul class="pagination pagination-split justify-content-end footable-pagination m-t-10"></ul>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('js')
 
@stop