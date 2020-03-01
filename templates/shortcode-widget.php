<?php if ( ! empty( $updates ) ) : ?>
<div class="wsu-campus-updates__wrapper">
	<h2 class="wsu-campus-updates__title"><span class="wsu-campus-updates__title__subhead">Campus</span> Closures & Delays</h2>
	<ul class="wsu-campus-updates">
		<?php foreach ( $updates as $update ) : ?>
		<li class="wsu-campus-updates__item">
			<span class="wsu-campus-updates__item__title"><?php echo esc_html( $update->get( 'title' ) ); ?></span>
			<span class="wsu-campus-updates__item__summary"><?php echo esc_html( $update->get( 'content' ) ); ?></span>
			<?php if ( ! empty( $update->get( 'impact_titles' ) ) ) : ?>
			<span class="wsu-campus-updates__item__impacts"><strong>Impacting:</strong> <?php echo implode( ', ', $update->get( 'impact_titles' ) ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $update->get( 'link' ) ) ) : ?>
				<span class="wsu-campus-updates__item__link">
					<a href="<?php echo esc_url( $update->get( 'link' ) ); ?>">More Details</a>
				</span>
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<style>
	.wsu-campus-updates {
		list-style-type: none;
		margin: 0;
		padding: 0;
	}
	.wsu-campus-updates__title {
		font-size: 1.25rem;
		border-bottom: 2px solid rgba(0,0,0,0.25);
		padding-bottom: 0.5rem;
		color: #be000f;
	}
	.wsu-campus-updates__title__subhead {
		display: block;
		font-size: 0.8rem;
		text-transform: uppercase;
	}
	.wsu-campus-updates__item {
		margin: 0;
		padding: 0;
		border-bottom: 1px solid rgba(0,0,0,0.15);
		padding-bottom: 1rem;
		padding-top: 1rem;
	}
	.wsu-campus-updates__item__title {
		display: block;
		font-weight: bold;
		color: rgba(0,0,0,0.9);
	}
	.wsu-campus-updates__item__summary {
		display: block;
		padding-top: 0.25rem;
		font-size: 0.8rem;
		line-height: 1rem;
		padding-bottom: 0.25rem;
	}
	.wsu-campus-updates__item__link {
		display: block;
		font-weight: bold;
		font-size: 0.8rem;
		padding-top: 0.25rem;
	}
	.wsu-campus-updates__item__link:after {
		font-family: Spine-Icons;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		position: absolute;
		margin-left: 3px;
		content: "\21AA";
		font-size: 0.6rem;
		color: #be000f;
	}
	.wsu-campus-updates__item__impacts {
		display: block;
		font-size: 0.75rem;
		line-height: 1rem;
		padding-top: 0.25rem;
	}
</style>
<?php endif; ?>
