@include ('home.home-navbar')

<div class="container" id="allbands">

 
  <a href="{{url('/login')}}" title="Add band" class="btn  btn-outline-light mt-3 mb-4 form-button"><img src="{{url('img/pentagrama.png')}}" height="50px" alt="pentagram_icon"></a>
 
  <a href="{{url('/report-an-error')}}" class="btn  btn-outline-danger float-end mt-3 mb-4 form-button" title="Contact us if you have seen a mistake in any section"><img src="{{url('img/demonio.png')}}" height="50px" alt=""></a>
 
  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">
            
            <th>Band</th>
            <th>Country</th>
            <th>Year of creation</th>
            <th>Image</th>
            
            

          </tr>
        </thead>
        <tbody>
          @foreach ($band as $bands)
          <tr>
            
            <td><a href="{{url('bands/discography/'.$bands->id.'/'.str_replace("", "", $bands->band_name))}}" style="text-decoration:none;color:black">{{str_replace('_','   ',$bands->band_name)}}</a></td>
            <td>{{$bands->band_country}}</td>
            <td>{{$bands->band_year_creation}}</td>

            <td><img class="band-image" height="125px" src="{{ url('bandImages/'.$bands->band_image)}}" alt="bandImages"></td>

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