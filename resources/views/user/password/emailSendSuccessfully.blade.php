<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Send Successfully</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");body{background-color: #eee;font-family: "Poppins", sans-serif;font-weight: 300}
        .container{height: 100vh}.card{width: 400px;border:none}
        .form-control{border: 2px solid #bdc1d2;font-size: 13px;height: 48px}
        .form-control:focus{color: #495057;background-color: #fff;border-color: #f7bfd9;outline: 0;box-shadow: none}.form{position: relative;margin-bottom: 25px}
        .form a{position: absolute;right: 8px;bottom: 10px;color: #6ca0d6;font-size: 13px;text-decoration: none;z-index: 10;background-color: #fff;padding: 5px}
        .continue{height: 48px;font-size: 13px;background-color: #e91e63;border: none}
        .line-text{color:#cecece}.line{background-color: #eeeff6;width: 166px;height: 2px}
        .member a{color: #e91e63;font-size: 14px}
        .member span{font-size: 13px;font-weight: 400;color: #6ca0d6}
        .facebook-button{background-color: #39559f}
        .facebook-button:hover{background-color: #39559f}
        .facebook:focus{color: #fff;background-color: #4285f4;border-color: #4285f4;box-shadow: none}
        .google-button{background-color: #4285f4}
        .google-button:hover{background-color: #4285f4}
    </style>
     <style>

        .parsley-required{

            margin-top:10px;
        }

        .box

        {

         width:100%;

         max-width:600px;

         background-color:#f9f9f9;

         border:1px solid #ccc;

         border-radius:5px;

         padding:16px;

         margin:0 auto;

        }

        input.parsley-success,

        select.parsley-success,

        textarea.parsley-success {

          color: #468847;

          background-color: #DFF0D8;

          border: 1px solid #D6E9C6;

        }

        input.parsley-error,

        select.parsley-error,

        textarea.parsley-error {

          color: #B94A48;

          background-color: #F2DEDE;

          border: 1px solid #EED3D7;

        }


        .parsley-errors-list {

          margin: 2px 0 3px;

          padding: 0;

          list-style-type: none;

          font-size: 0.9em;

          line-height: 0.9em;

          opacity: 0;


          transition: all .3s ease-in;

          -o-transition: all .3s ease-in;

          -moz-transition: all .3s ease-in;

          -webkit-transition: all .3s ease-in;

        }


        .parsley-errors-list.filled {

          opacity: 1;

        }



        .error,.parsley-type, .parsley-required, .parsley-equalto, .parsley-pattern, .parsley-length{

         color:#ff0000;

        }



        </style>
</head>
<body>


    <div class="container d-flex justify-content-center align-items-center">


        <div class="card">
            <div class="p-3 border-bottom d-flex align-items-center justify-content-center">

                <h6>@include('flash_message')</h6>
            </div>

                </div>

            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="{{ asset('/')}}public/front/script/parsely1.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
           $(document).ready(function() {

        $("#show-password").change(function(){
            $(this).prop("checked") ?  $("#upassword").prop("type", "text") : $("#upassword").prop("type", "password");
        });


        //checkMail


        $("#searchData").keyup(function(){

var email = $(this).val();
//alert(email);

 $.ajax({
url: "{{ route('checkEmailFromList') }}",
method: 'GET',
data: {email:email},
success: function(data) {

    //alert(data);

    if(data >= 1){

        $("#final_button").show();
        $('#dataCheck').html('Email Available');
        $("#dataCheck").css({"color": "green"});

    }else{



        $("#final_button").hide();
       $('#dataCheck').html('Email Not Available');
        $("#dataCheck").css({"color": "red"});
    }

}
});

});
    });

        </script>
</body>
</html>

