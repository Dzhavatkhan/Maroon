    @if ($products_count > 0)
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->brand}}</td>
            <td><img src="{{$product->image}}" class="img-fluid" alt=""></td>
            <td>{{$product->description}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td><button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#editProduct{{$product->id}}">Изменить</button>
                <div class="modal" id="editProduct{{$product->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        @include('forms.form_for_edit')

                      </div>
                    </div>
                </div>
            </td>
            <td><button class="btn btn-danger" onclick="deleteProduct({{$product->id}})">Удалить</button></td>

          </tr>
        @endforeach


    @else
       <h4 class="text-center me-6">Нет товаров</h4>
    @endif
    <tr>
        <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="myModal">Добавить</button></td>
    </tr>



