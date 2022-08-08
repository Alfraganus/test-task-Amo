<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/download-page-style.css">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form_main">
                <h4 class="heading"><strong>Search </strong> sample products <span></span></h4>
                <div class="form">

                    <input type="text" id="name" placeholder="product name"  name="name" class="txt">

                    <div class="form-group">
                        <label for="sel1">Select category:</label>
                        <select class="form-control" id="category">
                            <option value="1">Ceramics</option>
                            <option value="2">Embroidery</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sel1">Select starting price:</label>
                        <input type="text" id="start_price" required="" placeholder="starting price"
                               value="" name="name" class="txt">
                    </div>
                    <div class="form-group">
                        <label for="sel1">Select ending price:</label>
                        <input type="text" id="end_price"   placeholder="ending price"
                               value="" name="name" class="txt">
                    </div>

                    <input id="submit" type="submit" value="submit" name="submit" class="txt2">
                </div>
            </div>
        </div>
           <div class="col-md-8">
               <center>
                   <h2>Images are taken from here</h2>
                   <img style="width: 100%" src="files/img.png">
               </center>
           </div>
    </div>
</div>

<script>

    $('#submit').on('click', function() {
        var name = $('#name').val();
        var category = $('#category').val();
        var price_start = $('#start_price').val();
        var price_end = $('#end_price').val();
        $.post('https://cmdesign-api.eurosoft.dev/v1/craft-goods/products', {
                search: name,
                category: category,
                price_start: price_start,
                price_end: price_end,
            },
            function(returnedData){
                var arrayLength = returnedData.length;
                console.log(returnedData)
                if(arrayLength > 0 ) {
                    for (var i = 0; i < arrayLength; i++) {

                        console.log( 'name: '+ returnedData[i]['name'])
                        console.log( 'category: ' + returnedData[i]['craftTypes']['name']   );
                        console.log( 'price: ' + returnedData[i]['price']);
                        console.log( 'color: ' + returnedData[i]['color']);
                        console.log('---------------------------------------')
                    }
                } else {
                    console.log('data not found!')
                }
            });
    });

</script>