<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/download-page-style.css">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form_main">
                <h4 class="heading"><strong>Search </strong> uzbek artisans <span></span></h4>
                <div class="form">
                        <input type="text" id="name" required="" placeholder="Name (such as Alisher,  Numon, Sharofiddin)" value="" name="name" class="txt">
                        <input type="text" required="" placeholder="Please input your mobile No" value="" name="mob" class="txt">
                        <input type="text" required="" placeholder="Please input your Email" value="" name="email" class="txt">

                        <textarea placeholder="Your Message" name="mess" type="text" class="txt_3"></textarea>
                        <input id="submit" type="submit" value="submit" name="submit" class="txt2">
                </div>
            </div>
        </div
    </div>
</div>

<script>

    $('#submit').on('click', function() {
        var name = $('#name').val();
        console.log(name);
        $.post('https://cmdesign-api.eurosoft.dev/v1/craft-goods/products', { search: name},
            function(returnedData){

                console.log(returnedData);
            });
    });


</script>