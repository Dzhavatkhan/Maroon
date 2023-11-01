<form class="addProduct" enctype="multipart/form-data">
    @csrf
        <!-- Modal body -->
        <div class="modal-body">
              <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="email" placeholder="Название товара" name="product_name">
                    <label for="product_name">Название товара</label>
              </div>

              <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="email" placeholder="Название бренда" name="brand">
                <label for="product_name">Название бренда</label>
              </div>

              <div class="mb-3 mt-1">
                <input type="file" class="form-control" id="email"  name="image">
              </div>
              <div class="mb-3 mt-1">
                <p>Категории</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="check1" name="category" value="Крема">
                    <label class="form-check-label" for="check1">Крема</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="check2" name="category" value="sometСывороткиhing">
                    <label class="form-check-label" for="check2">Сыворотки</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="check3" name="category" value="Маски">
                    <label class="form-check-label" for="check3">Маски</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="check4" name="category" value="Пенки">
                    <label class="form-check-label" for="check4">Пенки</label>
                  </div>
              </div>


              <div class="form-floating mb-3 mt-3">
                <textarea class="form-control" id="comment" name="description" placeholder="Описание товара"></textarea>
                <label for="comment">Описание</label>
              </div>

              <div class="form-floating mb-3 mt-3">
                <input type="number" class="form-control" id="email" placeholder="Кол-во" name="quantity">
                <label for="product_name">Кол-во</label>
              </div>

              <div class="form-floating mb-3 mt-3">
                <input type="number" class="form-control" id="email" placeholder="Цена" name="price">
                <label for="product_name">Цена</label>
              </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Отправить</button>
        </div>
</form>
