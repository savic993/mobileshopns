<div class="container">
  <ul class="pagination">
    @for($i = 0; $i < $broj/3; $i++)
    <li><a class="page-link" href="#" data-id="{{ $i*3 }}">{{ $i }}</a></li>
    @endfor
  </ul>
</div>


