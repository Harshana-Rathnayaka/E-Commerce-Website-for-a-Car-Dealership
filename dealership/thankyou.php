<!DOCTYPE html>
<html>

<head>
    <title>
        Thank Your For Your Purchase
    </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="stylesheet/bootstrap.min.css">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

    <?php
    include '../instamojo/Instamojo.php';
    $api = new Instamojo\Instamojo('test_4e779d7c96c0e971e34dff7524c', 'test_4a0af00544f088f3e3cef293303', 'https://test.instamojo.com/api/1.1/');
    $payment_id = $_GET['payment_request_id'];
    try {
        $response = $api->paymentRequestStatus($payment_id);
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12 mr-auto ml-auto text-center">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title"><strong>Thank You!</strong> </h1>
                            <hr>
                            <h1 class="card-title">Payment Successful..</h1>
                            <p class="card-text"> Thank you for your puchase of a <?php echo $response['purpose']; ?>! </p>
                            <hr>
                            <h3> Payment Details </h3>


                            <table class=" text-left table table-responsive table-bordered">
                                <tr>
                                    <th>You Purchased : </th>
                                    <td> <?php echo $response['purpose']; ?> </td>
                                </tr>
                                <tr>
                                    <th>Paid Amount : </th>
                                    <td> <?php echo $response['amount']; ?> </td>
                                </tr>
                                <tr>
                                    <th>Payment ID : </th>
                                    <td> <?php echo $response['payments'][0]['payment_id']; ?> </td>
                                </tr>
                                <tr>
                                    <th>Name : </th>
                                    <td> <?php echo $response['payments'][0]['buyer_name']; ?> </td>
                                </tr>
                                <tr>
                                    <th>Email : </th>
                                    <td> <?php echo $response['payments'][0]['buyer_email']; ?> </td>
                                </tr>
                            </table>
                        <?php
                        } catch (Exception $e) {
                            print('Error: ' . $e->getMessage());
                        }
                        ?>
                        <a href="index.php" class="btn btn-primary">Go back to Home Page</a>
                        <a href="../user/index.php" class="btn btn-warning">Check your order Status</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>