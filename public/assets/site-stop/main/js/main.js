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
  })

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

});