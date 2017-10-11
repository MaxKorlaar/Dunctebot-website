<div class="container">
    <div class="row">
        <div class="col-12">
            <form id="kpopForm" action="./api/addKpop.php" method="POST" autocomplete="off">
                <div class="form-group">
                    <label for="name">Member name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Duncan Sterken (던컨 강점)" required>
                </div>
                <div class="form-group">
                    <label for="group">Group</label>
                    <input type="text" class="form-control" name="band" id="group" placeholder="A Group Name" required>
                </div>
                <div class="form-group">
                    <label for="image">Image Url</label>
                    <input type="text" class="form-control" name="img" id="image" placeholder="http://example.com/img.png" required>
                </div>
                <button class="btn btn-danger g-recaptcha"
                data-sitekey="<?php echo $config['chapta']['sitekey']; ?>"
                data-callback="submitForm">Submit</button>
                <span id="msg" class="fadeOut"></span>
                <input type="hidden" class="form-control" name="token" id="chaptoken" required>
            </form>
        </div>
    </div>
</div>
<script src="js/get.js"></script>
<script>
    var err =  getUrlVars()["error"],
    success = getUrlVars()["success"];
    if(err != null){
      document.getElementById("msg").innerHTML = "<strong>ERROR: </strong> " + err.replace(/\+/g, ' ');
    }
    if(success != null && success=="1"){
      document.getElementById("msg").innerHTML = "Success, the member is saved in the database :D";
    }
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
     function submitForm(token) {
       document.getElementById("chaptoken").value = token;
       document.getElementById("kpopForm").submit();
     }
</script>
