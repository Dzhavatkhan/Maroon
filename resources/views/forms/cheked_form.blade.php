@foreach ($categories as $category)
<div class="col">
  <div class="form-check">
    @if ($category->id == $product->ca_id)
    <label class="form-check-label a{{ $category->name }}" for="check1">{{ $category->name }}</label>
    <input class="form-check-input face" id="face_edit" type="radio" name="category" id="check1" onchange="check_edit()" value="{{ $category->name }}" checked>
    @else
    <label class="form-check-label a{{ $category->name }}" for="check1">{{ $category->name }}</label>
    <input class="form-check-input body" id="body_edit" type="radio" name="category" id="check1" onchange="check_edit()" value="{{ $category->name }}" >
    @endif

  </div>
</div>
@endforeach

<div class="sup_face mt-2" id="surp_face_edit">
    @foreach ($cat_for_body as $c_f_b)
    @if ($product->category === "$c_f_b->name")
        <div class="form-check">
            <label class="form-check-label"  for="check1">{{ $c_f_b->name }}</label>
            <input class="form-check-input" name="type_categories_id"  type="radio" id="check1" name="type_categories_id" value="{{ $c_f_b->id }}" checked>
        </div>
    @else
        <div class="form-check">
            <label class="form-check-label" type="checkbox" for="check1">{{ $c_f_b->name }}</label>
            <input class="form-check-input" name="type_categories_id" type="radio" id="check1" name="type_categories_id" value="{{ $c_f_b->id }}">
        </div>
    @endif
    @endforeach
</div>

<div class="sup_body mt-2" id="surp_body_edit">
    @foreach ($cat_for_face as $c_f_f)
        @if ($product->category === "$c_f_f->name")
        <div class="form-check">
            <label class="form-check-label " for="check1">{{ $c_f_f->name }}</label>
            <input class="form-check-input" type="radio" id="" name="type_categories_id" value="{{ $c_f_f->id }}" checked>
        </div>
        @else
            <div class="form-check">
                <label class="form-check-label " for="check1">{{ $c_f_f->name }}</label>
                <input class="form-check-input" id="" type="radio" id="check1" name="type_categories_id" value="{{ $c_f_f->id }}">
            </div>
        @endif
    @endforeach
</div>
<div class="mt-2">
    <label for="">Тип кожи</label>
    @foreach ($skins as $skin)
    @if ($skin->name == $product->skin)
        <div class="form-check ">
            <label class="form-check-label" for="skin">{{ $skin->name }}</label>
            <input type="radio" class="form-check-input" name="type_skins_id" value="{{$skin->id}}" id="skin" checked>
        </div>
    @else
        <div class="form-check">
            <label class="form-check-label" for="skin">{{ $skin->name }}</label>
            <input type="radio" class="form-check-input" name="type_skins_id" value="{{$skin->id}}" id="skin">
        </div>
    @endif
    @endforeach
</div>

<script>
function checking(){
            let face = document.getElementById('face_edit')
            let body = document.getElementById('body_edit')
            let f_surpize = document.getElementById('surp_face_edit');
            let b_surpize = document.getElementById('surp_body_edit');

            if (face.checked ) {
            f_surpize.classList.remove('sup_face')
            b_surpize.classList.remove('check_plus')
        }
        else{
            console.log(0);
        }
        if (body.checked) {
            b_surpize.classList.remove('sup_body')
            b_surpize.classList.add('check_plus')
        }
        else{
            console.log(0);
        }
        }

        checking();
</script>
