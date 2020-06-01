
<?php
include "includes/index_header.php";
?>

  <body>
    <!-- <div id="preloader">
      <div id="status"></div>
    </div> -->
   
    <header class="header_area" id="toph">
      <div class="main_menu">
          
          
          
          
 <?php include "includes/index_navigation.php";?>
        
        
        
      </div>
    </header>
  

    <div class="wt-haslayout wt-bannerholder">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="wt-bannerimages" >
              <figure class="wt-bannermanimg" data-tilt>
                <img src="img/edit1.png" alt="enveil your identity" />
                <img
                  src="img/img-02.png"
                  class="wt-bannermanimgone"
                  alt="enveil your identity"
                />
                <img
                  src="img/img-03.png"
                  class="wt-bannermanimgtwo"
                  alt="enveil your identity"
                />
              </figure>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="wt-bannercontent" 
            >
              <div class="wt-bannerhead">
                <div class="wt-title text-center">
                  <h1>
                  Hire expert freelancers for <br><span class="typed-words"></span> <br>on SkillCrux
                  </h1>
                </div>
                <div class="wt-description">
                  <p>
                    Our mission is to curate individual skills and
                    build a passive income stream bridging the gap between companies
                    and individuals.
                  </p>
                </div>
              </div>
              <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <a class="main_btn mr-10" data-target="#company" data-toggle="modal" href="#" data-tilt>You are a Company</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <a class="main_btn mr-10" href="#" data-target="#freelancer" data-toggle="modal" data-tilt>You are a Freelancer</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

<?php
    if(isset($_POST['register_company']))
    {
 
        $username=escape($_POST['username']);
        $company_fullname=escape($_POST['company_full_name']);
        $company_email=escape($_POST['company_email']);
        
        //email already exists
        $duplicate_email_query="SELECT * from skillcrux_companies WHERE company_email='$company_email' ";
        $duplicate_email=mysqli_query($connection,$duplicate_email_query);
        if(mysqli_num_rows($duplicate_email)>0)
        {
            echo "<script type='text/javascript'>alert('Email already registered.Please register with a different account')</script>";
        }
        else
        {
        $company_contact=escape($_POST['company_contact']);
        $company_country=escape($_POST['company_country']);
        $company_city=escape($_POST['company_city']);
        $company_website=escape($_POST['company_website']);
        $company_password=escape($_POST['company_password']);
        $company_services=escape($_POST['services']);
    $work_type=escape($_POST['work_type']);    
    

       $query="INSERT INTO skillcrux_companies(work_type,full_name,company_full_name,company_email,company_password,company_contact,company_country,company_city,company_website,company_services) ";
       $query.="VALUES('{$work_type}','{$username}','{$company_fullname}','{$company_email}','{$company_password}','{$company_contact}','{$company_country}','{$company_city}','{$company_website}','{$company_services}')";
             
      $create_post_query = mysqli_query($connection, $query);  
 if(!$create_post_query)
 {
      die("QUERY FAILED".mysqli_error($connection));
  }
  echo "<script type='text/javascript'>alert('Registration successfull!.Our Team will get in touch with you Soon..Now Login to your newly created Account')</script>";
    
    
    }
    }
    ?>


    <div id="company" class="modal fade" role="dialog">
      <div class="modal-dialog">
        
        <div class="modal-content">
          <div class="modal-body">
            <button data-dismiss="modal" class="close">&times;</button>
            <h4>Register as company</h4>
           <form action="" method="post" enctype="multipart/form-data">
                  <select class="form-control form-select" name="work_type" required>
                <option data-display="">Select Work Type</option>
             
                <option value="work_freelance">Hire a Freelancer</option>
                <option value="work_skillcrux">Get my work Done</option>
    
                </select>
              <input type="text" name="username" class="username form-control" placeholder="Fullname" pattern="([A-z\s]){4,}" title="Must be uppercase and lowercase and should be greater than 4" required autocomplete="off"/> 
              <input type="text" name="company_full_name" class="company form-control" placeholder="Company Name" pattern="([A-z0-9\s]){4,}" title="Must be uppercase and lowercase and should be greater than 4" required autocomplete="off"/>
              <input type="email" name="company_email" class="Email form-control" placeholder="Email address" required autocomplete="off"/>
              <input type="password" name="company_password" class="password form-control" placeholder="Create password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off"/>
              <input type="number" name="company_contact" class="contact form-control" placeholder="Contact No" required autocomplete="off"/>
              <input type="text" name="company_country" class="country form-control" placeholder="country" required autocomplete="off"/>
              <input type="text" name="company_city" class="city form-control" placeholder="city" required autocomplete="off"/>
              <input type="text" name="company_website" class="website form-control" placeholder="website(if any) " autocomplete="off"/>
              <select class="form-control form-select servicer" name="services" required>
                <option data-display="">Select Service</option>
               <?php 
        $query="SELECT * from skillcrux_services_list WHERE service_id <> 1";
                $run_query=mysqli_query($connection,$query);
                if(!$run_query)
                die("QUERY FAILED".mysqli_error($connection));
                while($row=mysqli_fetch_assoc($run_query))
                {
                    $service_name=$row['service_name'];
                ?>
                <option value="<?php echo $service_name;?>"><?php echo $service_name;?> </option>
                <?php } ?>
                </select>
             <input class="btn login" type="submit" value="Register Now" name="register_company"/></a>
            </form>
          </div>
        </div>
      </div>  
    </div>

  
   <div id="freelancer" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <?php
             if(isset($_POST['register']))
     {
         $email         = escape($_POST['email']);
         //email already exists
        $duplicate_email_member_query="SELECT * from skillcrux_freelancers WHERE member_email='$email' ";
        $duplicate_member_email=mysqli_query($connection,$duplicate_email_member_query);
        if(mysqli_num_rows($duplicate_member_email)>0)
        {
            echo "<script type='text/javascript'>alert('Email already registered.Please register with a different account')</script>";
        }
        else
        {
        $full_name        = escape($_POST['full_name']);//escaping the data
            $country         = escape($_POST['country']);
            $city  = escape($_POST['city']);
            $mobile_number       = escape($_POST['mobile_number']);
    $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
            $email         = escape($_POST['email']);
            $password=escape($_POST['password']);
            $skill      = escape($_POST['skill']);
            $about=escape($_POST['about']);
            $status         =escape($_POST['status']);
$availability=escape($_POST['availability']);


 move_uploaded_file($post_image_temp, "freelancers_cv/$post_image" );
 $post_image=escape($post_image);
      $query = "INSERT INTO skillcrux_freelancers(member_fullname,member_country,member_city,member_mobile_number,member_email,member_password,member_skill,member_status,member_availability,member_start_date,member_cv,member_about) ";

             
      $query .= "VALUES('{$full_name}','{$country}','{$city}',$mobile_number,'{$email}','{$password}','{$skill}','{$status}','{$availability}','{$start_date}','{$post_image}','{$about}') "; 
             
      $create_post_query = mysqli_query($connection, $query);  
  confirmQuery($create_post_query);
  
    echo "<script type='text/javascript'>alert('Registration successfull!.Now Login to your newly created Account')</script>";
   
  echo "You have successfully registered";
     }
     }
        ?>
        <div class="modal-content">
          <div class="modal-body">
            <button data-dismiss="modal" class="close">&times;</button>
            <h4>Register as Freelancer</h4>
            <form id="regForm" method="post" action="" enctype="multipart/form-data"> 
              <select class="form-control form-select servicer" name="skill">
                <option data-display="">Select Your activity area</option>
                <?php 
                $query="SELECT * from skillcrux_services_list WHERE service_id <> 1";
                $run_query=mysqli_query($connection,$query);
                if(!$run_query)
                die("QUERY FAILED".mysqli_error($connection));
                while($row=mysqli_fetch_assoc($run_query))
                {
                    $service_name=$row['service_name'];
                ?>
                <option value="<?php echo $service_name;?>"><?php echo $service_name;?> </option>
                <?php } ?>
                </select>
                <select class="form-control form-select servicer" name="status">
                  <option data-display="">Select Your Status</option>
                  <option value="Independent">Independent</option>
                  <option value="Student">Student</option>
                  <option value="Employee">Employee</option>
                </select>
                <select class="form-control form-select servicer" id="next" name="availability">
                    <option data-display="">Your Availability</option>
                    <option value="immediately">Available Immediately</option>
                    <option value="not">Not Available Immediately</option>
                  </select>
                  <div id="no">
                      <p>Please select "Available Immediately".You can update it afterwards in the Profile section</p>
                    <!--<label for="date" style="color: #fff; font-size: 18px;">Approx avilability Tenure</label>-->
                    <!--<input class="form-control form-select available" name="start_date" type="date" placeholder="Approx availability Tenure"/>-->
                  
                   <!--<a href="upload.php" class="next_btn" name="register">Next</a>-->
                <!--<a href="upload.php"><input type="submit" class="next_btn" value="Next" name="register"></a>-->
                    <!--<input type="submit" class="next_btn" value="Next" name="register">-->
                  </div>
                  <div id="yes">
                    
                    <!--<input type="number" class="contact form-control" name="rate" placeholder="Average daily Rate"/>-->
                    <input type="text" name="full_name" class="username form-control" placeholder="Fullname" pattern="([A-z\s]){4,}" title="Must be uppercase and lowercase and should be greater than 4" required autocomplete="off"/>
                    <!--<input type="text" name="" class="company form-control" placeholder="Company Name"/>-->
                    <input type="email" name="email" class="Email form-control" placeholder="Email address"/>
                    <input type="password" name="password" class="password form-control" placeholder="Create password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off"/>
                    <input type="number" name="mobile_number" class="contact form-control" placeholder="Contact No" required/>
                    <input type="text" name="country" class="country form-control" placeholder="country"/>
                    <input type="text" name="city" class="city form-control" placeholder="city "/>
                     <label for="post_image" style="color:white; font-size:16px;">Upload Your CV below</label>
          <input type="file" name="image" class="form-control">
          <label for="post_image" style="color:white; font-size:16px;">About Me</label>
          <textarea class="form-control" rows="10" cols="10" name="about"></textarea>
                   <!--<a href="upload.php" class="next_btn" name="register">Next</a>-->
                <!--<a href="upload.php"><input type="submit" class="next_btn" value="Next" name="register"></a>-->
                    <input type="submit" class="next_btn" value="Next" name="register">
                  </div>
                
              
            </form>
          </div>
        </div>
      </div>  
    </div>



 <div id="login_as_freelancer" class="modal fade" role="dialog">
      <div class="modal-dialog">
        
        <div class="modal-content">
          <div class="modal-body">
            <button data-dismiss="modal" class="close">&times;</button>
            <h4>Login As Freelancer</h4>
            <form action="includes/login_as_freelancer.php" method="post">
              <input type="email" name="member_email" class="username form-control" placeholder="Enter Email"/>
              <input type="password" name="member_password" class="password form-control" placeholder="Enter Password"/>
              <input class="btn login" type="submit" value="Login" name="login_as_freelancer" />
            </form>
          </div>
        </div>
      </div>  
    </div>
    
      <div id="login_as_company" class="modal fade" role="dialog">
      <div class="modal-dialog">
        
        <div class="modal-content">
          <div class="modal-body">
            <button data-dismiss="modal" class="close">&times;</button>
            <h4>Login As Company</h4>
    
            <form action="includes/login_as_company.php" method="post">
              <input type="email" name="company_email" class="username form-control" placeholder="Enter Email"/>
              <input type="password" name="company_password" class="password form-control" placeholder="Enter Password"/>
              <input class="btn login" type="submit" value="Login" name="login_as_company"/>
            </form>
          </div>
        </div>
      </div>  
    </div>



    


    <main id="wt-main" class="wt-main wt-haslayout">

      <!--Categories Start-->

      <section class="about_us" id="about" >
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
              <div class="wt-sectionhead wt-textcenter">
                <div class="wt-sectiontitle">
                  <h2>About Us</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 pr-0">
            <iframe width="560" height="315" src="//www.youtube.com/embed/hfsK-UXrgc4" poster="img/reveal skillcrux (1).png" frameborder="0" allowfullscreen></iframe>
<a href=" https://youtu.be/hfsK-UXrgc4"></a>
            </div>
  
            <div class="col-lg-6 pl-0">
              <div class="about_box">
              
                  <p>
            A platform to bring the best out of an individual, developing new skills and helping startups, small businesses to grow digitally. We individuals to build meaningful relationships with the companies that matter the most.
                  </p>
          
                </div>
                </div>
                </div>
                </div>
              </div>
      </section>
      <!-- <section class="wt-main-section" id="about">
        <div class="container">
        <div class="hero">
          <div class="hc">
            <h1>Why startups/businessess should choose us?</h1>
            <p>
              We have the bright minds of lancers all around from different colleges, institutes and even experienced employees who are best at their job. Experienced, masters of their crafts professionals are here to work upon your worries and deliver. You have come to the right place..
            </p>
            <a data-target="#company" data-toggle="modal" href="#" data-tilt class="hbtn">Register Now</a>
            </div>
          </div>
        </div>
      </section> -->
      <section class="wt-main-section">
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
              <div class="wt-sectionhead wt-textcenter">
                <div class="wt-sectiontitle" >
                  <h4>Why startups/businessess should choose us? </h4>
                </div>
              </div>
            </div>
          </div>
          <div class="freeadd">
            <div class="row align-items-center">
            
                <div class="col-md-6 col-sm-6" >
                  <p> We have the bright minds of lancers all around from different colleges, institutes and even experienced employees who are best at their job. Experienced, masters of their crafts professionals are here to work upon your worries and deliver. You have come to the right place..</p>
                </div>
                <div class="col-md-6 col-sm-6">
               
                    <div class="dode3">
                      <img src="https://www.arcvisionstudio.com/images/whyus.png" alt="handshake" width="480" height="311" />
                    </div>
                 
                </div>
              </div>
            </div>
            </div>
      </section>
      <section class="wt-main-section">
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
              <div class="wt-sectionhead wt-textcenter">
                <div class="wt-sectiontitle" >
                  <h4>Why freelancer sholuld choose us? </h4>
                </div>
              </div>
            </div>
          </div>
          <div class="freeadd">
            <div class="row align-items-center">
            
                <div class="col-md-6 col-sm-6" >
                  <p>We are a team of highly skilled graduates & experts in the field of our respective domains comprising of Developer, Marketing Expert, Graphic designers, programmers/coders, mobile app developers, and e-marketing heads. We imply serving the companies with sheer will and dedication with the goal of creating, innovating and customizing the digital solutions.</p>
                </div>
                <div class="col-md-6 col-sm-6">
               
                    <div class="dode3">
                      <img src="img/skcrux.jpg" alt="handshake" width="480" height="311" />
                    </div>
                 
                </div>
              </div>
            </div>
            </div>
      </section>
    <style>
      .dode3
{
  position: relative;
	float: right;
	overflow: hidden;
	margin: 10px 1%;
	min-width: 320px;
	max-width: 480px;
	max-height: 360px;
	width: 48%;
}


.dode3 img {
	position: relative;
	display: block;
	min-height: 100%;
	max-width: 100%;
	opacity: 0.8;
}
      </style>
<section id="service" class="service">
  <div class="containerr">
    <div class="row justify-content-md-center">
      <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
        <div class="wt-sectionhead wt-textcenter">
          <div class="wt-sectiontitle">
            <h2>Our Services </h2>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-3 col-md-3">
        <div class="box"  >
        <div class="service-content text-center" >

          <span class="service-icon">
            <img src="img/icons/graphic design.png" alt="Graphic Design">
          </span>
          <h3>Graphic Design</h3>
				<p>Create graphics that align with your thinking according to your
          requirements. Graphics is an essential need that fetches high engagements. We have
          professionals who are experts in their domain.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="box" >
      <div class="service-content text-center">

        <span class="service-icon">
          <img src="img/icons/web dev.png" alt="Web Development">
        </span>
        <h3>Web Development</h3>
       <p> The Digital team comprises skilled, professional, and
        experienced experts who are handy at building a responsive website to make your
        business go live.</p>
      </div>
    </div>
  </div>
  <div class="col-sm-3 col-md-3">
    <div class="box"  >
    <div class="service-content text-center">

      <span class="service-icon">
        <img src="img/icons/app dev.png" alt="App Development">
      </span>
      <h3>App Development</h3>
     <p> An App just completes your package of taking your business
      online. Mobile users are equally as important as your web users.</p>
    </div>
  </div>
</div>
<div class="col-sm-3 col-md-3">
  <div class="box" >
  <div class="service-content text-center">

    <span class="service-icon">
      <img src="img/icons/ui_ux.png" alt="">
    </span>
    <h3>UI/UX Design</h3>
   <p> User Experience and User Interface are crucial to any products to contain
    your audience and attract more of them. We are here with some of the highly
    experienced and skilled designers who best in it.</p>
  </div>
</div>
</div>
  </div>
  <div class="row">
    <div class="col-sm-3 col-md-3">
      <div class="box" >
      <div class="service-content text-center">

        <span class="service-icon">
          <img src="img/icons/content.png" alt="Content Writing">
        </span>
        <h3>Content Writing</h3>
     <P>Looking for high engagements and responses from a truly untapped
      audience through your writing. We will help you get the best writeups to get more
      engagements.</P>
      </div>
    </div>
  </div>

  <div class="col-sm-3 col-md-3">
    <div class="box" >
    <div class="service-content text-center">

      <span class="service-icon">
        <img src="img/icons/data analytics.png" alt="Data Analytics">
      </span>
      <h3>Data Analytics</h3>
   <P>Data analytics is the science of analyzing raw data in order to make conclusions about that information. Give the data, we will find a new way for your buisness.</P>
    </div>
  </div>
</div>

<div class="col-sm-3 col-md-3">
  <div class="box" >
  <div class="service-content text-center">

    <span class="service-icon">
      <img src="img/icons/video editing.png"  alt="Video Editing">
    </span>
    <h3>Video Editing</h3>
 <P>Videos are an essential and most influential way for marketing, takes
  few seconds to covert a potential client. All you need is a skillfully curated video.</P>
  </div>
</div>
</div>

<div class="col-sm-3 col-md-3">
  <div class="box" >
  <div class="service-content text-center">

    <span class="service-icon">
      <img src="img/icons/marketing solutions.png" alt="SEO">
    </span>
    <h3>SEO/ Email Marketing</h3>
 <P>Optimizing your website to get organic, or un-paid, traffic from the search
  engine results page by our experienced team.<br>
Increase your customer base by email marketing and reaching out to some of the
untapped customers through this mode.</P>
  </div>
</div>
</div>
  </div>
  </div>
</section>
<section class="Client" id="client">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
        <div class="wt-sectionhead wt-textcenter">
          <div class="wt-sectiontitle" >
            <h2 style="font-size:28px;">Companies for whom we have worked</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="rowk justify-content-md-center">
<div class="colk">
<div class="brands_item">
<img src="img/Formskart (2).png" height="150" width="200" alt="Formskart"/>
</div>
</div>
<div class="colk">
<div class="brands_item">
<img src="img/Kathys Vegan Kitchen.jfif" height="150" width="200" alt="Formskart"/>
</div>
</div>
<div class="colk">
<div class="brands_item">
<img src="img/Roku Tv Activation.jpeg" height="150" width="200" alt="Formskart"/>
</div>
</div>
<div class="colk">
<div class="brands_item">
<img src="img/Alice Car Rental (2).png" height="150" width="200" alt="Formskart"/>
</div>
</div>
<div class="colk">
<div class="brands_item">
<img src="img/labgo jobs logo.png" height="200" width="200" alt="Formskart"/>
</div>
</div>
    </div>
</section>
<br><br>
 <section class="team" id="team">
   <div class="containerr">
    <div class="row justify-content-md-center">
      <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
        <div class="wt-sectionhead wt-textcenter">
          <div class="wt-sectiontitle">
            <h2>Meet Our Team</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    
    <div class="col-sm-3 col-md-3">
      <div class="pcard">
  <div class="avatar">
    <img src="pages/img/Devaker Sahu (Founder)(CEO).jpg">
  </div>
  <div class="ptitle">
    <h2>Devaker Sahu</h2>
    <h4>Founder & CEO </h4>
  </div>

</div>
      </div>



      <div class="col-sm-3 col-md-3">
      <div class="pcard">
  <div class="avatar">
    <img src="pages/img/Aditya Prajapati (Co-Founder) (COO).jpeg"  alt= "Aditya Prajapati">
  </div>
  <div class="ptitle">
    <h2>Aditya Prajapati</h2>
    <h4>Co-Founder and COO  </h4>
  </div>

</div>
      </div>



      <div class="col-sm-3 col-md-3">
      <div class="pcard">
  <div class="avatar">
    <img src="pages/img/Navonaya Brahmachari (HR Manager).jpeg"  alt= "Navonaya Brahmachari"/>
  </div>
  <div class="ptitle">
    <h2 style="font-size:22px;">Navonaya Brahmachari</h2>
    <h4>HR Manager </h4>
  </div>

</div>
      </div>



      <div class="col-sm-3 col-md-3">
      <div class="pcard">
  <div class="avatar">
    <img src="pages/img/profile.jpg"  alt= "Rishi Raj"/>
  </div>
  <div class="ptitle">
    <h2>Rishi Raj</h2>
    <h4> Chief Technical Officer (CTO)</h4>
  </div>

 
</div>
      </div>

    </div>

    

    <div class="row">
    
    <div class="col-sm-3 col-md-3">
      <div class="pcard">
  <div class="avatar">
    <img src="pages/img/my pic.jpg"  alt= "Kousik Sen"/>
  </div>
  <div class="ptitle">
    <h2>Kousik Sen</h2>
    <h4>Associate Technical Officer (ATO) </h4>
  </div>

</div>
      </div>



      <div class="col-sm-3 col-md-3">
      <div class="pcard">
  <div class="avatar">
    <img src="pages/img/Moinak Bose -Chief Content Officer.jpeg"  alt= "Moinak Bose"/>
  </div>
  <div class="ptitle">
    <h2>Moinak Bose</h2>
    <h4>Chief Content Officer</h4>
  </div>

</div>
      </div>



      <div class="col-sm-3 col-md-3">
      <div class="pcard">
  <div class="avatar">
    <img src="pages/img/team_banner.jpg"  alt= "Antariksh Kumar"/>
  </div>
  <div class="ptitle">
    <h2>Antariksh Kumar</h2>
    <h4>Chief Creative Officer (CCO) </h4>
  </div>

</div>
      </div>



      <div class="col-sm-3 col-md-3">
      <div class="pcard">
  <div class="avatar">
    <img src="pages/img/Karan Sinha (Business Administrative Officer).jpeg"  alt= "Karan Sinha"/>
  </div>
  <div class="ptitle">
    <h2>Karan Sinha</h2>
    <h4> Business Admininstrative Officer (BAO)</h4>
  </div>

 
</div>
      </div>

    </div>
</div>
</section> 
<style>
.pcard {
  border: 2px solid #17a589;
  box-shadow: 5px 6px 0px #17a589;
  transition: 0.3s all;
  border-radius: 3px;
  background-color: #fff;
  margin-top:20px;
  margin-bottom:30px;
  padding: 18px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
  width: 280px;
  
}
.pcard .avatar img {
  
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
  border: 4px solid #17a589;
}
.pcard .ptitle h2 {
  font-size: 26px;
  margin-top: 18px;
  color: #17a589;
}
.pcard .ptitle h4 {
  font-size: 20px;
  margin-top: 10px;
  color: 	#2F4F4F;
}
.pcard .description {
  font-size: 17px;
  margin-top: 18px;
  color: #64707d;
}
.pcard .social ul {
  margin-top: 22px;
  list-style-type: none;
}
.pcard .social ul li {
  display: inline;
  font-size: 22px;
  cursor: pointer;
  color: #17a589;
}
</style>
<section class="contact" id="contact">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
        <div class="wt-sectionhead wt-textcenter">
          <div class="wt-sectiontitle" >
            <h2>Get in Touch</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3">
        <div class="contact_info">
          <div class="info_item">
            <i class="lnr lnr-home"></i>
            <h6>KIIT UNIVERSITY</h6>
            <p>BHUBANESWAR, ODISHA</p>
          </div>
          <div class="info_item">
            <i class="lnr lnr-phone-handset"></i>
            <h6>
              <a href="tel: +917572060647">Devaker Sahu (CEO)- +917572060647</a>
            </h6>
          </div>
          <div class="info_item">
            <i class="lnr lnr-envelope"></i>
            <h6>
              <a href="#">support@skillcrux.com</a>
            </h6>
            <p>Send us your query anytime!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
          
         <?php
         
         if(isset($_POST['query_submit']))
         {
         $query_name=escape($_POST['query_name']);
         $query_email=escape($_POST['query_email']);
         $query_subject=escape($_POST['query_subject']);
         $query_message=escape($_POST['query_message']);
         $query="INSERT INTO visitor_queries(query_name,query_email,query_subject,query_message) VALUES('$query_name','$query_email','$query_subject','$query_message') ";
         $run_query=mysqli_query($connection,$query);
         if(!$run_query)
         die("QUERY FAILED".mysqli_error($connection));
         
          echo "<script type='text/javascript'>alert('Query Submitted Successfully!.Our Team will get back to you soon..')</script>";
         }
         ?>
        <form
          class="row contact_form"
          action=""
          method="post"
          id="contactForm"
          novalidate="novalidate"
        >
          <div class="col-md-6">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="name"
                name="query_name"
                placeholder="Enter your name"
              />
            </div>
            <div class="form-group">
              <input
                type="email"
                class="form-control"
                id="email"
                name="query_email"
                placeholder="Enter email address"
              />
            </div>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="subject"
                name="query_subject"
                placeholder="Enter Subject"
              />
            </div>
          </div>
          <div class="col-md-6" >
            <div class="form-group">
              <textarea
                class="form-control"
                name="query_message"
                id="message"
                rows="1"
                placeholder="Enter Message"
              ></textarea>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" value="submit" class="btn submit_btn" name="query_submit">
              Send Message
            </button>
          </div>
        </form>
      
      </div>
    </div>
  </div>

</section>

      </main>
       
      <!--================ start footer Area =================-->
     <?php include "includes/index_footer.php";?>