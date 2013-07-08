<?php global $data; ?>
			<!-- footer -->
			<footer class="footer" role="contentinfo">
				
				<!-- copyright -->
				<p class="copyright">
					<p> <?php echo $data['footer_text']; ?> </p>
				</p>
				<!-- /copyright -->
				
			</footer>
			<!-- /footer -->
		
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>
		
		<!-- analytics -->
		<script>
			<?php echo $data['google_analytics']; ?> 
		</script>
	
	</body>
</html>