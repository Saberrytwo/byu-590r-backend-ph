Hello manager. Here is the list of played characters and their users:

<table>
<thead>
<tr>
<th>User</th>
<th>Character Name</th>
<th>Games Played</th>
<th>Games Won</th>
</tr>
</thead>
<tbody>
@foreach ($charactersPlayed as $character)
<tr>
<td>{{ collect($character->users)->first()->name }}</td>
<td>{{ $character->name }}</td>
<td>{{ $character->users->first()->pivot->games_played }}</td>
<td>{{ $character->users->first()->pivot->wins }}</td>
</tr>
@endforeach

</tbody>
</table>