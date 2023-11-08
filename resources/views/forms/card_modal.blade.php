 <!-- The Modal -->
 <div id="ModalCard" class="modal_card">

    <!-- Modal content -->
      <div class="modal_container">
          <form id="edit_form" enctype="multipart/form-data" method="GET" action="{{route('plus_balance', Auth::user()->id)}}">
              @csrf
              @method('PATCH')
              <span class="close">&times;</span>
              <ul>
                  <li>
                      <label for="name">Карта</label>
                      <input type="text" name="name">
                  </li>
                  <li>
                      <label for="name">сумма</label>
                      <input type="text" id="count" name="balance">
                  </li>

                  <li>
                      <input type="submit">
                  </li>
              </ul>
          </form>
      </div>
 </div>
