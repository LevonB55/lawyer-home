$( document ).ready(function() {

    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:3
          }
      }
  });

  // $('.lawyers_items').on("click", function () {
  //   $('.lawyers_4_right_box').css("display", "none");
  //    $('.lawyers_items').css("opacity", "0.3");
  //   $(this).css("opacity", "1");
  //
  //   var a = "#" + $(this).attr("data-id");
  //    $(a).css("display","block");
  //     });
  //
  //
  //     $('.lawyers_items1').on("click", function () {
  //       $('.lawyers_4_right_box1').css("display", "none");
  //        $('.lawyers_items1').css("opacity", "0.3");
  //       $(this).css("opacity", "1");
  //
  //       var a = "#" + $(this).attr("data-id");
  //        $(a).css("display","flex");
  //
  //         });

        // $('.lawyers_items').mouseover( function () {
        //   $('.lawyers_4_right_box').css("display", "none");
        //   var a = "#" + $(this).attr("data-id");
        //    $(a).css("display","block");
        //     });


    //Image upload
    $(function () {
        $("#file-input").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function imageIsLoaded(e) {
        $('#upload_file .dash_img_add').attr('src', e.target.result);
    };




    $(function(){
        $(".Message_now").click(function () {
            $('#qnimate').addClass('popup-box-on');
        });

        $("#removeClass").click(function () {
            $('#qnimate').removeClass('popup-box-on');
        });
    })

    //Add review on lawyers page
    $('#review-form').on('submit', function (e) {

        e.preventDefault();
        let lawyerId = $('#lawyer-id').val();
        let form = $(this);

        $.ajax({
            method: "POST",
            data: form.serializeArray(),
            url: '/reviews/lawyers/' + lawyerId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                let stars = '';
                for (let i = 0; i < data.grade; i++) {
                   stars += `<img src="/assets/images/general/star.png" alt="Star">`;
                }
                var d = new Date();

                let str = `
                    <div class="profile_3_box">
                        <div class="profile_3_box_top">
                            <div class="profile_3_box_top_stars">
                                ${stars}
                            </div>
                            <p>at ${d.getHours() + ':' +  d.getMinutes()}</p>
                        </div>
                        <p class="profile_3_box_text">${data.body}</p>
                    </div>
                `;

                $('#review-wrapper').prepend(str);

                let reviewsQuant = $('#reviews-quantity');
                let num = reviewsQuant.html();
                reviewsQuant.html(++num);
                form[0].reset();
                $('#reviews-list')[0].scrollIntoView();
            }
        });

    });

    //Pagination for reviews on lawyers
    $('#reviews-pages').on('click', function () {

        let pageNumber = $(this).pagination('getCurrentPage');
        let lawyerId = $(this).data('lawyerid');

        $.ajax({
            method: "GET",
            url: "/lawyers/reviews/" + lawyerId +"/page/" + pageNumber,
            success: function (data) {
                let months = ['January','February','March','April','May','June','July','August','September','October',
                    'November','December'];

                let reviews = data.map(review => {
                    let images = '';
                    var d = new Date(review.created_at);
                    for (let i = 0; i < review.grade; i++) {
                        images +=  `<img src="/assets/images/general/star.png" alt="Star">`;
                    }

                    for (let i = 0; i < 5 - review.grade; i++) {
                        images +=  `<img src="/assets/images/general/star-empty.jpg" alt="Star" class="rating-star">`;
                    }

                    return `
                        <div class="profile_3_box">
                            <div class="profile_3_box_top">
                                <div class="profile_3_box_top_stars">        
                                    ${images}
                                </div>
                                <p>in ${months[d.getMonth()] + ', ' + d.getFullYear()}</p>
                            </div>
                            <p class="profile_3_box_text">${review.body}</p>
                        </div>
                   `;
                });
                $('#review-wrapper').empty();
                $('#review-wrapper').append(reviews);
            }
        });
    });


    //Add Publication on lawyers dashboard
    $("#add-publication").on('click', function () {
        let publication = `
             <div class="publication-block">
                <div>
                    <input type="text" name="title[]" placeholder="Title">
                    <button title="Click to close this field" class="remove-pub-block">
                        <i class="far fa-window-close"></i>
                    </button>
                </div>

                <input type="file" name="publication[]" accept="application/pdf">
            </div>       
        `;
        $(".publication-block-wrapper").append(publication);
    });

    //Delete Database Publication
    $('.delete-publication').on('submit', function (e) {
        e.preventDefault();
        let pubId = $(this).data('pubid');
        let self = $(this);

        $.ajax({
           method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           url: '/lawyers/publications/' + pubId,
            success: function (data) {
                self.remove();
            }
        });
    });

    //Remove newly added but not submitted fields
    $(document).on('click', '.remove-pub-block', function () {
       $(this).parents('.publication-block').remove();
    });

    $('#rating-options').on('change', function (event) {
        let targetValue = +event.target.value;

        if(!targetValue) {
            $('.find_2_left_box').show();
        } else {
            var boxes = document.querySelectorAll('.find_2_left_box');
            for(var i = 0; i < boxes.length; i++){

                if(boxes[i].dataset.rating != targetValue){
                    boxes[i].style.display = 'none';
                } else {
                    boxes[i].style.display = 'block';
                }
            }
        }
        $("#lawyers-number").html( $('.find_2_left_box:visible').length);
    });

    $('.filter-options').on('change', function (e) {
        let lawyers = $('.find_2_left_box');
        let optionVal = e.target.value;
        lawyers.sort(function(a, b){ return $(b).data(optionVal) - $(a).data(optionVal)});
        $('.find_2_left_block').html(lawyers);
    });

    $('#login').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            method: 'POST',
            data: form.serializeArray(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/login',
            success: function (data) {
                window.location.href = data['intended'];
            },
            error: function (data) {
                $('#login_modal .error').html("<strong>" + data.responseJSON.error + "</strong>");
            }
        });
    });

    $('#news-subscribe-form').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        const newsMessage = $('.news-message');
        const sbmtBtn = form.find('button[type=submit]');
        sbmtBtn.attr('disabled', true);

        $.ajax({
            method: 'POST',
            data: form.serializeArray(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/subscribe-to-newsletter'
        })
        .then(res => {
            newsMessage.html(res.message);
            form[0].reset();
            setTimeout(function() { newsMessage.empty()}, 4000);
            sbmtBtn.attr('disabled', false);
        }).catch(err => {
            newsMessage.html(err.responseJSON.errors.email[0]);
            sbmtBtn.attr('disabled', false);
        });
    });

});
