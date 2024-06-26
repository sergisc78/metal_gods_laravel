@include ('admin.navbar')

<div class="container" id="allbands">

  <a href="{{url('admin/bands/add-band')}}" class="btn  btn-primary mt-3 mb-4 form-button">Add band</a>
  <a href="{{url('admin/dashboard')}}" class="btn  btn-primary mt-3 mb-4 form-button">Dashboard</a>

  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">
            <th>ID</th>
            <th>Band</th>
            <th>Country</th>
            <th>Year of creation</th>
            <th>Image</th>
            <th>Edit Band</th>
            <th>Delete Band</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($band as $bands)
          <tr>
            <td>{{$bands->id}}</td>
            <td>{{$bands->band_name}}</td>
            <td>{{$bands->band_country}}</td>
            <td>{{$bands->band_year_creation}}</td>

            <td><img height="300px" src="{{ url('bandImages/'.$bands->band_image)}}" alt="bandImages"></td>



            {{--EDIT BAND--}}
            <td>
              <div class="text-center">
                <a class="btn btn-info edit form-button-index" href="{{url('/admin/bands/edit-band/'.$bands->id)}}">EDIT</a>
              </div>
            </td>


            {{--DELETE BAND --}}
            <td>
              <div class="text-center">
                <button class="btn btn-danger delete form-button-index" data-id={{'/admin/bands/'.$bands->id}}>DELETE</button>
              </div>
            </td>


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

    <!-- SWEET ALERT SCRIPT -->

    <script>
      $('.delete').on('click', function (e) {
      e.preventDefault();
      const id = $(this).attr('data-id');
     swal({
      title: 'Are you sure you want to delete this band?',
      text: "If you are, delete it!",
      icon: 'warning',
      buttons: true,
      dangerMode: true,
      }).then(function(value) {
      if (value) {
       window.location.href = id;
       }
      })
  });

    </script>


    @include('admin.footer')