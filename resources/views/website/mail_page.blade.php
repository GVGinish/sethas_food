<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Order Confirmation</title>
      <style>
         /* Reset styles */
         body, html {
         margin: 0;
         padding: 0;
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         line-height: 1.6;
         background-color: #f4f4f4;
         }
         table {
         width: 100%;
         max-width: 600px;
         margin: 0 auto;
         background-color: #ffffff;
         border-radius: 8px;
         border-collapse: collapse;
         }
         th, td {
         padding: 15px;
         text-align: left;
         border-bottom: 1px solid #dddddd;
         }
         th {
         background-color: #f2f2f2;
         color: #333333;
         }
         td {
         color: #666666;
         }
         .header {
         background-color: #4caf50;
         color: #ffffff;
         text-align: center;
         padding: 20px 0;
         border-top-left-radius: 8px;
         border-top-right-radius: 8px;
         }
         .content {
         padding: 20px;
         }
         .footer {
         text-align: center;
         padding: 10px;
         border-bottom-left-radius: 8px;
         border-bottom-right-radius: 8px;
         background-color: #f2f2f2;
         font-size: 12px;
         color: #888888;
         }
         .logo {
         text-align: left;
         padding: 10px 15px;
         }
         .message {
         font-size: 14px;
         color: #333333;
         padding: 10px 15px;
         width: 50%;
         }
         .invoice {
         font-size: 14px;
         color: #333333;
         text-align: right;
         padding: 10px 15px;
         width: 50%;
         }
         .invoice p {
         margin: 5px 0; /* Adjust margin for spacing */
         }
         @media screen and (max-width: 600px) {
         .message, .invoice {
         width: 100%;
         }
         .header {
         padding: 15px 0;
         }
         .logo {
         text-align: center; /* Center the logo on small screens */
         }
         }
      </style>
   </head>
   <body>
      <table>
         <thead>
            <tr class="header">
               <th colspan="2">
                  <h2>Forgot Password Mail</h2>
               </th>
            </tr>
         </thead>
         <tbody>
            <tr class="logo">
               <td colspan="2" style="text-align: left;">
                  <img src="{{ asset('user_asset/images/vegetable/veg-logo.png')}}" alt="Logo">
               </td>
            </tr>
            <tr>
               <td colspan="2">
                  <div class="con"style="display: flex;
                     justify-content: space-between;">
                     <div class="">
                        <h5>Hey  {{$username}},</h5>
                        <p>To reset your password, click the link below.</p>
                        <a href={{$link}}>{{$link}}</a>
                     </div>
                     
                  </div>
               </td>
            </tr>
          
           
            
            <tr class="footer">
               <td colspan="2">
                  <p>
                     &copy; <script>document.write(new Date().getFullYear())</script> Seeths Foods. Developed by Relaxplzz Technologies
                  </p>
               </td>
            </tr>
         </tbody>
      </table>
   </body>
</html>