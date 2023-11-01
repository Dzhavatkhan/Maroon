<section class="other_info">
    <h3>Вам может понравиться</h3>
    <div class="container">
        <div class="slider-wrapper">
          <button id="prev-slide" class="slide-button material-symbols-rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="14" viewBox="0 0 27 14" fill="none">
                <path d="M27 7H0.999999M0.999999 7L7.30303 1M0.999999 7L7.30303 13" stroke="#122947"/>
            </svg>
          </button>
          <ul class="image-list">
            @foreach ($recomendations as $rec)
                <a href="{{route('product', $rec->id)}}"><img class="image-item" src="{{asset('img/products/'.$rec->image)}}" alt="img-1" />
                    <p class="slider-link-title">{{$rec->product_name}}</p>
                    <p class="slider-link-price">{{$rec->price}}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 7 9" fill="none">
                        <path d="M1.14259 9V7.28571H0V6.46639H1.14259V5.34454H0V4.38655H1.14259V0H3.61163C4.7586 0 5.60788 0.222689 6.15947 0.668068C6.71982 1.11345 7 1.7605 7 2.60924C7 3.46639 6.69794 4.13866 6.09381 4.62605C5.48968 5.10504 4.601 5.34454 3.42777 5.34454H2.32458V6.46639H4.49156V7.28571H2.32458V9H1.14259ZM2.32458 4.38655H3.25704C4.05378 4.38655 4.67104 4.2605 5.10882 4.0084C5.55535 3.7563 5.77861 3.30252 5.77861 2.64706C5.77861 2.07563 5.59475 1.65126 5.22702 1.37395C4.85929 1.09664 4.2858 0.957984 3.50657 0.957984H2.32458V4.38655Z" fill="#122947"/>
                    </svg>
                    <p class="slider-link-category">{{$rec->category}}</p>

                </a>
            @endforeach
          </ul>
          <button id="next-slide" class="slide-button material-symbols-rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="14" viewBox="0 0 27 14" fill="none">
                <path d="M0 7H26M26 7L19.697 1M26 7L19.697 13" stroke="#122947"/>
            </svg>
          </button>
        </div>
        <div class="slider-scrollbar">
          <div class="scrollbar-track">
            <div class="scrollbar-thumb"></div>
          </div>
        </div>
      </div>
</section>
