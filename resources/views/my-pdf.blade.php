<!DOCTYPE html>
<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <h2>Product List</h2><img src="{{ public_path('facebook.png') }}" style="width: 100px; height: 100px">
          <table class="table table-success table-striped">
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
      <div>
    </div>
  </div>
</body>
</html>



