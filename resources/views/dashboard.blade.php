<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Account Setup </title>

  <style>
    html, body {
        background-image: url("/images/contents/login.jpg");
        background-repeat:repeat;
        background-size:cover;
    }
  </style>
</head>
<body style="padding-top:30px;">

  <center> 
    <img src="/images/contents/logo.png" width="150px" height="150px" style="padding-bottom:30px;"> 
  </center>

  <center>
    <table width="100%" height="auto" border="0">
      <tr colspan="2">
        <font face="Agency FB">  
          <h1> 
              Choose Your Account Type
          </h1> 
        </font>
      </tr>
      <tr>
        <td>
          <center>
            <a href="{{route('shops.create')}}"> 
              <img src="/images/dashboard/shopregister.png" style="align:center; width:200px; height:200px;"> <br>              
            </a>
          </center>
        </td>
        
        <td>
          <center>
          <a href="{{route('customers.create')}}"> 
            <img src="/images/dashboard/customerregister.png" style="align:center; width:200px; height:200px;"> <br>            
          </a>
          </center>
        </td>
      </tr>
      <tr>
        <td width="100px">
          <center>
            <p>
              <b> Shop Account: </b> <br>
              &nbsp &nbsp &nbsp The shop account can do the selling the auction posts but can't do the bidding. <br>  
              But, the service charges for each transition will cost only 4% of the final price.
            </p>
          </center>
        </td>
        
        <td width="100px">
          <center>
            <p>
              <b> Customer Account: </b> <br>
              &nbsp &nbsp &nbsp The customer account can't do listing the auction. <br>  
              The account is only for bidding.
            </p>  
          </center>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>