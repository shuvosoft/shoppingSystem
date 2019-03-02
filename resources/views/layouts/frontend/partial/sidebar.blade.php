<div class="col-md-4">
    <div class="list-group">

        @foreach(App\Category::orderBy('name','asc')->where('parent_id', NULL )->get() as $parent)
        <a href="#main-{{$parent->id}}" class="list-group-item list-group-item-action" data-toggle="collapse">

            <img class="card-img-top feature-img" src="{{ Storage::disk('public')->url('category/'.$parent->image) }}" alt="Card image" style="width: 50px; height: 45px">

            {{$parent->name}}
        </a>

            <div class="collapse" id="main-{{$parent->id}}">
                @foreach(App\Category::orderBy('name','asc')->where('parent_id', $parent->id )->get() as $child)

                    <a href="{!! route('categories.show', $child->id) !!}" class="list-group-item list-group-item-action

                         @if (Route::is('categories.show'))
                                            @if ($child->id == $category->id)
                                                    active
                        @endif
                    @endif
                       " >

                        <img class="card-img-top feature-img" src="{{ Storage::disk('public')->url('category/'.$child->image) }}" alt="Card image" style="width: 50px; height: 45px">

                    {{$child->name}}
                    </a>

                @endforeach
            </div>

            @endforeach
    </div>
</div>