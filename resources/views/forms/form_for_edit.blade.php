<form action="{{route('editProduct', $product->id)}}" method="POST", enctype="multipart/form-data">
    @csrf
<!-- Modal Header -->
<input type="hidden" name="id" value="{{$product->id}}">
<div class="modal-header">
    <h4 class="modal-title text-black">Изменить товар</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
  </div>

  <!-- Modal body -->
  <div class="modal-body">

    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" id="name" placeholder="Имя" value="{{$product->product_name}}" name="product_name">
        <label for="name" >Название продукта</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="text" class="form-control" placeholder="Бренд" id="barnd" value="{{$product->brand}}" name="brand">
    <label for="barnd" >Бренд</label>
  </div>

  <div class="mb-3">
    <input type="file" class="form-control" id="email"  name="image">
  </div>
  <div class="mb-3">
    <label>Категории</label>
    <div class="row">
        @include('forms.cheked_form')
    </div>
  </div>

  <div class="form mb-3">
    <textarea class="form-control" id="comment" name="description" placeholder="Описание" >{{$product->description}}</textarea>
  </div>

  <div class="form-floating mb-3">
    <input type="number" class="form-control" id="quantity"  value="{{$product->quantity}}" name="quantity">
    <label for="quantity">Кол-во</label>
  </div>

  <div class="form-floating mb-3">
    <input type="number" class="form-control"  id="price" value="{{$product->price}}" name="price">
    <label for="price">Цена</label>
  </div>


<!-- Modal footer -->
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Отправить</button>
</div>
</form>
