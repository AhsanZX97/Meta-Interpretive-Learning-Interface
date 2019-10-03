$( document ).ready(function() {
   
    var canvas;
    var fileText = [];
    var input = [];

    $( "#train2" ).click(function(e)
    {
        e.preventDefault();
        $('#dataNN').click();
    });

    $('body').on('change','#dataNN', function(){
        var file = $(this).prop('files')[0];
        var form_data = new FormData();
        // get data from input by the web page
        form_data.append('file',file);
        form_data.append('num_input',$('#num_input').val());
        form_data.append('num_output',$('#num_output').val());
        form_data.append('num_layers',$('#num_layers').val());
        form_data.append('num_neurons_hidden',$('#num_neurons_hidden').val());
        form_data.append('desired_error',$('#desired_error').val());
        form_data.append('max_epochs',$('#max_epochs').val());
        form_data.append('epochs_between_reports',$('#epochs_between_reports').val());
        $("#loading").modal({
            backdrop: "static", //remove ability to close modal with click
            keyboard: false, //remove option to close with keyboard
            show: true //Display loader!
        });
        $.ajax({
            type: "POST", // POST request to PHP
            dataType: 'text', // returns a text
            cache: false,
            contentType: false,
            processData: false,
            data: form_data, // send the who form data over to PHP
            url: "./NN/NNtrain.php", // php file that gets activated
            success: function(response)
            {
                $("#loading").modal("hide")
                $('#result').html(response);
            }
        });
    });

    $( "#testNN" ).click(function(e)
    {
        e.preventDefault();
        $('#testFileNN').click();
    });

    $('body').on('change','#testFileNN', function(){

        // setup variables
        var file = $(this).prop('files')[0];
        var form_data = new FormData();
        var reader = new FileReader();

        reader.onload = function(e) {
            file = resizeImageToArray(e.target.result);
        }

        reader.readAsDataURL(file);
        
        setTimeout(function() {
            // sends the image array density over to the PHP file
            form_data.append('input',input);
            $.ajax({
                type: "POST",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                url: "./NN/NNtest.php",
                success: function(response)
                {
                    $('#result').html(response);
                }
            });
        }, 1000);   
        
    });

    $( "#trainNN" ).click(function(e){
        e.preventDefault();

        if($('#inputTrain1').val() === "" || $('#inputTrain2').val() === "") {
            $("#alert2").html("<div id='erralert' class='alert alert-danger alert-dismissible fade show'>Fill all forms first please.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            window.scrollTo(0,0);
            console.log("did this work lol");
            return false;
        }
        // setup the first line of data file that php fann will use as the rule
        var numOfOutcomes = $('#trainSet1').prop('files').length + $('#trainSet2').prop('files').length;
        var numOfInput = 10000;
        var numOfOutput = 1;
        var secondLine = numOfOutcomes + " " + numOfInput + " " + numOfOutput + "\n";
        fileText = []
        
        // first line refers to the 2 label
        fileText.push("0 " + $('#inputTrain1').val() + " 1 " + $('#inputTrain2').val() + " \n");

        // second line are the rules for the neural network
        fileText.push(secondLine);

        for(var i =0; i < $('#trainSet1').prop('files').length; i++) {
            var origFile = $('#trainSet1').prop('files')[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                file = resizeImage(e.target.result,-1);
            }

            reader.readAsDataURL(origFile);
        }

        for(var i =0; i < $('#trainSet2').prop('files').length; i++) {
            var origFile = $('#trainSet2').prop('files')[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                file = resizeImage(e.target.result,1);
            }

            reader.readAsDataURL(origFile);
        }

        // download data file was the image has been loaded
        setTimeout(function() { download("data.data"); }, 1000);
    });

    // converts the given array into lines on a file that is downloadable
    function download(filename) {
        var send = fileText.join("").replace(/,/g, ' ')
        var element = document.createElement('a');
        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(send));
        element.setAttribute('download', filename);
      
        element.style.display = 'none';
        document.body.appendChild(element);
      
        element.click();
      
        document.body.removeChild(element);
    }

    function resizeImageToArray(src) {

        // create a canvas to put the image on so it can be manipulated in JS
        canvas = document.createElement('canvas');
        ctx = canvas.getContext('2d');

        // set its dimension to target size
        canvas.width = 50;
        canvas.height = 50;

        var imgObj = new Image();

        // call functions the image
        imgObj.onload = function() 
        {   
            // makes the image fit into a 50 x 50 size
            ctx.drawImage(imgObj, 0, 0,50,50);
            // gets the pixel density array of image
            var imageData = ctx.getImageData(0,0,50,50);
            // converts it to readable format
            input = JSON.parse("[" + imageData.data + "]");
        };

        imgObj.src = src;
    }

    function resizeImage(src,num) {

        canvas = document.createElement('canvas');
        ctx = canvas.getContext('2d');

        // set its dimension to target size
        canvas.width = 50;
        canvas.height = 50;

        var imgObj = new Image();

        imgObj.onload = function() 
        {
            ctx.drawImage(imgObj, 0, 0,50,50);
            var imageData = ctx.getImageData(0,0,50,50);
            fileText.push(imageData.data  + "\n");
            fileText.push(num + "\n");
            // done to associal the number label with a named label 
            var filename = imgObj.src.replace(/^.*[\\\/]/, '');
        };

        imgObj.src = src;
    }

});