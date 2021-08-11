@if (auth('student')->user()->coursetype == 'online')
    <tr class="info">
        <th colspan="2">
            <h4>
                <i class="fas fa-gift color-royal"></i> Point
            </h4>
        </th>
    </tr>
    <tr>
        <td>
            3 Bonus Tutorials
        </td>
        <td>
            <span class="badge badge-success"> 
                {{ auth('student')->user()->std_bonus }} {{ str_plural('Point', auth('student')->user()->std_bonus) }}
            </span>
        </td>
    </tr>
    <tr>
        <td>
            iSAC Writing & iSAC Speaking
        </td>
        <td>
            <span class="badge badge-success"> 
            {{ $profile->std_onlinesac }} {{ str_plural('Point', $profile->std_onlinesac) }}
            </span>
        </td>
    </tr>
@else
    <tr class="info">
        <th colspan="2">
            <h4>
                <i class="fas fa-gift color-royal"></i> Point
            </h4>
        </th>
    </tr>
    <tr>
        <td>
            9 Clubs
        </td>
        <td>
            <span class="badge badge-success"> {{ auth('student')->user()->std_point }} {{ str_plural('Point', auth('student')->user()->std_point) }} </span>
        </td>
    </tr>
    <tr>
        <td>
            3 Bonus Tutorials
        </td>
        <td>
            <span class="badge badge-success"> {{ auth('student')->user()->std_bonus }} {{ str_plural('Point', auth('student')->user()->std_bonus) }} </span>
        </td>
    </tr>

    <tr class="info">
        <th colspan="2">
            <h4>
                <i class="fas fa-pencil-alt color-warning"></i> iSAC Writing
            </h4>
        </th>
    </tr>
    <tr>
        <td>
            Paper
        </td>
        <td>
            <span class="badge badge-success">{{ auth('student')->user()->std_sacpaper }} {{ str_plural('Script', auth('student')->user()->std_sacpaper) }}</span>
        </td>
    </tr>
    <tr>
        <td>
            Online
        </td>
        <td>
            <span class="badge badge-success"> {{ auth('student')->user()->std_pointsac }} {{ str_plural('Point', auth('student')->user()->std_pointsac) }}</span>
        </td>
    </tr>

    <tr class="info">
        <th colspan="2">
            <h4>
                <i class="fas fa-headset color-primary"></i> iSAC Speaking
            </h4>
        </th>
    </tr>
    <tr>
        <td>
            Speaking
        </td>
        <td>
            <span class="badge badge-success">{{ auth('student')->user()->std_pointspeaking }} {{ str_plural('Point', auth('student')->user()->std_pointspeaking) }}</span>
        </td>
    </tr>

    <tr class="info">
        <th colspan="2">
            <h4>
                <i class="fas fa-book color-dark"></i> Borrowing
            </h4>
        </th>
    </tr>
    <tr>
        <td>
            Books
        </td>
        <td>
            <span class="badge badge-success">{{ auth('student')->user()->std_point_book }} Times</span>
        </td>
    </tr>
    <tr>
        <td>
            Status
        </td>
        <td>
            <span class="badge badge-success">{{ $profile->borrowbook_status }}</span>
        </td>
    </tr>

    @if($profile->borrowbook_status !== 'None')
    <tr>
        <td>
            Return Date
        </td>
        <td>
            {{ $profile->returndate }}
        </td>
    </tr>
    @endif

    <!-- add score mocktest -->
    
    <tr class="info">
        <th colspan="2">
            <h4>
                <i class="fas fa-book color-dark"></i> Mocktest Scores
            </h4>
        </th>
    </tr>
    <tr>
        <td>
            Listening
        </td>
        <td>
            <span class="badge badge-success">{{ $mocktestData->listening_score }}</span>
        </td>
    </tr>
    <tr>
        <td>
            Reading
        </td>
        <td>
            <span class="badge badge-success">{{ $mocktestData->reading_score }}</span>
        </td>
    </tr>

    <tr>
        <td>
            writing1
        </td>
        <td>
            <span class="badge badge-success">{{ $mocktestData->writing_score_1 }}</span>
        </td>
    </tr>

    <tr>
        <td>
            writing2
        </td>
        <td>
            @if ($mocktestData->writing_score_2 == 0)
                <span class="badge badge-success">{{ $mocktestData->writing_score_3 }}</span>
            @else
                <span class="badge badge-success">{{ $mocktestData->writing_score_2 }}</span>
            @endif
            
        </td>
    </tr>

    <tr>
        <td>
            Overall writing score
        </td>
        <td>
            <span class="badge badge-success">{{ $mocktestData->overall_writing_score }}</span>
        </td>
    </tr>

    <tr>
        <td>
            Speaking
        </td>
        <td>
            <span class="badge badge-success">{{ $mocktestData->speaking_score }}</span>
        </td>
    </tr>

    <tr>
        <td>
        Course Recommendation / Note
        </td>
        <td>
            <span class="badge badge-success">{{ $mocktestData->note }}</span>
        </td>
    </tr>

    <tr>
        <td>
            Expected Band
        </td>
        <td>
            <span class="badge badge-success">{{ $mocktestData->expected_band }}</span>
        </td>
    </tr>

@endif