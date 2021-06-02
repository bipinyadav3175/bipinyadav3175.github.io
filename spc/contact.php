<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="./assets/favicon_io/site.webmanifest">
    
    <link rel="stylesheet" href="./css/global/style.css">
    <link rel="stylesheet" href="./css/contact/style.css">
    <title>Contact Us</title>
</head>
<body>

    <!-- Header Starts from Here -->
    <header class="outer_cont">
        <div class="nav_cont inner_cont">
            <div class="left_nav">
                <img src="./assets/strongpointlogo/strong-point-logo-cropped.png" alt="Strong Point">
                <h2><span>STRONG</span><br>POINT</h2>
            </div>

            <i class="fas fa-bars burger"></i>
            <div class="right_nav">
                <a href="./index.html" id="home">HOME</a>
                <a href="./services.html" id="services">SERVICES</a>
                <a href="./about.html" id="about">ABOUT US</a>
                <a href="./contact.php" id="contact">CONTACT US</a>
                <a href="./careers.html" id="careers">CAREERS</a>
            </div>
            
        </div>
    </header>
    <!-- Header Ends Here -->

    <!-- contact us main part -->
    <div class="contact_cont outer_cont">
        <div class="contact inner_cont">
            <div class="contact_left">
                <h3>Contact Us:</h3>
                <a href="mailto:info@strongpointconsulting.com">info@strongpointconsulting.com</a>

                <h3 class="m_top">Global Headquarters</h3>
                <p>3935 Highknob Circle,<br>
                    Naperville IL, 60564<br>
                    630-807-9565
                </p>

                <h3 class="m_top">India Headquarters</h3>
                <p>601 H1 Riddhi Gardens,<br>
                    Filimcity Road<br>
                    Malad East, Mumbai 400097
                </p>

                <h3 class="m_top">Follow Us: <a href="https://www.linkedin.com"><i class="fab fa-linkedin linkedin"></i></a> <a href="https://www.twitter.com"><i class="fab fa-twitter twitter"></i></a></h3>


            </div>
            
            <div class="contact_right">

                <form action="" method="post" autocomplete="off">
                    <h3>Let's Talk</h3>

                    <div class="danger" id="danger">
                        <!-- PHP Code -->
                        <?php
                    require './phpMailer/PHPMailerAutoload.php';

                    if(isset($_POST['submit'])){
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $email = $_POST['email'];
                        $msg = $_POST['msg'];

                        if(!empty($fname) || !empty($lname) || !empty($email) || !empty($msg)){

                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                ?>
                                <script>
                                    let danger = document.querySelector('#danger');
                                    danger.innerHTML = 'Please Enter a Valid Email!'
                                    danger.classList.add('danger_active');
                                    danger.classList.add('danger_bad');
                                </script>

                            <?php
                              }else{
                                $mail = new PHPMailer;
                                // Only for local host
                                $mail->isSMTP();
    
                                $mail->Host='smtp.gmail.com';
                                $mail->Port=587;
                                $mail->SMTPAuth=true;
                                $mail->SMTPSecure='tls';
                                $mail->Username='client.strongpoint@gmail.com';
                                $mail->Password='client@strongpoint00';
                                $mail->setFrom('client.strongpoint@gmail.com', "Client: $fname $lname");
                                $mail->addAddress('bipinyadav3175@gmail.com');
                                $mail->isHTML(true);
                                $mail->Subject="Message from $fname $lname";
                                $mail->Body="<h2>From: $fname $lname</h2><br><h2>Email: $email</h2><br><h2>Message:</h2><p>$msg</p>";
    
                                if(!$mail->send()){
                                    $response = 'Something Went Wrong!';
                                    ?>
                                        <script>
                                            let danger = document.querySelector('#danger');
                                            danger.innerHTML = 'Something Went Wrong!'
                                            danger.classList.add('danger_active');
                                            danger.classList.add('danger_bad');
                                        </script>
    
                                    <?php
                                }else{
                                    $response = 'Thank you for Contaction Us';
                                    $fname = '';
                                    $lname = '';
                                    $email = '';
                                    $msg = '';
                                    ?>
                                    <script>
                                        let form = document.querySelector('form');
                                        form.reset();
    
                                        let danger = document.querySelector('#danger');
                                        danger.innerHTML = 'Thank you for Contacting Us!'
                                        danger.classList.add('danger_active');
                                        danger.classList.add('danger_good');
                                    </script>
                                    <?php
                                }

                              }
                            

                        }

                        
                    }


                    ?>
                        <!-- Ending of PHP code -->
                    </div>

                    <div class="name_cont">
                        <div class="name_sub_cont fname_cont">

                            <label for="fname">First Name*</label>
                            <input type="text" name="fname" id="fname" required>
                        </div>

                        <div class="name_sub_cont lname_cont">

                            <label for="lname">Last Name*</label>
                            <input type="text" name="lname" id="lname" required>
                        </div>

                    </div>

                    <div class="email_cont">
                        <label for="email">Email*</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="message_cont">
                        <label for="msg">Message*</label>
                        <textarea name="msg" id="msg" cols="30" rows="10"  required></textarea>
                    </div>

                    <button type="submit" name="submit">Send</button>
                </form>

            </div>
        </div>
    </div>
    <!-- Contact us part ends here -->


    <!-- Footer Starts from Here -->
    <footer>
        <div class="footer_cont">

            <div class="footer_left">
                <img src="./assets/strongpointlogo/strong-point-logo-dark-cropped.png" alt="Strong Point">
                <a href="./contact.php"><button class="btn">Contact Us</button></a>
    
            </div>
    
            <div class="footer_right">
                <a href="./index.html" id="home">HOME</a>
                <a href="./services.html" id="services">SERVICES</a>
                <a href="./about.html" id="about">ABOUT US</a>
                <a href="./contact.php" id="contact">CONTACT US</a>
                <a href="./careers.html" id="careers">CAREERS</a>
            </div>
        </div>
        <div class="copyright">
            Copyright © 2021
        </div>
    </footer>
    <!-- Footer Ends Here -->
    





    <!-- Global JavaScript File -->
    <script src="./js/global.js"></script>
</body>
</html>