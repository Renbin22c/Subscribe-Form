<?php

    session_start();

    // Only change code below this line

    // Instruction: require all the files you need here. Tips: (includes/functions.php, includes/class-subscribe-form.php)
    require './includes/functions.php';
    require './includes/class-subscribe-form.php';

    // Only change code above this line

    if ( class_exists('SubscribeForm') )
      $subscribeForm = new SubscribeForm();

    if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
        $email = $_POST["email"];

    // Only change code below this line

    // Instruction: trigger the subscribe function in $subscribeForm, and store the result into $result variable
    $message = $subscribeForm->subscribe(
      $email
    );

    // Only change code above this line
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Subscribe To My Newsletter</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <style type="text/css">
      body {
        background: #f1f1f1;
      }
    </style>
  </head>
  <body>
    <div class="container mt-5 mb-2 mx-auto" style="max-width: 500px;">
        <div class="card">
            <div class="card-body">
                <h5 class="pb-2 text-center">Subscribe To My Newsletter</h5>
                <!-- Only change code below this line -->

                <!-- Instruction: Put error message or success message here -->
                <?php if(isset($message["status"]) && $message["status"]=='success'): ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo $message['message'] ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($message["status"]) && $message["status"]=='error'): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $message['message'] ?>
                    </div>
                <?php endif; ?>
                <!-- Only change code above this line -->
                <form
                    action="<?php echo $_SERVER["REQUEST_URI"]; ?>"
                    method="POST">
                    <div class="d-flex justify-content-between align-content-center gap-3">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email address" />
                        <button type="submit" class="btn btn-primary">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
