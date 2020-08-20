<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href=" {{ route('contacts.index') }} ">Contact Manager</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <form class="form-inline ml-auto my-lg-0">
      <a class="btn btn-outline-success my-2 my-sm-0" href="{{route('contacts.create')}}">Add Contact</a>
      </form>
    </div>
    </div>
  </nav>