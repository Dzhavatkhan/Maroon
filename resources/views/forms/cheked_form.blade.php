
<div class="fff">
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
<div class="fof">
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

<script>
        console.log(document.getElementById('face_edit'), document.querySelector("#body_edit"));
        function check_edit(){
            console.log('checking...');
        let f_checkbox = document.getElementById('face_edit')
        let b_checkbox = document.getElementById('body_edit')

        let f_surpize = document.getElementById('surp_face');
        let b_surpize = document.getElementById('surp_body');

        console.log(f_checkbox,b_checkbox);
        if (f_checkbox.checked) {
            f_surpize.classList.remove('sup_face')

            b_surpize.classList.remove('check_plus')
            b_surpize.classList.add('sup_body')

            f_surpize.classList.add('check_plus')
        }
        else if(b_checkbox.checked){
            b_surpize.classList.remove('sup_body')

            f_surpize.classList.remove('check_plus')
            f_surpize.classList.add('sup_face')

            b_surpize.classList.add('check_plus')
        }
        else {
            console.log(0);
        }
        }
</script>
