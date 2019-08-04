@extends('users.layouts.main')

@section('title', 'Messages')

@section('content')

    <div class="nav-btn pull-left">
        <span></span>
        <span></span>
        <span></span>
    </div>



    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar"  placeholder="Search" >
                        </div>
                    </div>
                </div>
                <div class="inbox_chat scroll">
                    @if(!$users->count())
                        <div class="text-center mt-4">No Contact yet.</div>
                    @endif
                    @foreach($users as $user)
                        <div class="chat_list" data-sender="{{ $user->sender->id }}">
                            <div class="chat_people">
                                <div class="chat_img">
                                    @if($user->senders->image)
                                        <img src="{{asset('assets/images/profile/' . $user->senders->image)}}" alt="sunil">
                                    @else
                                        <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                    @endif
                                </div>
                                <div class="chat_ib">
                                    <h5>{{ $user->sender->full_name }} <span class="chat_date"></span></h5>
    {{--                                <p>Test, which is a new approach to have all solutions--}}
    {{--                                    astrology under one roof.</p>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
{{--                    <div class="chat_list">--}}
{{--                        <div class="chat_people">--}}
{{--                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                            <div class="chat_ib">--}}
{{--                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                <p>Test, which is a new approach to have all solutions--}}
{{--                                    astrology under one roof.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="chat_list">--}}
{{--                        <div class="chat_people">--}}
{{--                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                            <div class="chat_ib">--}}
{{--                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                <p>Test, which is a new approach to have all solutions--}}
{{--                                    astrology under one roof.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="chat_list">--}}
{{--                        <div class="chat_people">--}}
{{--                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                            <div class="chat_ib">--}}
{{--                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                <p>Test, which is a new approach to have all solutions--}}
{{--                                    astrology under one roof.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="chat_list">--}}
{{--                        <div class="chat_people">--}}
{{--                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                            <div class="chat_ib">--}}
{{--                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                <p>Test, which is a new approach to have all solutions--}}
{{--                                    astrology under one roof.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="chat_list">--}}
{{--                        <div class="chat_people">--}}
{{--                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                            <div class="chat_ib">--}}
{{--                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                <p>Test, which is a new approach to have all solutions--}}
{{--                                    astrology under one roof.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="chat_list">--}}
{{--                        <div class="chat_people">--}}
{{--                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                            <div class="chat_ib">--}}
{{--                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                <p>Test, which is a new approach to have all solutions--}}
{{--                                    astrology under one roof.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history">
                    <div>Click on any contact to get messages!</div>
{{--                    <div class="incoming_msg">--}}
{{--                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                        <div class="received_msg">--}}
{{--                            <div class="received_withd_msg">--}}
{{--                                <p>Test which is a new approach to have all--}}
{{--                                    solutions</p>--}}
{{--                                <span class="time_date"> 11:01 AM    |    June 9</span></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="outgoing_msg">--}}
{{--                        <div class="sent_msg">--}}
{{--                            <p>Test which is a new approach to have all--}}
{{--                                solutions</p>--}}
{{--                            <span class="time_date"> 11:01 AM    |    June 9</span> </div>--}}
{{--                    </div>--}}
{{--                    <div class="incoming_msg">--}}
{{--                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                        <div class="received_msg">--}}
{{--                            <div class="received_withd_msg">--}}
{{--                                <p>Test, which is a new approach to have</p>--}}
{{--                                <span class="time_date"> 11:01 AM    |    Yesterday</span></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="outgoing_msg">--}}
{{--                        <div class="sent_msg">--}}
{{--                            <p>Apollo University, Delhi, India Test</p>--}}
{{--                            <span class="time_date"> 11:01 AM    |    Today</span> </div>--}}
{{--                    </div>--}}
{{--                    <div class="incoming_msg">--}}
{{--                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                        <div class="received_msg">--}}
{{--                            <div class="received_withd_msg">--}}
{{--                                <p>We work directly with our designers and suppliers,--}}
{{--                                    and sell direct to you, which means quality, exclusive--}}
{{--                                    products, at a price anyone can afford.</p>--}}
{{--                                <span class="time_date"> 11:01 AM    |    Today</span></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input type="text" class="write_msg" placeholder="Type a message" />
                        <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>












    <div class="clear"></div>
@endsection

@section('extra-scripts')
    <script src="{{ asset('js/message.js') }}"></script>
    <script src="{{ asset('js/components/MessageDashboard.js') }}" ></script>
@endsection