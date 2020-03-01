<?php namespace WSUWP\Plugin\Campus_Updates;

class Campus_Update {

	protected $title;
	protected $status;
	protected $level;
	protected $impact = array();
	protected $impact_titles = array();
	protected $summary;
	protected $link;
	protected $content;


	public function __construct( $post = false ) {

		if ( false !== $post ) {

			$this->set_by_post_id( $post );

		}

	}


	public function get( $property ) {

		switch ( $property ) {

			case 'title':
				return $this->title;
			case 'status':
				return $this->status;
			case 'impact':
				return $this->impact;
			case 'impact_titles':
				return $this->impact_titles;
			case 'link':
				return $this->link;
			case 'content':
				return $this->content;
			default:
				return '';
		}

	} // End get

	public function set_by_post_id( $post ) {

		$title   = $post->post_title;
		$status  = get_post_meta( $post->ID, 'wsu_update_status', true );
		$content = get_post_meta( $post->ID, 'wsu_update_caption', true );
		$impact  = get_post_meta( $post->ID, 'wsu_update_impact', true );
		$link    = get_post_meta( $post->ID, 'wsu_update_link', true );


		$this->title   = $title;
		$this->status  = ( ! empty( $status ) ) ? $status : 'off';
		$this->impact  = ( is_array( $impact ) ) ? $impact : array();
		$this->link    = $link;
		$this->content = $content;

		foreach ( $this->impact as $key ) {

			switch ( $key ) {

				case 'all':
					$this->impact_titles[] = 'All Campuses';
					break;
				case 'pullman':
					$this->impact_titles[] = 'Pullman';
					break;
				case 'spokane': 
					$this->impact_titles[] = 'Spokane';
					break;
				case 'tri-cities': 
					$this->impact_titles[] = 'Tri-Cities';
					break;
				case 'vancouver': 
					$this->impact_titles[] = 'Vancouver';
					break;
				case 'everett': 
					$this->impact_titles[] = 'Everett';
					break;
				case 'global-campus':
					$this->impact_titles[] = 'Global Campus';
					break;

			} // End switch
		} // End foreach

	}

}
