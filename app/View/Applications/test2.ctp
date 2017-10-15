

<input type="text" name="barcode" id="barcode"> // BARCODE SCAN
<input type="text" name="barcode" id="barcode1"> // BARCODE SCAN

<input type="text" name="barcode" id="barcode2"> // BARCODE SCAN

<input type="text" name="barcode" id="barcode3"> // BARCODE SCAN

<input type="text" name="barcode" id="barcode4"> // BARCODE SCAN

<input type="text" id="student" placeholder="studentenNaam" size="30"> //NAME FROM DB
               <!--  <input type="text" id="barcode" placeholder="Waiting for barcode scan..." size="40">
               <input type="text" id="student" placeholder="studentenNaam" size="30">-->

         </div>
// just the script for scanning the barcode :

    <script>
     var barcodeParsed = null;
     var studentenNr = null;
$(document).ready(function() {
    var pressed = false; 
    var chars = []; 
    $(window).keypress(function(e) {
        if (e.which >= 48 && e.which <= 57) {
            chars.push(String.fromCharCode(e.which));
        }
        console.log(e.which + ":" + chars.join("|"));
        if (pressed == false) {
            setTimeout(function(){
                if (chars.length >= 10) {
                    var barcode = chars.join("");
                    console.log("Barcode Scanned: " + barcode);
                    barcodeParsed = barcode;
                    var barcodeParsing = barcodeParsed.substring(5,11);

                    //$("#barcode").val("s" + barcodeParsing);
                    //studentenNr = "s" + barcodeParsing;
                    alert(barcodeParsing);
                }
                chars = [];
                pressed = false;
            },500);
        }
        pressed = true;
    });
});

$("#barcode").keypress(function(e){
    if ( e.which === 13 ) {
        //$('#barcode1').focus();
        $bar = $('#barcode').val();
        $new_bar = $bar+",";
        $('#barcode').val($new_bar);
        //console.log("Prevent form submit.");
        //alert(studentenNr+"pks");
        //$.post('testdb.php', {'studnr' :studentenNr}, function(data){ //POST JS VAR TO PHP FILE
           //$('#student').html(data); //RECEIVE DATA FROM DB INTO ID ELEMENT
        //});
        //e.preventDefault();
    }
});


     </script>

