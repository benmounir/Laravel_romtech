@extends('layouts.frontend')

@section('content')

<div class="content-wrapper">

    <!-- Stunning Header -->
    
    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Category : {{ $category->name }}</h1>
        </div>
    </div>
    
    <!-- End Stunning Header -->
    
    <!-- Post Details -->
    
    
    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                
                     @forelse ($category->sub_categories as $sub_category)  
                        @if ($sub_category->products->count() > 0)
                        <div class="row">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{$sub_category->name}}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                                <div class="case-item-wrap">
                                        @foreach($sub_category->products as $product)
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="case-item">
                                                            <div class="case-item__thumb">
                                                                <img src="{{asset($product->image)}}" alt="our case">
                                                            </div>
                                                            <h6 class="case-item__title"><a href="{{route('single.product', ['slug' => $product->slug])}}">{{$product->title}}</a></h6>
                                                    </div>
                                            </div> 
                                        @endforeach 
                                </div>
                                @endif 
                                @empty

                            </div> 
                              
                    @endforelse
                </div>
    
                <!-- End Product Details -->
                <br>
                <br>
                <br>
                <!-- Sidebar-->
    
                <div class="col-lg-12">
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div  class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">All Product Tags</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
    
                            <div class="tags-wrap">
                                <a href="#" class="w-tags-item">SEO</a>
                                <a href="#" class="w-tags-item">Advertising</a>
                               
                            </div>
                        </div>
                    </aside>
                </div>
    
                <!-- End Sidebar-->
    
            </main>
        </div>
    </div>
    
    <!-- Subscribe Form -->
    
  
    
    <!-- End Subscribe Form -->
    
    </div>

        

@endsection
