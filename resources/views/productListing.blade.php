<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

<h2>A basic HTML table</h2>

<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
  </tr>
    @foreach($datas AS $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->description}}</td>
        </tr>
    @endforeach
</table>
    {!! $datas->links() !!}
</body>
</html>

