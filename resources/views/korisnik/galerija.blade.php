@extends('layout.template')

@section('sadrzaj')

{{-- treba iz baze ucitati sve slike telefon --}}
<div class="container">
   <div class="row">

    @foreach($galerije as $g)
    <div class="col-md-4">
      <div class="thumbnail">
        <a  href="{{ asset('/galerija/'.$g->id_proizvodjac) }}">
          <img src="{{ $g->putanja }}" alt="{{ $g->naziv_proizvodjac }}" style="width:100%">
          <div class="caption">
            <p>{{ $g->naziv_proizvodjac }}</p>
          </div>
        </a>
      </div>
    </div>
    @endforeach
  </div>
    
</div>
@endsection