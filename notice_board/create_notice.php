<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Notice</title>
  </head>
  <body>
      <center><h4>Send Notice</h4></center>
      <div>
        <form action="" method="post">
          <div class="form-group">
              <label>To Class:</label>
              <select class="form-control" name="class">
                <option>All</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
              </select>
          </div>
          <div class="form-group">
            <label>Date:</label>
            <input type="date" class="form-control" name="date">
          </div>
          <div class="form-group">
            <label>Event Name:</label>
            <input type="text" class="form-control" name="event_name" placeholder="Enter the event name">
          </div>
          <div class="form-group">
            <label>Message:</label>
            <textarea name="msg" rows="4" cols="30" class="form-control" placeholder="Type your message..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary"name="send_notice">Send Notice</button>
        </form>
      </div>
      <hr>
  </body>
</html>
