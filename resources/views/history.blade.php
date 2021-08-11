@extends('layouts.main')

@section('css')

@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <ul class="nav nav-tabs nav-tabs-primary nav-tabs-full {{ empty(auth('student')->user()->coursetype) || auth('student')->user()->coursetype == 'live' ? 'nav-tabs-5' : 'nav-tabs-3' }} shadow-2dp">
            @foreach ($tabs as $tab)
                @php
                    $icon = ['Registration' => 'fas fa-registered', 'Status' => 'fas fa-history','Cancellation' => 'fas fa-calendar-times', 'SAC Paper' => 'fas fa-sticky-note', 'Borrowbook' => 'fas fa-book'];
                @endphp
                <li role="presentation" class="{{ $loop->first ? 'active' : ''}}">
                    <a href="#{{ str_replace(' ', '', $tab) }}" data-toggle="tab" aria-expanded="false" class="withoutripple ">
                        <i class="{{ $icon[$tab] }}"></i>
                        <span class="hidden-xs">{{ $tab }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="card-block tab-content history-content">
            @foreach($tabs as $tab)
                <div class="tab-pane fade {{ $loop->first ? 'active in' : ''}}" id="{{ str_replace(' ', '', $tab) }}">
                    <ul class="ms-timeline">
                        @forelse (collect($data[$tab])->sortByDesc('datecreate') as $value)
                        <li class="ms-timeline-item wow materialUp">
                            <div class="ms-timeline-date">
                                <time class="timeline-time">
                                    {{ date('d F, Y H:i:s', strtotime($value->datecreate)) }}
                                </time>
                                <i class="ms-timeline-point"></i>
                                <div class="card card-panel panel-black">
                                    @php
                                        if(strpos($value->score, '+') !== false) {
                                            $labelColor = 'success';
                                        } else if (strpos($value->score, '-') !== false) {
                                            $labelColor = 'danger';
                                        } else {
                                            $labelColor = 'primary';
                                        }
                                    @endphp
                                    <div class="card-block">
                                        {{ $value->content }}
                                        @if(!empty($value->score))
                                        <span class="label label-{{ $labelColor }}">
                                            {{ $value->score }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                            <h2 class="pb-4">{{ $tab }} not found.</h2>
                        @endforelse
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
       
    </script>
@endsection