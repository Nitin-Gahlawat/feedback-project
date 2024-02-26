<style>
 .form-group{
    padding: 1.2rem;
  }
  form{
    border: 2px solid white;
    border-radius: 1.3rem;
  }
  label{
    margin-bottom:.5rem;

  }
    
</style>

<div class="container mt-5" id="Add-form" Style="display:none;">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form action="./index.php" method="post">

      <div class="form-group">
          <label for="topic">Enter topic</label>
          <input type="text" class="form-control" id="topic"  placeholder="Enter your topic" name="topic"></input>
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" rows="3" placeholder="Enter your message" name="msg"></textarea>
        </div>
        <div class="form-group">
          <label for="date">Date</label>
          <input type="date" class="form-control" id="date" name="date" max="" min="">
        </div>
        <div class="form-group">
          <label for="dropdown">Subject</label>
          <select class="form-control" id="dropdown" name="subject-dropdown">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
          </select>
        </div>
        <div class="form-group">
          <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="sumbit  " name="Adding">Button</button>
          </div>
        </div >
      </form>
    </div>
  </div>
</div> 


<script>
        // var today = new Date().toISOString().split('T')[0];
        // var sevenDaysAgo = new Date();
        // sevenDaysAgo.setDate(sevenDaysAgo.getDate() - 7);
        // var minDate = sevenDaysAgo.toISOString().split('T')[0];

        // document.getElementById("date").max = today;
        // document.getElementById("date").min = minDate;

       

</script>