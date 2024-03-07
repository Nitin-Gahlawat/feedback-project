<style>
  #View-data {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    flex-direction: column;
  }
</style>
<div id="View-data" class="mt-5" style="display:none">
  <label class="col-md-6 offset-md-3">7/03/2024</label>
  <div class="card border-primary mb-3 mt-1 col-md-6 offset-md-3" style="max-width: 90rem;">
    <div class="card-header" onclick="toogleCard()">Header</div>
    <div class="card-body text-primary" id="Card-Body" style="display:none">
      <form action="./index.php" method="post" class="AddSideBox">

        <div class="form-group">
          <label for="topic">Enter topic</label>
          <input type="text" class="form-control" id="topic" placeholder="Enter your topic" name="topic"
            autocomplete="off"></input>
        </div>

        <div class="form-group">
          <label for="message">Enter FeedBack</label>
          <textarea class="form-control" id="message" rows="3" placeholder="Enter your message" name="msg"></textarea>
        </div>

        <div class="form-group">
          <label for="date">Date Of FeedBack</label>
          <input type="text" class="form-control" id="datepicker" name="date" autocomplete="off"
            placeholder="DD-MM-YYYY" readonly>
        </div>

        <div class="form-group">
          <label for="dropdown">Subject</label>
          <select class="form-control" id="dropdown" name="subject-dropdown">
            <?php
              for ($i=0; $i < count($res); $i++) { 
                echo "<option value=".$res[$i].">".$res[$i]."</option>";  
              }

            ?>
          </select>
        </div>
      </form>    
    </div>
  </div>
  <label class="col-md-6 offset-md-3">7/03/2024</label>
  <div class="card border-primary mb-3 mt-1 col-md-6 offset-md-3" style="max-width: 90rem;">
    <div class="card-header" onclick="toogleCard()">Header</div>
    <div class="card-body text-primary" id="Card-Body" style="display:none">
      <form action="./index.php" method="post" class="AddSideBox">

        <div class="form-group">
          <label for="topic">Enter topic</label>
          <input type="text" class="form-control" id="topic" placeholder="Enter your topic" name="topic"
            autocomplete="off"></input>
        </div>

        <div class="form-group">
          <label for="message">Enter FeedBack</label>
          <textarea class="form-control" id="message" rows="3" placeholder="Enter your message" name="msg"></textarea>
        </div>

        <div class="form-group">
          <label for="date">Date Of FeedBack</label>
          <input type="text" class="form-control" id="datepicker" name="date" autocomplete="off"
            placeholder="DD-MM-YYYY" readonly>
        </div>

        <div class="form-group">
          <label for="dropdown">Subject</label>
          <select class="form-control" id="dropdown" name="subject-dropdown">
            <?php
              for ($i=0; $i < count($res); $i++) { 
                echo "<option value=".$res[$i].">".$res[$i]."</option>";  
              }

            ?>
          </select>
        </div>
      </form>    
    </div>
  </div>
</div>
<script>
  function toogleCard() {
    let desc = document.getElementById("Card-Body");
    if (desc.style.display == "block")
      desc.style.display = "none";
    else
      desc.style.display = "block";
  }
</script>