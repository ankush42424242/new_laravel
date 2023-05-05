<table>
<tr>
<th>name</th>
<th>last_name</th>
<th>email</th>
</tr>
@foreach ($students as $key => $item)
<tr>
<td>{{ ++$key }}</td>
<td>{{ $item->name }}</td>
<td>{{ $item->last_name }}</td>
<td>{{ $item->email }}</td>
</tr>
@endforeach
</table>