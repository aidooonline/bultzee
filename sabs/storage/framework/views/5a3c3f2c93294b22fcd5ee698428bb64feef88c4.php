
<script type="text/javascript">
    function randomIntFromInterval(min, max) { // min and max included 
      return Math.floor(Math.random() * (max - min + 1) + min)
    }
    
    const rndInt = randomIntFromInterval(1000, 9000);
    const rndIn2 = randomIntFromInterval(100, 999);
    const accountnumbergen = 'GCI00' + rndIn2.toString() + rndInt.toString();
     
    
    $(function() {
      // Handler for .ready() called.
     
    $("#accountnumbergen").val(accountnumbergen);
    $("#userid").val(uuidv4());
 
    
    });
    
    
    function uuidv4() {
      return ([1e7]+1e3+4e3+8e3+1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
      );
    }



    function generateconfirmcode() {
      return ([1e1]+1e1).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
      );
    }
      
    </script><?php /**PATH /Applications/MAMP/htdocs/nobsbackend/resources/views/layouts/genrandnumbers.blade.php ENDPATH**/ ?>