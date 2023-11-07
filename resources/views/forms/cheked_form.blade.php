<div class="mb-3 mt-1">
    <p>Категории</p>
    <div class="row">
        <div class="col-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" id="check1" name="category" value="Крема" checked>
                <label class="form-check-label" for="check1">Для лица</label>
            </div>
            
        </div>
        <div class="col-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" id="check1" name="category" value="Крема" checked>
                <label class="form-check-label" for="check1">Для тела</label>
            </div>
        </div>

    </div>


    <div class="form-check">
        @if ($product->category === "Крема")
            <input class="form-check-input" type="radio" id="check1" name="category" value="Крема" checked>
            <label class="form-check-label" for="check1">Крема</label>
        @else
            <input class="form-check-input" type="radio" id="check1" name="category" value="Крема">
            <label class="form-check-label" for="check1">Крема</label>
        @endif
      </div>

      <div class="form-check">
        @if ($product->category === "Сыворотки")
            <input class="form-check-input" type="radio" id="check2" name="category" value="Сыворотки" checked>
            <label class="form-check-label" for="check2">Сыворотки</label>
        @else
            <input class="form-check-input" type="radio" id="check2" name="category" value="Сыворотки">
            <label class="form-check-label" for="check2">Сыворотки</label>
        @endif

      </div>

      <div class="form-check">
        @if ($product->category === "Маски")
            <input class="form-check-input" type="radio" id="check3" name="category" value="Маски" checked>
            <label class="form-check-label" for="check3">Маски</label>
        @else
            <input class="form-check-input" type="radio" id="check3" name="category" value="Маски">
            <label class="form-check-label" for="check3">Маски</label>
        @endif

      </div>

      <div class="form-check">
        @if ($product->category === "Пенки")
            <input class="form-check-input" type="radio" id="check4" name="category" value="Пенки" checked>
            <label class="form-check-label" for="check4">Пенки</label>
        @else
            <input class="form-check-input" type="radio" id="check4" name="category" value="Пенки">
            <label class="form-check-label" for="check4">Пенки</label>
        @endif
      </div>
  </div>

