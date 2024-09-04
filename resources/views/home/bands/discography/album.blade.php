@include('home.home-navbar')


<div class="container" id="allbands">

  @include('home.buttons_1')
  
    <div class="row">

      <div class="col-lg-12">
        <table id="table" class="table table-bordered display" width="100%">
  
          
          <thead>
            <tr style="color:white">
              
              <th class="text-center">Author of the review</th>
              <th class="text-center">Rating</th>
              <th class="text-center">Data</th>
              
             
              
            </tr>
          </thead>
          <tbody>
            @foreach ($album as $albums)
            <tr>
              
              <td><a href="{{url('bands/discography/review/'.$albums->id.'/'.$albums->album_title)}}" style="text-decoration:none;color:black">{{$albums->name}}</a></td>
              <td>{{$albums->rating}}</td>
              <td>{{$albums->updated_at}}</td>
              
  
              
              
  
              
  
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

    <!-- BOOTSTRAP JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


    <!-- DATATABLES SCRIPT-->
    <script>
      $(document).ready(function () {
          $('#table').DataTable({
            "order": [[2, 'desc']],
          });
});
    </script>





@include('home.footer')