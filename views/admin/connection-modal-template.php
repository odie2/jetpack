<script id="tmpl-connection-modal" type="text/html">
	<span id="modal-label" class="screen-reader-text"><?php _e( 'Modal window. Press escape to close.', 'jetpack' ); ?></span>
	<a href="#" class="close">&times; <span class="screen-reader-text"><?php _e( 'Close modal window', 'jetpack' ); ?></span></a>
	<div class="content-container <# if ( data.available) { #>modal-footer<# } #>">

		<div id="my-connection-content" class="content">
			<h2><?php _e( 'Jetpack Connection Status' ); ?></h2>
			<# if ( data.isAdmin ) { #><?php /* if user has admin privledges */ ?>
				<div class="connection-details">
					<div class="j-row">
						<div class="j-col j-lrg-6 j-md-6 j-sm-6 jp-user">
							<h3 title="<?php _e( 'Username', 'jetpack' ); ?>"><?php _e( 'Site Username', 'jetpack' ); ?></h3>
							<# if ( !data.connectionLogic.isMasterUser ) { #>
								<div class="user-01">{{{ data.connectionLogic.adminUsername }}} (you)</div>
							<# } #>
							<div class="user-01">{{{ data.connectionLogic.masterUserLink }}} (primary)</div>
						</div><!-- // jp-user -->
						<div class="j-col j-lrg-6 j-md-6 j-sm-6 wp-user">
							<h3 title="<?php _e( 'WordPress.com Username', 'jetpack' ); ?>"><?php _e( 'WordPress.com', 'jetpack' ); ?></h3>
							<# if ( !data.connectionLogic.isMasterUser && !data.connectionLogic.isUserConnected ) { #>
								<a href="<?php echo Jetpack::init()->build_connect_url() ?>" ><?php esc_html_e( 'Link your account', 'jetpack' ); ?></a>
							<# } else if ( !data.connectionLogic.isMasterUser ) { #>
								<div class="wpuser-02">{{{ data.userComData.login }}}</div> 
							<# } #>
								<div class="wpuser-02">{{{ data.masterComData.login }}}</div>
						</div><!-- // wp-user -->
					</div><!-- // j-row -->
				</div>
				<div class="j-col j-lrg-12 j-md-12 j-sm-12">
					<# if ( !data.connectionLogic.isMasterUser && data.connectionLogic.isUserConnected ) { #>
						<a class="button button-primary" title="Make me the primary account holder" id="set-self-as-master"><?php esc_html_e( 'Make me primary', 'jetpack' ); ?></a>
					<# } #>
						<a class="button alignright" id="jetpack-disconnect" title="Disconnect Jetpack"><?php esc_html_e( 'Disconnect Jetpack', 'jetpack' ); ?></a>
					<# if ( !data.connectionLogic.isMasterUser && data.connectionLogic.isUserConnected ) { #>
						<a class="button alignright" href="<?php echo wp_nonce_url( Jetpack::admin_url( 'action=unlink' ), 'jetpack-unlink' ); ?>"  title="Disconnect your WordPress.com account from Jetpack" onclick="return confirm('<?php echo htmlspecialchars( __( 'Are you sure you want to disconnect your WordPress.com account?', 'jetpack' ), ENT_QUOTES ); ?>');" ><?php esc_html_e( 'Unlink my account ', 'jetpack' ); ?></a>
					<# } #>
				</div>
			<# } else { #><?php /* User doesn't have admin privledges */ ?>
				<div class="connection-details">
					<div class="j-row">
						<div class="j-col j-lrg-6 j-md-6 j-sm-6 jp-user">
							<h3 title="<?php _e( 'Site', 'jetpack' ); ?>"><?php _e( 'Site Username', 'jetpack' ); ?></h3>
							<div class="user-01"><span>{{{ data.connectionLogic.adminUsername }}}</span></div>
						</div><!-- // jp-user -->
						<div class="j-col j-lrg-6 j-md-6 j-sm-6 wp-user">
							<h3 title="<?php _e( 'WordPress.com', 'jetpack' ); ?>"><?php _e( 'WordPress.com Username', 'jetpack' ); ?></h3>
							<# if ( data.connectionLogic.isUserConnected ) { #><?php /* user is connected to Jetpack */ ?>
								<div class="wpuser-02">{{{ data.userComData.login }}}</div>
							<# } else { #>
								<a href="<?php echo Jetpack::init()->build_connect_url() ?>" ><?php esc_html_e( 'Link your account', 'jetpack' ); ?></a>
							<# } #>
						</div><!-- // wp-user -->

					</div><!-- // j-row -->
				</div><!-- // connection-details -->
				<div class="j-col j-lrg-12 j-md-12 j-sm-12">
					<# if ( data.connectionLogic.isUserConnected ) { #><?php /* user is connected to Jetpack */ ?>
						<a class="button" title="Disconnect your WordPress.com account from Jetpack" href="<?php echo wp_nonce_url( Jetpack::admin_url( 'action=unlink' ), 'jetpack-unlink' ); ?>"><?php esc_html_e( 'Unlink my account ', 'jetpack' ); ?></a>
					<# } #>
				</div>
			<# } #><?php /* end data.isAdmin */ ?>
		</div>
		<div id="jetpack-disconnect-content">
			<h2>Disconnecting Jetpack</h2>
			<p>Before you completely disconnect Jetpack is there anything we can do to help?</p>
			<a class="button" title="Disconnect Jetpack" href="<?php echo wp_nonce_url( Jetpack::admin_url( 'action=disconnect' ), 'jetpack-disconnect' ); ?>">Confirm Disconnect</a>
			<a class="button primary" target="_blank" title="Jetpack Support" href="http://jetpack.me/contact-support/">I Need Support</a>
		</div>
	</div>

</script>

<script id="tmpl-connection-modal-loading" type="text/html">
<p>Loading...</p>
</script>
