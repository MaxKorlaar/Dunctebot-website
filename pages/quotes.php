<div class="container">
    <div class="row">
        <div class="col-12">
            <form id="quotesForm" action="./api/addQuote.php" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="name">Your (user)name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="duncte123" required>
                </div>
                <div class="form-group">
                    <label for="group">Your quote</label>
                    <input type="text" class="form-control" name="quote" id="quote" placeholder="I'm blue daba dee daba da" required />
                </div>
                <button class="btn btn-danger g-recaptcha"
                data-sitekey="<?php echo $config['chapta']['sitekey']; ?>"
                data-callback="submitForm">Submit</button>
                <span id="msg" class="fadeOut"></span>
                <input type="hidden" class="form-control" name="token" id="chaptoken" required />
            </form>
        </div>
    </div>
</div>
<script src="js/get.js"></script>
<script>
    var urlVars = getUrlVars(),
    err =  urlVars["error"],
    success = urlVars["success"];
    if(err != null){
      document.getElementById("msg").innerHTML = "<strong>ERROR: </strong> " + err.replace(/\+/g, ' ');
    }
    if(success != null && success=="1"){
      document.getElementById("msg").innerHTML = "Success, your quote has been added :D";
    }
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
     function submitForm(token) {
       document.getElementById("chaptoken").value = token;
       document.getElementById("quotesForm").submit();
     }
</script>
