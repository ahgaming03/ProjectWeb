<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Customer Order Information</title>
  </head>
  <body>
    <div class="container">
      <h1>Customer Order Information</h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
          </tr>
        </thead>
        <tbody>
          <!-- Here is where your server-side code will insert rows of data. -->
          <!-- For instance, if using PHP: -->
          <!-- 
          <?php foreach($orders as $order): ?>
            <tr>
              <th scope="row"><?php echo $order->id; ?></th>
              <td><?php echo $order->product_name; ?></td>
              <td><?php echo $order->quantity; ?></td>
              <td><?php echo $order->total_price; ?></td>
            </tr>
          <?php endforeach; ?> 
          -->
        </tbody>
      </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
