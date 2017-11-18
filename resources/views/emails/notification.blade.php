@component('mail::message')


# Today You Have meeting with below client.

<table id="todayfollowup" style="border:dotted">
    <thead>
    <tr>
        <th>Lead Name</th>
        <th>Time</th>
        <th>Notes</th>
    </tr>
    </thead>
    <tbody>
    @foreach($today as $task)
        <tr>
            <td class="name" style="padding: 10px !important;">{{ $task->lead->name1 }}</td>
            <td class="time" style="padding: 10px !important;">{{ \Carbon\Carbon::parse($task->followup_time) }}</td>
            <td class="notes" style="padding: 10px !important;">
                {{ $task->notes }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@component('mail::button', ['url' => URL::to('/')])
View Leads
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
