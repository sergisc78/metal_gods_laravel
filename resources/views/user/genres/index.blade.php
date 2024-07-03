@include ('user.navbar')

<div class="container" id="allbands">

  <a href="{{url('user/genres/add-genre')}}" class="btn  btn-primary mt-3 mb-4 form-link">Add genre</a>
  <a href="{{url('user/dashboard')}}" class="btn  btn-primary mt-3 mb-4 form-link">Dashboard</a>
  <a href="{{url('user/report-an-error')}}" class="btn  btn-danger mt-3 mb-4 form-button" title="Contact us if you have seen a mistake in any section">Report an error</a>


  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">
            <th>ID</th>
            <th>Genre</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($genre as $genres)
          <tr>
            <td>{{$genres->id}}</td>
            <td>{{$genres->genre_name}}</td>
          </tr>
          @endforeach

        </tbody>
      </table>

    </div>

    <br>
    <br>
    <br>

    <!-- BOOTSTRAP JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


    <!-- DATATABLES SCRIPT-->
    <script>
      $(document).ready(function () {
          $('#table').DataTable();
});
    </script>


    @include('admin.footer')