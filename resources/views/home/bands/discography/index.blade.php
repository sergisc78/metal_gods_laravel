@include ('home.home-navbar')

<div class="container" id="allbands">

  <a href="{{url('/')}}" class="btn  btn-outline-primary mt-3 mb-4 form-button">Back</a>
  <a href="{{url('/login')}}" class="btn btn-outline-primary mt-3 mb-4 form-button">Add a Band</a>

  <a href="{{url('/report-an-error')}}" class="btn  btn-outline-danger float-end mt-3 mb-4 form-button"
    title="Contact us if you have seen a mistake in any section">Report an error</a>

  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">



            <th>Album</th>
            <th>Year </th>
            <th>Cover</th>
            <th>Average</th>



          </tr>
        </thead>
        <tbody>
          @foreach ($band as $bands)
          <tr>


            <td><a href="{{url('bands/discography/album/'.$bands->id.'/'.str_replace(" ", "-", $bands->band_name))}}" style="text-decoration:none;color:black"')}}">{{$bands->album_title}}</a></td>
            <td>{{$bands->album_year}}</td>


            <td><img class="band-image" height="125px" src="{{ url('albumImages/'.$bands->album_image)}}"
                alt="bandImages"></td>
                <td>{{$bands->rating}}</td>
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
          $('#table').DataTable({
            "order": [[2, 'asc']],
          });
});
    </script>



    @include('home.footer')