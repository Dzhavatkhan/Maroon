@foreach ($categories as $category)
<div class="col">
  <div class="form-check">
    <label class="form-check-label a{{ $category->name }}" for="check1">f{{ $category->name }}</label>
    <input class="form-check-input body" id="body_edit" type="radio" name="category" id="check1" onchange="check()" value="{{ $category->name }}" checked>

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

<script>
        let f_checkbox = document.getElementById('face_edit')
        let b_checkbox = document.getElementById('body_edit')
        let f_surpize = document.getElementById('surp_face_edit');
        let b_surpize = document.getElementById('surp_body_edit');
        if (f_checkbox.checked ) {
            f_surpize.classList.remove('sup_face')
            b_surpize.classList.remove('check_plus')
        }
        else{
            console.log(0);
        }
        if (b_checkbox.checked) {
            b_surpize.classList.remove('sup_body')
            b_surpize.classList.add('check_plus')
        }
        else{
            console.log(0);
        }
</script>
