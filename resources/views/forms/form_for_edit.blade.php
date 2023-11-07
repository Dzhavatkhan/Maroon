<form action="{{route('editProduct', $product->id)}}" method="POST", enctype="multipart/form-data">
<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">Изменить товар</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
  </div>

  <!-- Modal body -->
  <div class="modal-body">

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" id="email" value="{{$product->product_name}}" name="product_name">
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="text" class="form-control" id="email" value="{{$product->brand}}" name="brand">
  </div>

  <div class="mb-3 mt-1">
    <input type="file" class="form-control" id="email"  name="image">
  </div>
  <div class="mb-3 mt-1">
    <p>Категории</p>
    <div class="row">
        @include('forms.cheked_form')
    </div>
  </div>



  <div class="form-floating mb-3 mt-3">
    <textarea class="form-control" id="comment" name="description" >{{$product->description}}</textarea>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="number" class="form-control" id="email" value="{{$product->quantity}}" name="quantity">
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="number" class="form-control" id="email" value="{{$product->price}}" name="price">
  </div>
</div>

<!-- Modal footer -->
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Отправить</button>
</div>
</form>
