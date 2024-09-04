@include ('home.home-navbar')

<div class="container" id="allbands">

  @include('home.buttons_1')

  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">



            <th>Album</th>
            <th>Year</th>
            <th>Cover</th>
            <th>Average</th>



          </tr>
        </thead>
        <tbody>
          @foreach ($band as $bands)
          <tr>


            <td><a href="{{url('bands/discography/album/'.$bands->band_name.'/'.$bands->album_title)}}" style="text-decoration:none;color:black">{{str_replace('_','   ',$bands->album_title)}}</a></td>
            <td>{{$bands->album_year}}</td>


            <td><a href="{{url('bands/discography/album/'.$bands->band_name.'/'.$bands->album_title)}}"><img class="band-image" height="125px" src="{{ url('albumImages/'.$bands->album_image)}}"
                alt="bandImages"></a></td>
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