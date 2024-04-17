<div class="col mb-5">
    <div class="card h-100">
        <!-- Sale badge-->
        <div class="badge bg-success text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Disponible</div>
        <!-- Product image-->
        @if ($article->image)
        <div style="background-image: url('{{ asset('storage/'. $article->image->path)}}');" class="img-bg"></div>
   
        @else

        <div style="background-image: url('https://ui-avatars.com/api/?background=000&color=fff&name={{ $article->name }}');" class="img-bg"></div>

            
        @endif

        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{ $article->name }}</h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                </div>
                <!-- Product price-->
                <span class="text-muted text-decoration-line-through">$20.00</span>
                {{ $article->price }} FCFA
            </div>
        </div>

        @auth
            
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('order.articles', $article->id) }}">Payer</a></div>
        </div>
        
        @endauth
    </div>
</div>



<style>
    .img-bg{
        width: 100%; 
        height: 200px; 
        background-position: center; 
        background-size: cover; 
        background-repeat:na-repeat;
    }
</style>