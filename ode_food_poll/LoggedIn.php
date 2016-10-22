<?php
    
     include 'EpiCurl.php';
     include 'EpiOAuth.php';
     include 'EpiTwitter.php';
     include 'keys.php';

     $Twitter = new EpiTwitter($consumerKey, $consumerSecret);
     
    if(empty($_SESSION['TwitterUsername']))
   {
       header("Location: keys.php");
   }
  
     echo '<a id="twittersbtnsignin" href="' . $Twitter->getAuthenticateUrl() . '">
     <img src="twitterlogin.png" alt="sign in with twitter" />
     </a>';
    
    echo "<link rel='stylesheet' type='text/css' href='stylesheet.css' />"; 
     echo "<div id='upper-div'><h1 id='upper-div-title'>Ode-Food-Poll</h1></div>";
     echo "<div id='main-div'><div id='main-div-title'><span id='main-title-span'>Ode's Food Poll</span><span id='main-descrpt-span'>Below are polls hosted by Ode<br>Select a poll to see the results and vote, or sign-in to make a new poll.</span></div>
     <div id='central-div'>
       <div id='div-1' class='ingre-type'><span class='ingre-name'>Meat</span></div>
       <div id='div-2' class='ingredients'><span class='ingre-name'>Steak</span></div>
       <div id='div-3' class='ingredients'><span class='ingre-name'>Fish</span></div>
       <div id='div-4' class='ingredients'><span class='ingre-name'>Lamb</span></div>
       <div id='div-5' class='ingredients'><span class='ingre-name'>Chicken</span></div>
       <div id='div-6' class='ingredients'><span class='ingre-name'>Pork</span></div>
       <div id='div-7' class='ingredients'><span class='ingre-name'>Shrimp</span></div>
       <div id='div-8' class='ingredients'><span class='ingre-name'>Crab</span></div>
       <div id='div-9' class='ingredients'><span class='ingre-name'>Shell Fish</span></div>
       <div id='div-10' class='ingre-type'><span class='ingre-name'>Vegetable</span></div>
       <div id='div-11' class='ingredients'><span class='ingre-name'>Union</span></div>
       <div id='div-12' class='ingredients'><span class='ingre-name'>Eggplant</span></div>
       <div id='div-13' class='ingredients'><span class='ingre-name'>Lettuce</span></div>
       <div id='div-14' class='ingredients'><span class='ingre-name'>Turnip</span></div>
       <div id='div-15' class='ingredients'><span class='ingre-name'>Spinach</span></div>
       <div id='div-16' class='ingredients'><span class='ingre-name'>Tomato</span></div>
       <div id='div-17' class='ingredients'><span class='ingre-name'>Potato</span></div>
       <div id='div-18' class='ingredients'><span class='ingre-name'>Radish</span></div>
       <div id='div-19' class='ingredients'><span class='ingre-name'>Mushroom</span></div>
       <div id='div-20' class='ingredients'><span class='ingre-name'>Kaffir Leaves</span></div>
       <div id='div-21' class='ingredients'><span class='ingre-name'>Gourd</span></div>
       <div id='div-22' class='ingredients'><span class='ingre-name'>Spring Union</span></div>
       <div id='div-23' class='ingredients'><span class='ingre-name'>Chili</span></div>
       <div id='div-24' class='ingredients'><span class='ingre-name'>Chili Pepper</span></div>
       <div id='div-25' class='ingredients'><span class='ingre-name'>Jalapeno</span></div>
       <div id='div-26' class='ingredients'><span class='ingre-name'>Sweet Potato</span></div>
       <div id='div-27' class='ingredients'><span class='ingre-name'>Yam</span></div>
       <div id='div-28' class='ingredients'><span class='ingre-name'>Garlic</span></div>
       <div id='div-29' class='ingredients'><span class='ingre-name'>Zucchini</span></div>
       <div id='div-30' class='ingredients'><span class='ingre-name'>Cucumber</span></div>
       <div id='div-31' class='ingredients'><span class='ingre-name'>Green Peas</span></div>
       <div id='div-32' class='ingredients'><span class='ingre-name'>Leek</span></div>
       <div id='div-33' class='ingredients'><span class='ingre-name'>Corn</span></div>
       <div id='div-34' class='ingredients'><span class='ingre-name'>Celery</span></div>
       <div id='div-35' class='ingredients'><span class='ingre-name'>Carrot</span></div>
       <div id='div-36' class='ingredients'><span class='ingre-name'>Cauliflower</span></div>
       <div id='div-37' class='ingredients'><span class='ingre-name'>Shiitake Mushroom</span></div>
       <div id='div-38' class='ingredients'><span class='ingre-name'>Cabbage</span></div>
       <div id='div-39' class='ingredients'><span class='ingre-name'>Bamboo Shoot</span></div>
       <div id='div-40' class='ingredients'><span class='ingre-name'>Lotus Root</span></div>
       <div id='div-41' class='ingredients'><span class='ingre-name'>Ginger</span></div>
       <div id='div-42' class='ingredients'><span class='ingre-name'>Asparagus</span></div>
       <div id='div-43' class='ingredients'><span class='ingre-name'>Artichoke</span></div>
       <div id='div-44' class='ingredients'><span class='ingre-name'>Baby Corn</span></div>
       <div id='div-45' class='ingredients'><span class='ingre-name'>Avocado</span></div>
       <div id='div-46' class='ingredients'><span class='ingre-name'>Bean</span></div>
       <div id='div-47' class='ingredients'><span class='ingre-name'>Beetroot</span></div>
       <div id='div-48' class='ingre-type'><span class='ingre-name'>Drink</span></div>
       <div id='div-49' class='ingredients'><span class='ingre-name'>Tea</span></div>
       <div id='div-50' class='ingredients'><span class='ingre-name'>Coffee</span></div>
       <div id='div-51' class='ingredients'><span class='ingre-name'>Milk</span></div>
       <div id='div-52' class='ingre-type'><span class='ingre-name'>Fruit</span></div>
       <div id='div-53' class='ingredients'><span class='ingre-name'>Grape</span></div>
       <div id='div-54' class='ingredients'><span class='ingre-name'>Apricot</span></div>
       <div id='div-55' class='ingredients'><span class='ingre-name'>Cherry</span></div>
       <div id='div-56' class='ingredients'><span class='ingre-name'>Loquat</span></div>
       <div id='div-57' class='ingredients'><span class='ingre-name'>Kiwifruit</span></div>
       <div id='div-58' class='ingredients'><span class='ingre-name'>Peach</span></div>
       <div id='div-59' class='ingredients'><span class='ingre-name'>Pear</span></div>
       <div id='div-60' class='ingredients'><span class='ingre-name'>Jujube</span></div>
       <div id='div-61' class='ingredients'><span class='ingre-name'>Coconut</span></div>
       <div id='div-62' class='ingredients'><span class='ingre-name'>Rasberry</span></div>
       <div id='div-63' class='ingredients'><span class='ingre-name'>Persimmon</span></div>
       <div id='div-64' class='ingredients'><span class='ingre-name'>Plum</span></div>
       <div id='div-65' class='ingredients'><span class='ingre-name'>Jackfruit</span></div>
       <div id='div-66' class='ingredients'><span class='ingre-name'>Cranberry</span></div>
       <div id='div-67' class='ingredients'><span class='ingre-name'>Durian</span></div>
       <div id='div-68' class='ingredients'><span class='ingre-name'>Lychee</span></div>
       <div id='div-69' class='ingredients'><span class='ingre-name'>Pineapple</span></div>
       <div id='div-70' class='ingredients'><span class='ingre-name'>Rambutan</span></div>
       <div id='div-71' class='ingredients'><span class='ingre-name'>Mango</span></div>
       <div id='div-72' class='ingredients'><span class='ingre-name'>Watermelon</span></div>
       <div id='div-73' class='ingredients'><span class='ingre-name'>Fig</span></div>
       <div id='div-74' class='ingredients'><span class='ingre-name'>Grapefruit</span></div>
       <div id='div-75' class='ingredients'><span class='ingre-name'>Guava</span></div>
       <div id='div-76' class='ingredients'><span class='ingre-name'>Dragonfruit</span></div>
       <div id='div-77' class='ingredients'><span class='ingre-name'>Olive</span></div>
       <div id='div-78' class='ingredients'><span class='ingre-name'>Miracle Fruit</span></div>
       <div id='div-79' class='ingredients'><span class='ingre-name'>Blackberry</span></div>
       <div id='div-80' class='ingredients'><span class='ingre-name'>Lime</span></div>
       <div id='div-81' class='ingredients'><span class='ingre-name'>Orange</span></div>
       <div id='div-82' class='ingredients'><span class='ingre-name'>Kumquat</span></div>
       <div id='div-83' class='ingredients'><span class='ingre-name'>Strawberry</span></div>
       <div id='div-84' class='ingredients'><span class='ingre-name'>Star Fruit</span></div>
       <div id='div-85' class='ingredients'><span class='ingre-name'>Mulberry</span></div>
       <div id='div-86' class='ingredients'><span class='ingre-name'>Huckleberry</span></div>
       <div id='div-87' class='ingredients'><span class='ingre-name'>Gooseberry</span></div>
       <div id='div-88' class='ingredients'><span class='ingre-name'>Apple</span></div>
     </div>
     </div>";


?>