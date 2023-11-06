
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
                <div class="row">
                  @foreach ($categories as $category)
                    <div class="col">
                      <div class="form-check"> 
                        
                        @if ($category->name == "Уход для тела")
                        <label class="form-check-label a{{ $category->name }}" for="check1">{{ $category->name }}</label>
                        <input class="form-check-input body" id="body" type="radio" id="check1" name="category" value="{{ $category->name }}">    
                        @elseif($category->name == "Уход для лица")
                        <label class="form-check-label a{{ $category->name }}" for="check1">{{ $category->name }}</label>
                        <input class="form-check-input face" id="face" type="radio" id="check1" name="category" value="{{ $category->name }}">    
                        @endif

                      </div>
                    </div> 
                    @endforeach  
                  </div>                                     
                  @foreach ($cat_for_face as $c_f_f)
                    <div class="t_c form-check sup_face" id="surp_face" >
                      <label class="form-check-label " for="check1">{{ $c_f_f->name }}</label>
                      <input class="form-check-input" id="" type="radio" id="check1" name="category" value="{{ $c_f_f->name }}">                    
                    </div>                      
                  @endforeach
                  @foreach ($cat_for_body as $c_f_b)
                    <div class="t_c form-check sup_body" id="surp_body" >
                      <label class="form-check-label " for="check1">{{ $c_f_b->name }}</label>
                      <input class="form-check-input" id="" type="radio" id="check1" name="category" value="{{ $c_f_b->name }}">                    
                    </div>                      
                  @endforeach



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
