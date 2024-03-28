<x-layout.default>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <h3>Add a City</h3>
            <form action="{{ route('cities.store') }}" method="post">
              @csrf

              <div class="form-group">
                <label for="country">Select Country</label>
                <select class="form-control" id="country" name="country" required>
                    <option value="" selected disabled>Select a country</option>
                    <option value="country1">Country 1</option>
                    <option value="country2">Country 2</option>
                </select>
            </div>

              <div class="form-group">
                <label for="city_name">City Name</label>
                <input type="text" class="form-control" id="city_name" name="city_name" required>
              </div>
              {{-- <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
              </div> --}}
              <br>
              <button type="submit" class="btn btn-primary">Create City</button>
            </form>
          </div>
        </div>
      </div>
    </x-layout.default>
