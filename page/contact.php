
<div class="content contact-main">
			<!----start-contact---->
			<div class="contact-info">
					 <div class="wrap">
					 <div class="contact-grids"><br>
							 <div class="col_1_of_bottom span_1_of_first1">
								    <h5>Address</h5>
								    <ul class="list3">
										<li>
											<img src="page/web/images/home.png" alt="">
											<div class="extra-wrap">
											 <p>Jl. Sukasari - Bogor ,<br>Jawa Barat,.</p>
											</div>
										</li>
									</ul>
							    </div>
								<div class="col_1_of_bottom span_1_of_first1">
								    <h5>Phones</h5>
									<ul class="list3">
										<li>
											   <img src="page/web/images/phone.png" alt="">
											<div class="extra-wrap">
												<p><span>Telephone:</span> 0251 - 0000</p>
											</div>
												
										</li>
									</ul>
								</div>
								<div class="col_1_of_bottom span_1_of_first1">
									 <h5>Email</h5>
								    <ul class="list3">
										<li>
											<img src="page/web/images/email.png" alt="">
											<div class="extra-wrap">
											  <p><span class="mail"><a href="mailto:yoursite.com">info(at)spikeshoe.com</a></span></p>
											</div>
										</li>
									</ul>
							    </div>
								<div class="clear"></div>
					 </div>
					 	<form method="post">
					          <div class="contact-form">
								<div class="contact-to">
			                     	<input type="text" class="text" name="name" value="Name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name...';}">
								 	<input type="text" class="text" name="email" value="Email..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email...';}">
								 	<input type="text" class="text" name="subject" value="Subject..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject...';}">
								</div>
								<div class="text2">
				                   <textarea value="Message:" name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message..</textarea>
				                </div>
				               <span><input type="submit" class="" name="kirim" value="Kirim"></span>
				                <div class="clear"></div>
				               </div>
				           </form>
							</div>
			</div>
			<!----//End-contact---->
		</div>
		<?php
        	if(isset($_POST['kirim'])){
				
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$to=$email;

$message="From:$name <br />".$message;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: $email' . "\r\n";
$headers .= 'Cc: helmi.class@gmail.com' . "\r\n";
@mail($to,$subject,$message,$headers);
if(@mail)
{
echo "<script>aler('Email sent successfully !!');document.location.href='?menu=contact'</script>";	
}
			}
		?>