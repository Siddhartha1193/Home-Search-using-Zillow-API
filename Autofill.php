<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
         <html>
       <head>
       <style type="text/css">
               body {
                       font-family: sans-serif;
                       font-size: 14px;
               }
       </style>
       <title>Google Maps JavaScript API v3 Example: Places Autocomplete</title>
       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8ogXHuFBN4VAYAnxcovphCywRPqWdzsk&libraries=places&callback=initialize"
        async defer></script>
        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('searchTextField');
                       var autocomplete = new google.maps.places.Autocomplete(input);
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>
       </head>
           <body>
               <div>
                       <input id="searchTextField" type="text" size="50" placeholder="Enter a location" autocomplete="on">
               </div>
               <?php
        // put your code here
        ?>
           </body>
       </html>
        
        
        
        
        
        
        
        
        
        
        
   
