<?php
    require_once 'vue/header.php';
?>
			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container jumbotron light-gray-bg text-center margin-clear">
				<div class="container">
					<div class="row">
						<!-- main start -->
						<!-- ================ -->
                        <form action="../supprimer_cv?numero=<?php echo $_GET['numero'];?>" method="post" style="margin-left: 20px; color: black">
						    <div class="main col-md-6 col-md-offset-3 pv-40">
							    <h2> Voulez-vous vraiment supprimer ce CV ? </h2> <br/> <br/>
                                <input type="submit" name="action" value="Supprimer" class="btn btn-default btn-lg"/>
                                <input type="submit" name="action" value="Annuler" class="btn btn-default btn-lg" />
						    </div>
                        </form>
						<!-- main end -->
					</div>
				</div>
			</section>
			<!-- main-container end -->
<?php
    require_once 'vue/footer.php';
?>
