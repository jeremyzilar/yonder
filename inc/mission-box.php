<?php if (empty(yonder_getcookie())) { ?>
	<section id="mission-box">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-5 mission-photo">
					<img src="<?php echo THEME . '/img/andrej_1000.png'; ?>" alt="" class="img-responsive"/>
				</div>
				<div class="col-xs-12 col-sm-7 mission-txt">
					<p>Yonder is a weekly newsletter on the news from <a href="https://twitter.com/andrejmrevlje" title="Follow Andrej Mrevlje on Twitter">Andrej Mrevlje</a>, <span>deivered every Sunday.</span></p>
					<p>Questions? <a href="mailto:andrej.mrevlje@gmail.com">andrej.mrevlje@gmail.com</a></p>

					<!-- Social Promo -->
    			<?php include(INC . '/social.php'); ?>

				</div>
			</div>
			
			

		</div>
	</section>
<?php } ?>