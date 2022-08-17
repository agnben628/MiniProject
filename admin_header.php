<?php
   session_start();
   include_once "./config/dbconnect.php";
?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #e13f3f;">
    
    <a class="navbar-brand ml-5" href="admin_index.php">
    <h4 id="text" style="color: #080808"><strong><span>Bix</span>we</strong></h4>
    </a>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <a href="logout.php" style="text-decoration:none;"><ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="background-color: #e13f3f;"></ul></a>
    
    <div class="user-cart" style="background-color: #e13f3f;">  
        <?php           
        if(isset($_SESSION['email'])){
          ?>
          <a href="logout.php" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#080808;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a href="logout.php" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#080808;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
