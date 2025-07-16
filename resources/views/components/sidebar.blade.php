@props(['category'])

<div class="d-flex flex-column mb-1">
   <div class="mb-3 border-underline"><a href="{{route('categories.show',$category)}}" class="text-blue text-decoration-none border-bottom"><b>{{ $category->name }}</b></a></div>
</div>
  
{{--<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-{{ $category->id }}">
            <button class="accordion-button collapsed bg-light" type="button" 
                    data-bs-toggle="collapse"
                    data-bs-target="#flush-collapse-{{ $category->id }}"
                    aria-expanded="false"
                    aria-controls="flush-collapse-{{ $category->id }}">
                {{ $category->name }}
            </button>
        </h2>
        <div id="flush-collapse-{{ $category->id }}" 
             class="accordion-collapse collapse" 
             aria-labelledby="heading-{{ $category->id }}"
             data-bs-parent="#accordionFlushExample">
            <div class="accordion-body bg-light">
              <div class="mb-3 border-underline"><a href="{{route('categories.show',$category)}}" class="text-dark text-decoration-none border-bottom"><b>{{ $category->name }}</b></a></div>
               @foreach ($category->children as $child)
                    <div><a href="{{route('categories.children', $child)}}" class="text-decoration-none">{{ $child->name }}</a></div>
                @endforeach
            </div>
        </div>
    </div>
</div>--}}

