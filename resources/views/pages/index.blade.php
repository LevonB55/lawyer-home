@extends('main')

@section('title', 'Reach Legal - Home')

@section('content')
    <section class="lawyers_1">
        <div class="opacity_bg">
            <div class="lawyers_1_size">
                <form action="{{route('lawyers.search-name')}}" method="POST">
                    @csrf
                    <div class="lawyers_1_inputs">
                        <div class="law_avatar">
                            <div class="law_avatarBlocks">
                                <img src="{{asset('assets/images/general/avatar.png')}}" alt="Person" id="avatar">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Search Lawyer Name">
                            </div>
                            @error('name')
                                <span class="input-error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="law_avatar">
                            <div class="law_avatarBlocks">
                                <img src="{{asset('assets/images/general/loc.png')}}" alt="Location" id="law_loc">
                                <input type="text" name="city" value="{{ old('city') }}" placeholder="Choose Your City">
                            </div>
                            @error('city')
                                <span class="input-error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit">Search</button>
                    </div>
                </form>
                <div class="lawyers_1_bottom">
{{--                    <a  href="#" class="lawyers_1_bottom_box">--}}
{{--                        <img src="{{asset('assets/images/general/l_1_1.png')}}" alt="">--}}
{{--                        <p> Civil</p>--}}
{{--                    </a>--}}
{{--                    <a  href="#" class="lawyers_1_bottom_box">--}}
{{--                        <img src="{{asset('assets/images/general/l_1_2.png')}}" alt="">--}}
{{--                        <p>Immigration</p>--}}
{{--                    </a>--}}
{{--                    <a  href="#" class="lawyers_1_bottom_box">--}}
{{--                        <img src="{{asset('assets/images/general/l_1_3.png')}}" alt="">--}}
{{--                        <p>Brexit</p>--}}
{{--                    </a>--}}
{{--                    <a  href="#" class="lawyers_1_bottom_box">--}}
{{--                        <img src="{{asset('assets/images/general/l_1_4.png')}}" alt="">--}}
{{--                        <p>Criminal</p>--}}
{{--                    </a>--}}
                    @foreach($categories as $category)
                        <a  href="{{route('lawyers.category', $category->id)}}" class="lawyers_1_bottom_box">
                            <img src="{{asset('assets/images/categories/icons/' . $category->icon)}}" alt="">
                            <p>{{ $category->name }}</p>
                        </a>
                    @endforeach
                    <a  href="{{route('lawyers.categories')}}" class="lawyers_1_bottom_box more_more">
                        <img src="{{asset('assets/images/general/l_1_5.png')}}" alt="">
                        <p>More</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="lawyers_2">
        <div class="lawyers_2_flex">

            @foreach($lawyers as $lawyer)
                <div class="lawyers_2_box">
                    @if($lawyer->user->image)
                        <img class="lawyers_2_profile" src="{{asset('assets/images/profile/' . $lawyer->user->image)}}" alt="Person">
                    @else
                        <img class="lawyers_2_profile" src="{{asset('assets/images/general/blank-profile-picture.png')}}" alt="Person">
                    @endif
                    <p>
                        {{$lawyer->user->full_name}}
                    </p>
                    <p>{{$lawyer->company}}</p>
                    <div class="lawyers_2_stars">
{{--                        @for ($i = 0; $i < $lawyer->rating; $i++)--}}
{{--                            <img src="{{asset('assets/images/general/star.png')}}" alt="Star">--}}
{{--                        @endfor--}}

                        @include('partials/rating-stars', ['rating' => $lawyer->rating])
                    </div>
                    <p>{{$lawyer->reviews->count()}} reviews</p>
                    <p>Area of Law</p>
                    <div class="lawyers_2_inp">
                        @foreach($lawyer->categories as $category)
                            {{$category->name}}
                        @endforeach
                        {{--<div class="lawyers_2_checkbox">--}}
                        {{--<input type="checkbox" name="" value="">--}}
                        {{--<p>Lorem</p>--}}
                        {{--</div>--}}
                        {{--<div class="lawyers_2_checkbox">--}}
                        {{--<input type="checkbox" name="" value="">--}}
                        {{--<p>Lorem</p>--}}
                        {{--</div>--}}
                        {{--<div class="lawyers_2_checkbox">--}}
                        {{--<input type="checkbox" name="" value="">--}}
                        {{--<p>Lorem</p>--}}
                        {{--</div>--}}
                    </div>
                    {{--<button type="button" name="button">Contact Me</button>--}}
                    <a href="{{route('lawyers.show', $lawyer->user_id)}}" name="button">
                        <button type="button" name="button">Contact Me</button>
{{--                        {{route('lawyer.profile', $lawyer->user_id)}}--}}
                    </a>
                </div>
            @endforeach

            {{--<div class="lawyers_2_box">--}}
            {{--<img src="{{asset('assets/site/main/img/lawyer_face.png')}}" alt="">--}}
            {{--<p>Lawyer Name</p>--}}
            {{--<p>Lawyer Firm Name</p>--}}
            {{--<div class="lawyers_2_stars">--}}
            {{--<img src="{{asset('assets/site/main/img/star.png')}}" alt="">--}}
            {{--<img src="{{asset('assets/site/main/img/star.png')}}" alt="">--}}
            {{--<img src="{{asset('assets/site/main/img/star.png')}}" alt="">--}}
            {{--<img src="{{asset('assets/site/main/img/star.png')}}" alt="">--}}
            {{--<img src="{{asset('assets/site/main/img/star.png')}}" alt="">--}}
            {{--</div>--}}
            {{--<p>3 reviews</p>--}}
            {{--<p>Area of Law</p>--}}
            {{--<div class="lawyers_2_inp">--}}
            {{--<div class="lawyers_2_checkbox">--}}
            {{--<input type="checkbox" name="" value="">--}}
            {{--<p>Lorem</p>--}}
            {{--</div>--}}
            {{--<div class="lawyers_2_checkbox">--}}
            {{--<input type="checkbox" name="" value="">--}}
            {{--<p>Lorem</p>--}}
            {{--</div>--}}
            {{--<div class="lawyers_2_checkbox">--}}
            {{--<input type="checkbox" name="" value="">--}}
            {{--<p>Lorem</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<button type="button" name="button">Contact Me</button>--}}
            {{--</div>--}}
            {{--<div class="lawyers_2_box">--}}
            {{--<img src="{{asset('assets/site/main/img/lawyer_face.png')}}" alt="">--}}
            {{--<p>Lawyer Name</p>--}}
            {{--<p>Lawyer Firm Name</p>--}}
            {{--<div class="lawyers_2_stars">--}}
            {{--<img src="{{asset('assets/site/main/img/star.png')}}" alt="">--}}
            {{--<img src="{{asset('assets/site/main/img/star.png')}}" alt="">--}}
            {{--<img src="{{asset('assets/site/main/img/star.png')}}" alt="">--}}
            {{--<img src="{{asset('assets/site/main/img/star.png')}}" alt="">--}}
            {{--<img src="{{asset('assets/site/main/img/star.png')}}" alt="">--}}
            {{--</div>--}}
            {{--<p>3 reviews</p>--}}
            {{--<p>Area of Law</p>--}}
            {{--<div class="lawyers_2_inp">--}}
            {{--<div class="lawyers_2_checkbox">--}}
            {{--<input type="checkbox" name="" value="">--}}
            {{--<p>Lorem</p>--}}
            {{--</div>--}}
            {{--<div class="lawyers_2_checkbox">--}}
            {{--<input type="checkbox" name="" value="">--}}
            {{--<p>Lorem</p>--}}
            {{--</div>--}}
            {{--<div class="lawyers_2_checkbox">--}}
            {{--<input type="checkbox" name="" value="">--}}
            {{--<p>Lorem</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<button type="button" name="button">Contact Me</button>--}}
            {{--</div>--}}
        </div>
    </section>
    @if(isset($third_content))
        <section class="lawyers_3">
            <div class="opacity_bg">
                <p>{{$third_content->description}}</p>
                <p>{{$third_content->title}}</p>
            </div>
        </section>
    @endif

    <div class="legal-for-users">
        {!! $variables['home-slider-1'] !!}
    </div>

{{--    <section>--}}
{{--        <div class="Reach_legals">--}}
{{--            <h3>Reach Legal for Users </h3>--}}
{{--            <div class="Reach_legals_div"></div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section  class="lawyers_4">--}}
{{--        <div class="lawyers_4_size">--}}
{{--            <div class="lawyers_4_left">--}}
{{--                <div class="lawyers_items" id="lawyers_items1" data-id="image1">--}}
{{--                    <div class="verified">--}}
{{--                        <img src="{{asset('assets/images/general/verified.png')}}" alt="">--}}
{{--                        <p>Lorem ipsum dolor sit amet</p>--}}
{{--                    </div>--}}
{{--                    <div class="lawyers_4_left_text">--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse--}}
{{--                            aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis--}}
{{--                            libero vel tortor porta suscipit ut in urna.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="lawyers_items" id="lawyers_items3" data-id="image2">--}}
{{--                    <div class="verified">--}}
{{--                        <img src="{{asset('assets/images/general/verified.png')}}" alt="">--}}
{{--                        <p>Lorem ipsum dolor sit amet</p>--}}
{{--                    </div>--}}
{{--                    <div class="lawyers_4_left_text">--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse--}}
{{--                            aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis--}}
{{--                            libero vel tortor porta suscipit ut in urna.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="lawyers_items" id="lawyers_items2" data-id="image3">--}}
{{--                    <div class="verified">--}}
{{--                        <img src="{{asset('assets/images/general/verified.png')}}" alt="">--}}
{{--                        <p>Lorem ipsum dolor sit amet</p>--}}
{{--                    </div>--}}
{{--                    <div class="lawyers_4_left_text">--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse--}}
{{--                            aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis--}}
{{--                            libero vel tortor porta suscipit ut in urna.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="lawyers_4_right active">--}}
{{--                <div class="lawyers_4_right_box" id="image1">--}}
{{--                    <div class="lawyers_4_right_box_top">--}}
{{--                        <p>Lorem ipsum </p>--}}
{{--                    </div>--}}
{{--                    <div class="lawyers_4_right_box_price">--}}
{{--                        <p>--}}
{{--                            $<span class="mo_price">99</span>/mo--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <p class="poss_price_text">Lorem ipsum dolor sit amet, consectetur adipiscing--}}
{{--                        elit. Suspendisse aliquet metus non lectus porttitor, ac</p>--}}
{{--                    <button type="button" name="button">Free 30-Day Trial</button>--}}
{{--                </div>--}}
{{--                <div class="lawyers_4_right_box" id="image2">--}}
{{--                    <div class="lawyers_4_right_box_2">--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing--}}
{{--                            elit. Suspendisse aliquet metus non lectus porttitor, ac</p>--}}
{{--                    </div>--}}
{{--                    <div class="dis_flex_end">--}}
{{--                        <div class="lawyers_4_right_box_3">--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing--}}
{{--                                elit. Suspendisse aliquet metus non lectus porttitor, ac</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="lawyers_4_right_box_2">--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing--}}
{{--                            elit. Suspendisse aliquet metus non lectus porttitor, ac</p>--}}
{{--                    </div>--}}
{{--                    <div class="dis_flex_end">--}}
{{--                        <div class="lawyers_4_right_box_3">--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing--}}
{{--                                elit. Suspendisse aliquet metus non lectus porttitor, ac</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="lawyers_4_right_box" id="image3">--}}

{{--                    <div class="book">--}}
{{--                        <img src="{{asset('assets/images/general/Book.png')}}" alt="">--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="lawyers_4_left_bottom">--}}
{{--            <a href="{{route('register')}}"></a>  <button type="button" name="button">Get Started</button>--}}
{{--        </div>--}}
{{--    </section>--}}

    {!! $variables['home-slider-2'] !!}

{{--    <section>--}}
{{--        <div class="Reach_legals">--}}
{{--            <h3>Reach Legal’s Featured Lawyers </h3>--}}
{{--            <div class="Reach_legals_div">--}}
{{--            </div>--}}
{{--            <p>Explore our directory and discover exclusive ratings and reviews of the lawyers near you.</p>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    --}}
{{--    <section  class="lawyers_4">--}}
{{--        <div class="lawyers_4_size">--}}
{{--            <div class="lawyers_4_right1 ">--}}
{{--                <div class="lawyers_4_right_box1" id="image4">--}}
{{--                    <img src="{{asset('assets/images/general/Polygon.png')}}" alt="">--}}
{{--                </div>--}}
{{--                <div class="lawyers_4_right_box1" id="image5">--}}
{{--                    <img src="{{asset('assets/images/general/search.png')}}" alt="">--}}
{{--                </div>--}}
{{--                <div class="lawyers_4_right_box1" id="image6">--}}
{{--                    <img src="{{asset('assets/images/general/share.png')}}" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="lawyers_4_left">--}}
{{--                <div class="lawyers_items1" id='lawyers_items4' data-id="image4">--}}
{{--                    <div class="verified">--}}
{{--                        <img src="{{asset('assets/images/general/verified.png')}}" alt="">--}}
{{--                        <p>Lorem ipsum dolor sit amet</p>--}}
{{--                    </div>--}}
{{--                    <div class="lawyers_4_left_text">--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse--}}
{{--                            aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis--}}
{{--                            libero vel tortor porta suscipit ut in urna.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="lawyers_items1" id='lawyers_items6' data-id="image5" >--}}
{{--                    <div class="verified">--}}
{{--                        <img src="{{asset('assets/images/general/verified.png')}}" alt="">--}}
{{--                        <p>Lorem ipsum dolor sit amet</p>--}}
{{--                    </div>--}}
{{--                    <div class="lawyers_4_left_text">--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse--}}
{{--                            aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis--}}
{{--                            libero vel tortor porta suscipit ut in urna.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="lawyers_items1" id='lawyers_items5'  data-id="image6">--}}
{{--                    <div class="verified">--}}
{{--                        <img src="{{asset('assets/images/general/verified.png')}}" alt="">--}}
{{--                        <p>Lorem ipsum dolor sit amet</p>--}}
{{--                    </div>--}}
{{--                    <div class="lawyers_4_left_text">--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse--}}
{{--                            aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis--}}
{{--                            libero vel tortor porta suscipit ut in urna.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="lawyers_4_left_bottom lawyers_4_left_bottom1">--}}
{{--            <a href="{{route('register')}}" ><button type="button" name="button">Get Started</button></a>--}}
{{--            <a href="">--}}
{{--                <button type="button" name="button" class="Learn_more">Learn more</button>--}}
{{--                {{route('single')}}--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </section>--}}


    <section class="lawyers_6">
        <section>
            <div class="Reach_legals">
                <h3>What our community is saying?</h3>
                <div class="Reach_legals_div"></div>
            </div>

            <!-- SLIDER -->
            <div class="lawyers_6_size">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="slider_img">
                            <img src="{{asset('assets/images/general/slider.png')}}" alt="">
                        </div>
                        <div class="slider_box">

                            <div class="slider_name">
                                <p>Name</p>
                            </div>
                            <div class="slider_box_top">
                                <img src="{{asset('assets/images/general/slider2.png')}}" alt="">
                            </div>
                            <div class="slider_box_main">
                                <p>Lorem ipsum dolor
                                    sit amet, consectetur
                                    adipiscing elit. Sed
                                    tellus tellus, accumsan
                                    eget pretium sed</p>
                            </div>
                            <div class="slider_box_bottom">
                                <img src="{{asset('assets/images/general/slider3.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slider_img">
                            <img src="{{asset('assets/images/general/slider.png')}}" alt="">
                        </div>
                        <div class="slider_box">

                            <div class="slider_name">
                                <p>Name</p>
                            </div>
                            <div class="slider_box_top">
                                <img src="{{asset('assets/images/general/slider2.png')}}" alt="">
                            </div>
                            <div class="slider_box_main">
                                <p>Lorem ipsum dolor
                                    sit amet, consectetur
                                    adipiscing elit. Sed
                                    tellus tellus, accumsan
                                    eget pretium sed</p>
                            </div>
                            <div class="slider_box_bottom">
                                <img src="{{asset('assets/images/general/slider3.png')}}" alt="">
                            </div>
                        </div></div>
                    <div class="item">         <div class="slider_img">
                            <img src="{{asset('assets/images/general/slider.png')}}" alt="">
                        </div>
                        <div class="slider_box">

                            <div class="slider_name">
                                <p>Name</p>
                            </div>
                            <div class="slider_box_top">
                                <img src="{{asset('assets/images/general/slider2.png')}}" alt="">
                            </div>
                            <div class="slider_box_main">
                                <p>Lorem ipsum dolor
                                    sit amet, consectetur
                                    adipiscing elit. Sed
                                    tellus tellus, accumsan
                                    eget pretium sed</p>
                            </div>
                            <div class="slider_box_bottom">
                                <img src="{{asset('assets/images/general/slider3.png')}}" alt="">
                            </div>
                        </div></div>
                    <div class="item">         <div class="slider_img">
                            <img src="{{asset('assets/images/general/slider.png')}}" alt="">
                        </div>
                        <div class="slider_box">

                            <div class="slider_name">
                                <p>Name</p>
                            </div>
                            <div class="slider_box_top">
                                <img src="{{asset('assets/images/general/slider2.png')}}" alt="">
                            </div>
                            <div class="slider_box_main">
                                <p>Lorem ipsum dolor
                                    sit amet, consectetur
                                    adipiscing elit. Sed
                                    tellus tellus, accumsan
                                    eget pretium sed</p>
                            </div>
                            <div class="slider_box_bottom">
                                <img src="{{asset('assets/images/general/slider3.png')}}" alt="">
                            </div>
                        </div></div>
                    <div class="item">         <div class="slider_img">
                            <img src="{{asset('assets/images/general/slider.png')}}" alt="">
                        </div>
                        <div class="slider_box">

                            <div class="slider_name">
                                <p>Name</p>
                            </div>
                            <div class="slider_box_top">
                                <img src="{{asset('assets/images/general/slider2.png')}}" alt="">
                            </div>
                            <div class="slider_box_main">
                                <p>Lorem ipsum dolor
                                    sit amet, consectetur
                                    adipiscing elit. Sed
                                    tellus tellus, accumsan
                                    eget pretium sed</p>
                            </div>
                            <div class="slider_box_bottom">
                                <img src="{{asset('assets/images/general/slider3.png')}}" alt="">
                            </div>
                        </div></div>
                    <div class="item">         <div class="slider_img">
                            <img src="{{asset('assets/images/general/slider.png')}}" alt="">
                        </div>
                        <div class="slider_box">

                            <div class="slider_name">
                                <p>Name</p>
                            </div>
                            <div class="slider_box_top">
                                <img src="{{asset('assets/images/general/slider2.png')}}" alt="">
                            </div>
                            <div class="slider_box_main">
                                <p>Lorem ipsum dolor
                                    sit amet, consectetur
                                    adipiscing elit. Sed
                                    tellus tellus, accumsan
                                    eget pretium sed</p>
                            </div>
                            <div class="slider_box_bottom">
                                <img src="{{asset('assets/images/general/slider3.png')}}" alt="">
                            </div>
                        </div></div>
                    <div class="item">
                        <div class="slider_img">
                            <img src="{{asset('assets/images/general/slider.png')}}" alt="">
                        </div>
                        <div class="slider_box">

                            <div class="slider_name">
                                <p>Name</p>
                            </div>
                            <div class="slider_box_top">
                                <img src="{{asset('assets/images/general/slider2.png')}}" alt="">
                            </div>
                            <div class="slider_box_main">
                                <p>Lorem ipsum dolor
                                    sit amet, consectetur
                                    adipiscing elit. Sed
                                    tellus tellus, accumsan
                                    eget pretium sed</p>
                            </div>
                            <div class="slider_box_bottom">
                                <img src="{{asset('assets/images/general/slider3.png')}}" alt="">
                            </div>
                        </div></div>
                </div>
            </div>




        </section>
    </section>

    @include('partials._join-community')

@endsection

@section('extra-scripts')
    <script src="{{asset('js/slider.js')}}"></script>
@endsection