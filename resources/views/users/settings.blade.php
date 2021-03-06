@extends('users.layouts.main')

@section('title', 'Settings')

@section('content')
<div class="nav-btn pull-left">
    <span></span>
    <span></span>
    <span></span>
</div>
<!-- <div class="dashboard_content">


    <h3 class="dashboard_subtitle">Thank you for registering</h3>
    <div class="container-fluid">
      <div class="dashboard_box">
            <label>Account Information</label>
          <div class="d-box__bg">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-box">
                       <div class="d-box_title">
                            <h2>Contact Information</h2>
                           <a href=""><img src="images/edit.png"></a>
                           <a href=""><img src="images/shuffle.png"></a>
                       </div>
                        <p>Lorem Ipsum</p>
                        <p>Lorem.Ipsum@gmail.com</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="d-box">
                        <div class="d-box_title">
                            <h2>Newsletters</h2>
                            <a href=""><img src="images/edit.png"></a>
                        </div>
                        <p>You aren’t subscribed to our newsletter</p>
                    </div>
                </div>
            </div>
          </div>
      </div>

    <div class="dashboard_box">
            <label>Address Book</label>
        <div class="d-box__bg">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-box">
                        <div class="d-box_title">
                            <h2>default billing address</h2>
                            <a href=""><img src="images/edit.png"></a>
                        </div>
                        <p>You aren’t subscribed to our newsletter</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</div> -->
<div class="clear"></div>
@include('partials._messages')

<a href="{{route('lawyers.show', $user->id)}}">Your profile on Reach Legal</a>

<form method="POST" enctype="multipart/form-data" action="{{route('user.update', $user->id)}}">

    @csrf
    @method('PUT')

    <div class="faq-section">
        <input type="checkbox" class="faq-input" id="q1">

        <label for="q1" class="hand">
            <img src="{{asset('assets/images/general/dbd_1.png')}}" alt="" class="dbd_img">
            Add/Change profile photo clicking on it.
        </label>
        <div class="text_align">
            <label for="file-input" id="upload_file" class="hand" title="Click to add/change your image">
                @if($user->image)
                    <img src="{{asset('assets/images/profile/' . $user->image)}}" alt="" class="dbd_img profile-image">
                @else
                    <img src="{{asset('assets/images/general/add.png')}}" alt="" class="dash_img_add">
                @endif
            </label>
                <input type="file" id="file-input" name="image">
        </div>
    </div>
    <div class="faq-section">
        <input type="checkbox" class="faq-input" id="q2">
        <label for="q2" class="hand">
            <img src="{{asset('assets/images/general/dbd_2.png')}}" alt="Person" class="dbd_img">
            Introduce yourself
        </label>
        <div class="text_align">
            <textarea name="background" placeholder="Introduce yourself" class="dash_textarea">
                {{$user->lawyer->background}}
            </textarea>
        </div>
    </div>

    <div class="faq-section-area">
        <input type="checkbox" class="faq-input" id="q3">
        <label for="q3" class="hand"> <img src="{{asset('assets/images/general/dbd_3.png')}}" alt="" class="dbd_img">Your Area of Law</label>
        <!-- <div class="dis_block"> -->

        <div class="dash_3_blocks">
            <div class="dash_3_blocks_flex">
                @foreach($categories as $category)
                    <div class="dash_3_blocks_size">
                        <label class="dash_3_blocks_box hand" for="{{$category->id}}">
                            <div>
{{--                                <img src="{{asset('assets/images/general/db_1.png')}}" alt="Law">--}}
                                @if($category->icon)
                                    <img src="{{asset('assets/images/categories/icons/' . $category->icon)}}" alt="Law">
                                @else
                                    <img src="{{asset('assets/images/general/find_2_1.png')}}" alt="Law">
                                @endif
                            </div>
                        </label>
                        <input type="checkbox" id="{{$category->id}}" name="category_id[]" value="{{$category->id}}"
{{--                                {{$user->lawyer->categories->contains($category->id) ? 'checked' : ''}}>--}}
                                {{$checkedCategories->contains($category->id) ? 'checked' : ''}}>
                                {{$category->name}}<br>
                    </div>
                @endforeach
                @error('category_id')
                    <span class="input-error">
                        <strong>This field is required</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div>
        <input type="text" name="company" placeholder="Company" value="{{$user->lawyer->company}}">
        @error('company')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <input type="text" name="state" placeholder="State" value="{{$user->lawyer->state}}">
        @error('state')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <input type="text" name="city" placeholder="City" value="{{$user->lawyer->city}}">
        @error('city')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <input type="text" name="address" placeholder="Address" value="{{$user->lawyer->address}}">
        @error('address')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <input type="text" name="phone" placeholder="Phone Number" value="{{$user->lawyer->phone}}">
        @error('phone')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <input type="text" name="postcode" placeholder="Postal Code" value="{{$user->lawyer->postcode}}">
        @error('postcode')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <input type="text" name="company_website" placeholder="Company Website" value="{{$user->lawyer->company_website}}">
        @error('company_website')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <input type="text" name="university" placeholder="University" value="{{$user->lawyer->university}}">
        @error('university')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <input type="text" name="experience" placeholder="Number of years practiced" value="{{$user->lawyer->experience}}">
        @error('experience')
        <span class="input-error">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <input type="text" placeholder="Instagram" name="instagram" value="{{$user->lawyer->instagram}}">
        @error('instagram')
            <span class="input-error">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="dash_btn_bottom">
        <button type="submit">Submit</button>
    </div>
</form>
<hr/>
    <div id="publications" class="publications">

        @foreach($publications as $publication)
            <form class="delete-publication" data-pubid="{{$publication->id}}">
                <i class="far fa-file-pdf"></i>
                <span>{{$publication->title}}</span>
                <button type="submit" title="Click to remove this publication">
                    <i class="far fa-window-close"></i>
                </button>
            </form>
        @endforeach

        <h3>Add publications
            <span id="add-publication" class="hand">
                <i class="fas fa-plus"></i>
            </span>
        </h3>
        <form method="POST" id="publication-form" enctype="multipart/form-data" action="{{route('publications.store', $user->id)}}">
            @csrf

            <div class="publication-block-wrapper">
                <div class="publication-block">
                    <div>
                        <input type="text" name="title[]" placeholder="Title">
                        @error('title')
                            <span class="input-error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button title="Click to close this field" class="remove-pub-block">
                            <i class="far fa-window-close"></i>
                        </button>
                    </div>
                    <div>
                        <input type="file" name="publication[]" accept="application/pdf">
                        @error('publication')
                            <span class="input-error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="dash_btn_bottom">
                <button type="submit">Publish</button>
            </div>
        </form>
    </div>
@endsection
