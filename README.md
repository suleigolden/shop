<h1>Shop</h1>
<h4>A web application with PHP which works like a small online shop.</h4>
 <hr>
<h1>Installing / Deployment</h1>

<p>You need to have XAMPP with PHP 7.0 or Higher if you want to deploy it in your local host</p>
<li>Import the shop.sql Databese into your server</li>
<li>Create a foulder inside your local (xamp htdocs) directory and name it shop and extract the project inside.</li>
<p>NOTE:you can change the database name to what ever you want or you can just import all the table to your database from the shop.sql file.
</p>
<hr>

<h1>Configuration Details</h1>
<p>The Shop Applicatio was develop using a simple customize MVC framework developed with PHP.
  Apart from the images, javascript and css folder, the MVC contains three 
  main folders (Controller, model and view) and a index.php file that send a
  request to pagesController. The controller folder contain four files (pagesController.php,productController.php, userAuthentication.php and passwordEncryptController ). 
  <li>The pagesController handle the Navigation (raute) 
  between all the pages.</li>
  <li>The productController handle all the requests between the user (Ajax function) and the model.<li>
  <li>userAuthentication check if the user is valid or log out </li>
  <li>The passwordEncryptController Encrypt the user passpord.</li>
   </p>

   <h1>Test</h1>

   <p>
     <a href="https://thelastcodebender.com/shop/">Click to see Life Demo or copy and paste the link in you url press enter   https://thelastcodebender.com/shop/</a>

   </p>