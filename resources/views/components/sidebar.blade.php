@props(['category'])

<div class="d-flex flex-column mb-1">
   <div class="mb-3 border-underline"><a href="{{route('categories.show',$category)}}" class="text-blue text-decoration-none border-bottom"><b>{{ $category->name }}</b></a></div>
</div>
  

