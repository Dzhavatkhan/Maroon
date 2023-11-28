<div class="col-3">
    <div class="form-check">
        <label onchange="check()" class="form-check-label " for="face" >Для лица</label>
        <input onchange="check()" class="form-check-input" type="radio" id="face"  name="category">
    </div>

</div>

<div class="col-3">
    <div class="form-check">
        <label class="form-check-label " for="body">Для тела</label>
        <input class="form-check-input" type="radio" id="ed_body" onchange="check()" name="category">
    </div>
</div>

<div class="sup_body" id="surp_body">
    @foreach ($cat_for_body as $c_f_b)
    @if ($product->category === "$c_f_b->name")
        <div class="form-check">
            <label class="form-check-label"  for="check1">{{ $c_f_b->name }}</label>
            <input class="form-check-input" name="type_categories_id"  type="radio" id="check1" name="type_categories_id" value="{{ $c_f_b->id }}" checked>
        </div>
    @else
        <div class="form-check">
            <label class="form-check-label " for="check1">{{ $c_f_b->name }}</label>
            <input class="form-check-input" name="type_categories_id" type="radio" id="check1" name="type_categories_id" value="{{ $c_f_b->id }}">
        </div>
    @endif
    @endforeach
</div>
<div class="sup_face mt-3" id="surp_face">
    @foreach ($cat_for_face as $c_f_f)
        @if ($product->category === "$c_f_f->name")
        <div class="form-check">
            <label class="form-check-label " for="check1">{{ $c_f_f->name }}</label>
            <input class="form-check-input" type="radio" id="" name="type_categories_id" value="{{ $c_f_f->id }}" checked>
        </div>
        @else
            <div class="form-check
            ">
                <label class="form-check-label " for="check1">{{ $c_f_f->name }}</label>
                <input class="form-check-input" id="" type="radio" id="check1" name="type_categories_id" value="{{ $c_f_f->id }}">
            </div>
        @endif

    @endforeach
</div>


