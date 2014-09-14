	<section class="contacts">
        <div class="container">

            <header class="headline">
                <h2><?php echo $texts['contact']; ?></h2>
            </header>

            <div class="contactsBlock contactsSocial">
                <p class="contactUs"><?php echo $texts['contact_text']; ?>
                </p>
                <div class="contactsSocial">
                    <div class="contactsSocial-link">
                        <div class="icon">
                        <a href="http://www.facebook.com/ETHNOCASE" target="blank">
                            <i class="fa fa-facebook-square fa-2x"></i>
                        </a>
                        </div>
                        <p class="contact-meta">Facebook</p>
                    </div>
                    <!-- <div class="col-sm-3">
                        <div class="icon">
                            <i class="fa fa-map-marker fa-2x"></i>
                        </div>
                        <p class="contact-meta">Київ, <br> Україна</p>
                    </div> -->
                    <div class="contactsSocial-link">
                        <div class="icon">
                        	<a href="mailto:sales@ethnocase.com">
	                            <i class="fa fa-envelope fa-2x"></i>
                        	</a>
                        </div>
                        <p class="contact-meta"> sales@ethnocase.com </p>
                    </div>
                    <div class="contactsSocial-link">
                        <div class="icon">
                        	<a href="tel:3-8097-438-75-84" data-rel="external">
	                            <i class="fa fa-phone fa-2x"></i>
                        	</a>
                        </div>
                        <p class="contact-meta">(097)438-75-84</p>
                    </div>
                </div>
            </div>

            <div class="contactsBlock">
                <form action="<?php echo $link; ?>contact/" method="post" role="form" class="contactsForm" enctype="multipart/form-data">
	                <input type="text" class="checkField form-name" id="nameinput" placeholder="<?php echo $texts['name']; ?>" name="contactname">
	                <input type="email" class="checkField form-mail" id="emailinput" placeholder="Email" name="contact-email">
	                <textarea class="checkField form-mesg" rows="6" name="contact-message" placeholder="<?php echo $texts['message']; ?>"></textarea>
	                <button type="submit" class="btn btn-send"><i class="fa fa-pencil-square-o"></i> <?php echo $texts['send']; ?></button>
	            </form>
            </div>
        </div>
    </section>