@include('home.home-navbar')


<div class="container c-form mt-5  d-flex justify-content-center">
  <div class="row-content ">
    <div class="col-md-5 w-100 ">
      <div class="box-shadow bg-white p-4 div-form" id="addGenreform">
        <h3 class="mb-4 text-center fs-0.5 form-title">Report a mistake </h3>


        <!--MESSAGE OF SUCCESS-->
        @if (session()->has('message'))
        <div class="alert alert-dismissible alert-success text-center" style="style="
          margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:12px;font-family: Montserrat,
          sans-serif;">
          {{session()->get('message')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" style="float:end">
          </button>
        </div>

        @endif
        <hr class="mt-4" style="background-color: whitesmoke">
        
        <form action="{{url('/report-an-error')}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-group mt-3 text-center">
            <label for="section_name" class="form-label  form-label-title">Section</label>
            <br>
            <select name="section_name" id="select" style="width: 300px" class="custom-select w-100 form-select"
              required>
              <option class="form-select"> -- Select Section -- </option>
              @foreach ($section as $sections)
              <option class="form-select" value="{{$sections->id}}">{{$sections->section_name}}</option>
              @endforeach
            </select>
            @error('section_name')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="email" class="form-label form-label-title">Your email</label>
            <input class="form-control form-input-name border border-dark" type="text" name="email" id="email">
            @error('email')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="subject" class="form-label form-label-title">Subject</label><br>
            <input type="text" class="form-control form-input-name border border-dark" name="subject" id="subject"
              style="color:black">
            @error('subject')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="message" class="form-label form-label-title">Message</label>
            <textarea class="form-control form-input-name border border-dark" name="message" id="message"
              rows="6"></textarea>
            @error('message')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="d-grid gap-2 mt-4">
            <button type="submit" name="add" id="add"
              class="btn btn-dark btn-lg border-0 rounded-0 form-button">Send</button>
          </div>


        </form>
      </div>
    </div>
  </div>
</div>

<br>
<br>

@include('home.footer')