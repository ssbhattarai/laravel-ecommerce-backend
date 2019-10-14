<!DOCTYPE html>
<html>
<head>
 
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
 
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
 
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
 
input[type=submit]:hover {
  background-color: #45a049;
}
 
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
   
</head>
<body>
 
<h1>Order Product</h1>
 
<div class="container">
 
    <form method="POST" action="/neworders">
 
        {{ csrf_field() }}
 {{-- 'billing_email', 'billing_name', 'billing_city', 'billing_province', 'billing_phone', --}}
      
      <div class="form-control">
            <label >Billing Email</label>
          <input type="text" name="email" placeholder="Billing email">
 
      </div>
      <div class="form-control">
            <label >Billing Name</label>
          <input type="text" name="name" placeholder="Billing Name">
 
      </div>
      <div class="form-control">
            <label >Billing City</label>
          <input type="text" name="city" placeholder="Billing City">
 
      </div>
      <div class="form-control">
            <label >Billing Provience</label>
          <input type="text" name="province" placeholder="Billing provience">
 
      </div>
      <div class="form-control">
            <label >Billing Phone</label>
          <input type="text" name="phone" placeholder="Billing Phone">
 
      </div>
      <div>
 
            <input type="submit" value="Order Now">
 
      </div>
 
    </form>  
 
 </div>   
 
</body>
</html>