@extends('frontend_theme.corporate.front_layout.app')

@section('styles')

@endsection

@section('content')



@isset($alljobs)
@include('frontend_theme.corporate.front_layout.vertical.banner',['alljobs'=>$alljobs])
@endisset



            @if ($page->rightsidebar_id == 0 && $page->leftsidebar_id == 0)
        <div class="postcontent col-lg-12">
        @elseif(!$page->rightsidebar_id == 0 && $page->leftsidebar_id == 0)
        <div class="postcontent col-lg-9">
        @elseif($page->rightsidebar_id == 0 && !$page->leftsidebar_id == 0)
        <div class="postcontent col-lg-9">
        @elseif(!$page->rightsidebar_id == 0 && !$page->leftsidebar_id == 0)
        <div class="postcontent col-lg-6">
        @endif

    </br>
</br>

            <!-- Portfolio Items
            ============================================= -->
            <div id="portfolio" class="portfolio row grid-container gutter-30" data-layout="fitRows">

                @isset($portfoliocategoryposts)
                @foreach ($portfoliocategoryposts as $key=> $portfoliocategorypost)
                <article class="portfolio-item col-md-4 col-sm-6 col-12 pf-media">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="#">
                                <img src="{{asset('uploads/portfoliophoto/'.$portfoliocategorypost->image)}}" alt="Open Imagination">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                    <a href="{{asset('uploads/portfoliophoto/'.$portfoliocategorypost->image)}}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Image"><i class="icon-line-plus"></i></a>
                                    <a href="#" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                            </div>
                        </div>

                        <div class="portfolio-desc">
                            <h3><a href="{{route('portfolio.details',$portfoliocategorypost->id)}}">{{$portfoliocategorypost->title}}</a></h3>
                        </div>
                    </div>
                </article>
                @endforeach
                @endisset

                @isset($servicecategoryposts)
                <div class="row col-mb-50">
                    @foreach ($servicecategoryposts as $key=> $servicecategorypost)
                    <div class="col-md-3">
                        <div class="feature-box media-box">
                            <div class="fbox-media">
                                <img src="{{asset('uploads/servicephoto/'.$servicecategorypost->image)}}" alt="Why choose Us?">
                            </div>
                            <div class="fbox-content px-0">
                               <h3><a href="{{route('service.details',$servicecategorypost->slug)}}">{{$servicecategorypost->title}}</a></h3>
                                <p>{!!Str::limit($servicecategorypost->body, 150)!!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endisset

                @isset($pricecategoryposts)
                <div class="row col-mb-50">
                    @foreach ($pricecategoryposts as $key=> $pricecategorypost)
                    <div class="col-sm-6 col-lg-4">

                        <div class="pricing-box pricing-simple px-5 py-4 bg-light text-center text-md-start">
                            <div class="pricing-title">
                                <span class="text-danger">Most Popular</span>
                                <h3>{{$pricecategorypost->title}}</h3>
                            </div>
                            <div class="pricing-price">
                                <span class="price-unit">&euro;</span>{{$pricecategorypost->price}}<span class="price-tenure">{{$pricecategorypost->duration}}</span>
                            </div>
                            <div class="pricing-features">
                                {{-- <ul class="iconlist">
                                    <li><i class="icon-check text-smaller"></i> <strong>Premium</strong> Plugins</li>
                                    <li><i class="icon-check text-smaller"></i> <strong>SEO</strong> Features</li>
                                    <li><i class="icon-check text-smaller"></i> <strong>Full</strong> Access</li>
                                    <li><i class="icon-check text-smaller"></i> <strong>100</strong> User Accounts</li>
                                    <li><i class="icon-check text-smaller"></i> <strong>1 Year</strong> License</li>
                                    <li><i class="icon-check text-smaller"></i> <strong>24/7</strong> Support</li>
                                </ul> --}}
                                {!!$pricecategorypost->body!!}
                            </div>
                            <div class="pricing-action">
                                <a href="#" class="btn btn-danger btn-lg">Get Started</a>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
                @endisset


                @isset($blogcategoryposts)
                <div class="row col-mb-50">
                    @foreach ($blogcategoryposts as $key=> $blogcategorypost)
                    <div class="col-sm-6 col-lg-4">
                            <div class="grid-inner">
                                @isset($blogcategorypost->image)
                                <div class="entry-image">
                                    <a href="#" data-lightbox="image"><img src="{{asset('uploads/postphoto/'.$blogcategorypost->image)}}" alt="Standard Post with Image"></a>
                                </div>
                                @endisset
                                @isset($blogcategorypost->youtube_link)
                                <div class="entry-image">
                                <p>&nbsp;<iframe frameborder="1"  height="400" src="{{$blogcategorypost->youtube_link}}" width="720"></iframe></p>
                                </div>
                                @endisset
                                <div class="entry-title">
                                    <h2><a href="{{route('blog.details',$blogcategorypost->id)}}">{{$blogcategorypost->title}}</a></h2>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="icon-calendar3"></i> 10th Feb 2021 </li>
                                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
                                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    <p>{!!Str::limit($blogcategorypost->body, 100)!!}</p>
                                    <a href="{{route('blog.details',$blogcategorypost->id)}}" class="more-link">Read More</a>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
                @endisset


                @isset($contentcategoryposts)
                <div class="row col-mb-50">
                    @foreach ($contentcategoryposts as $key=> $contentcategorypost)
                    <div class="col-sm-6 col-lg-4">
                            <div class="grid-inner">
                                @isset($contentcategorypost->image)
                                <div class="entry-image">
                                    <a href="#" data-lightbox="image"><img src="{{asset('uploads/contentpostphoto/'.$contentcategorypost->image)}}" alt="Standard Post with Image"></a>
                                </div>
                                @endisset
                                @isset($contentcategorypost->youtube_link)
                                <div class="entry-image">
                                <p>&nbsp;<iframe frameborder="1"  height="400" src="{{$contentcategorypost->youtube_link}}" width="720"></iframe></p>
                                </div>
                                @endisset
                                <div class="entry-title">
                                    <h2><a href="{{route('general.details',$contentcategorypost->id)}}">{{$contentcategorypost->title}}</a></h2>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="icon-calendar3"></i> {{ \Carbon\Carbon::parse($contentcategorypost->created_at)->isoFormat('Do MMM YYYY')}} </li>
                                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
                                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    <p>{!!Str::limit($contentcategorypost->body, 100)!!}</p>
                                    <a href="{{route('general.details',$contentcategorypost->id)}}" class="more-link">Read More</a>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
                @endisset


                @isset($alljobs)
                <div class="row">

                    @foreach ($alljobs as $alljob)
                    <div class="col-md-6" style="margin-bottom: 20px;">
                        <div class="grid-inner row align-items-center g-0 p-4" style="background: #f7f7f7;">
                            {{-- <div class="col-md-4 mb-md-0">
                                <a href="#" class="entry-image">
                                    <img src="images/events/thumbs/1.jpg" alt="Inventore voluptates velit totam ipsa">
                                    <div class="entry-date">10<span>Apr</span></div>
                                </a>
                            </div> --}}
                            <div class="col-md-12 ps-md-4">
                                <div class="entry-title title-xs">
                                    <h3><a href="{{route('career.details',$alljob->slug)}}">{{$alljob->title}}</a></h3>
                                        <h4 style="background-color: #e0f5d7;
                                                   border-radius: 20px;
                                                   padding: 5px 15px;
                                                   color: #449626;
                                                   text-transform: capitalize;
                                                   font-size: 14px;
                                                   font-weight: 500;
                                                   display: inline-block;
                                                   margin-bottom: 16px;
                                                   ">{{$alljob->employement_status}}</h4>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li>Deadline: <a href="#"><i class="icon-time"></i>{{ \Carbon\Carbon::parse($alljob->application_deadline)->isoFormat('Do MMM YYYY')}}</a></li>
                                        <li><a href="#"><i class="icon-map-marker2"></i> Melbourne</a></li>
                                        <li>Vacancy : {{$alljob->vacancy}}</li>
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    <a href="#" class="btn btn-secondary btn-sm" disabled="disabled">Buy Tickets</a> <a href="#" class="btn btn-danger btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                @endisset

                @isset($pricecategories)

                <div class="row pricing col-mb-30 mb-4">
                    @foreach ($pricecategories as $key => $pricecategory)
                    <div class="col-md-6 col-lg-4">
                        <div class="pricing-box pricing-simple p-5 {{($key%2 == 0) ? 'bg-danger' : 'bg-primary'}} dark text-center">
                            <div class="pricing-title">
                                <span>Try Now</span>
                                <h3>{{$pricecategory->name}}</h3>
                            </div>
                            <div class="pricing-action">
                                <a href="{{route('all.price',$pricecategory->slug)}}" class="btn btn-light btn-lg">Get Started</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @endisset



            </div><!-- #portfolio end -->

        </div>




@endsection

@section('scripts')

@endsection
