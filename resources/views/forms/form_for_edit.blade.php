<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title text-black">Изменить товар</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
  </div>

  <!-- Modal body -->
  <div class="modal-body">

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" id="email" value="{{$product->product_name}}" name="product_name">
        <label for="">Название продукта</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="text" class="form-control" id="email" value="{{$product->brand}}" name="brand">
    <label for="">Бренд</label>
  </div>

  <div class="mb-3 mt-1">
    <input type="file" class="form-control" id="email"  name="image">
  </div>
  <div class=" mt-1 col">
    <label>Категории</label>
    <div class="row">
        @include('forms.cheked_form')
    </div>
  </div>

<div class="row">
  <div class="form-floating mb-3 mt-3">
    <textarea class="form-control" id="comment" name="description" >{{$product->description}}</textarea>
    <label for="">Описание</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="number" class="form-control" id="email" value="{{$product->quantity}}" name="quantity">
    <label for="">Кол-во</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="number" class="form-control" id="email" value="{{$product->price}}" name="price">
    <label for="">Цена</label>
  </div>
</div>

<!-- Modal footer -->
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
<button type="submit" class="btn btn-primary" >Отправить</button>
</div>
