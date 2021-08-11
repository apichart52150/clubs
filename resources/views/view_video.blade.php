@extends('layouts.video')

@section('content')
    <!-- start page title -->
    <div class="row pr-5 pl-5">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Clubs</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('view_class')}}">Class</a></li>
                        <li class="breadcrumb-item active">{{$nccode}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$nccode}}</h4>
            </div>
        </div>
    </div>  

   

    <!-- end row-->
    <div class="row pr-3 pl-3">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title">{{$nccode}}</h4>
                <p class="sub-header">
                    Add Video class {{$nccode}}
                </p>

                <div class="mb-2">
                    <div class="row">
                        <div class="col-12 text-sm-center form-inline">
                            <div class="form-group mr-2">
                                <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add Video</button>
                            </div>
                            <div class="form-group">
                                <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>

                @if(session()->has('add'))
                {!!session()->get('add')!!}
                @endif 

                @if(session()->has('update'))
                {!!session()->get('update')!!}
                @endif 

                @if(session()->has('delete'))
                {!!session()->get('delete')!!}
                @endif 

                <table id="demo-foo-addrow" class="table table-centered table-striped table-bordered mb-0 toggle-circle" data-page-size="100">
                    <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Link</th>
                        <th>Teacher</th>
                        <th>date</th>
                        <th>edit</th>
                    </tr>
                    </thead>
                        <tbody>
                            @foreach ($video as $key => $datas)
                                <tr>
                                    <td>
                                        {{ $datas->class_name }}
                                    </td>
                                    <td data-field="date"><a href="{{ $datas->class_link }}" target="_blank">{{ $datas->class_link }}</a></td>
                                    <td>
                                    {{ $datas->class_teacher }}
                                    </td>
                                    <td>
                                        @php
                                            $newDateFormat2 = date('d/m/Y', strtotime($datas->class_date));
                                        @endphp
                                        {{ $newDateFormat2 }}
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#edit{{$datas->class_id}}">Edit</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#delete{{$datas->class_id}}">Delete</button>
                                    </td>
                                </tr>

                                <div id="edit{{$datas->class_id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Video</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('class/edit_video') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="nccode" value="{{ $nccode }}">
                                                <input type="hidden" name="id" value="{{$datas->class_id}}">
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Class Name</label>
                                                                <input type="text" name="video_name" class="form-control" id="field-1" value="{{$datas->class_name}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Teacher</label>
                                                                <input type="text" name="video_teacher" class="form-control" id="field-2" value="{{$datas->class_teacher}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Link</label>
                                                                <input type="text" name="video_link" class="form-control" id="field-3" value="{{$datas->class_link}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">Date</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="video_date" class="form-control" data-provide="datepicker" data-date-autoclose="true" value="{{$datas->class_date}}" required>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                                                                    </div>
                                                                </div><!-- input-group -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- /.modal -->

                                <div id="delete{{$datas->class_id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Confirm Delete !!</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body p-4">
                                                <form class="form-horizontal" role="form" action="{{url('class/destroy/'.$datas->class_id)}}">
                                                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
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

    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Video</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('class/add_video') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="nccode" value="{{ $nccode }}">
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Class Name</label>
                                    <input type="text" name="video_name" class="form-control" value="{{$data['course']}}" id="field-1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Teacher</label>
                                    <input type="text" name="video_teacher" class="form-control" value="{{$data['teacher']}}" id="field-2" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Link</label>
                                    <input type="text" name="video_link" class="form-control" id="field-3" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Date</label>
                                    <div class="input-group">
                                        <input type="text" name="video_date" class="form-control" data-provide="datepicker" data-date-autoclose="true" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="ti-calendar"></i></span>
                                        </div>
                                    </div><!-- input-group -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->

@endsection

@section('js')
 
@stop