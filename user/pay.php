<!DOCTYPE html>
<?php
include("../includes/config.php");
include("../includes/session.php");
echo $Uid;
?>

<html>
<head>
  <title>Premium Membership Payment</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      text-align: center;
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      background: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      font-weight: bold;
    }
    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .payment-button {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .membership-details {
      background: #f9f9f9;
      padding: 10px;
      border-radius: 5px;
      text-align: left;
    }
    .membership-details h2 {
      color: #007bff;
    }
  </style>
</head>
<body>
  <div class="container">
    <form action="payaction.php">
    <h1>Premium Membership Payment</h1>
   
      <div class="membership-details">
        <h2>Membership Details</h2>
        <p><strong>Membership Type:</strong> Premium</p>
        <p><strong>Price:</strong> $49.99/month</p>
      </div>
      <div class="form-group">
        <label for="cardNumber">card_number</label>
        <input type="text" id="cardNumber" name="cardno" placeholder="" required>
      </div>
      <div class="form-group">
        <label for="expiration">expiry_date</label>
        <input type="date" id="expiration"name="expiry" placeholder="" required>
      </div>
      <div class="form-group">
        <label for="cvv">cvv</label>
        <input type="number" id="cvv"name="cvv" placeholder="" required>
      </div>
       <button type="submit"  class="payment-button">Make Payment</button> 
  </form>
  </div>
</body>
</html>
