<?php
/**
 * Add a client-side title counter functionality.
 */
class GO_TagTester
{
	public $version = '1.0';

	private $config = NULL;
	private $dependencies = array(
		'go-opencalais' => 'https://github.com/GigaOM/go-opencalais',
	);

	/**
	 * Initialize the plugin and register all the hooks.
	 */
	public function __construct()
	{
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'go_tag_tester_submit', array( $this, 'go_tag_tester_submit' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		//add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}//END __construct

	public function wp_enqueue_scripts()
	{
		//wp_enqueue_script( 'go-tagtester' );
		//wp_enqueue_style( 'go-tagtester' );

		//wp_register_style( 'go-tagtester', plugins_url( '/css/go-tagtester.css', __FILE__ ), NULL, $this->version, 'screen' );
		//wp_enqueue_style( 'go-tagtester' );

		//wp_register_style( 'go-tagtester', plugins_url( 'components/css/go-tagtester.css', __DIR__ ), array(), 1 );
		//wp_enqueue_style( 'go-tagtester', plugins_url( 'css/go-tagtester.css', __FILE__ ) );

		wp_register_style( 'go-tagtester', plugins_url( 'css/go-tagtester.css', __FILE__ ), FALSE, $this->version );
		wp_enqueue_style( 'go-tagtester' );

		wp_register_script(
			'go-tagtester',
			plugins_url( 'js/go-tagtester.js', __FILE__ ),
			array( 'jquery' ),
			$this->version,
			TRUE
		);
		wp_enqueue_script( 'go-tagtester' );

		// pass our configuration to our js
		wp_localize_script(
			'go-tagtester',
			'go_tagtester',
			array(
				'alert_threshold' => $this->config( 'alert_threshold' ),
				'high_alert_threshold' => $this->config( 'high_alert_threshold' ),
			)
		);
	}//end admin_enqueue_scripts

	/**
	 * returns our current configuration, or a value in the configuration.
	 *
	 * @param string $key (optional) key to a configuration value
	 * @return mixed Returns the config array, or a config value if
	 *  $key is not NULL, or NULL if $key is specified but isn't set in
	 *  our config file.
	 */
	public function config( $key = NULL )
	{

		if ( empty( $this->config ) )
		{
			$this->config = apply_filters(
				'go_config',
				array(),
				'go-tag-tester'
			);

			if ( empty( $this->config ) )
			{
				do_action( 'go_slog', 'go-tag-tester', 'Unable to load go-tag-tester\' config file' );
				return NULL;
			}
		}//END if

		if ( ! empty( $key ) )
		{
			return isset( $this->config[ $key ] ) ? $this->config[ $key ] : NULL ;
		}

		return $this->config;
	}//END config

	public function init()
	{
		wp_enqueue_style( $this->slug, plugins_url( '/css/go-tagtester.css', __FILE__ ) );
		//wp_register_script( $this->slug, plugins_url( '/js/go-tagtester.js', __FILE__ ), array( 'jquery' ), FALSE, TRUE );

		//wp_register_style( 'go-tagtester', plugins_url( 'css/go-tagtester.css', __FILE__ ), false, false, 'all' );

		add_filter( 'template_include', array( $this, 'template_include' ) );
		add_rewrite_endpoint( 'tag-tester', EP_ALL );
	}//END init

	public function template_include( $template_file_name )
	{
		global $wp_query;

    	// if this is not a request for tag-tester or a singular object then bail
    	if ( ! isset( $wp_query->query_vars['tag-tester'] ) ) {
        	return $template_file_name;
    	}


    	$template_file_name = __DIR__ . '/templates/tagtester-submit.php';

    	return $template_file_name;
	}//END template_include

	public function go_tag_tester_submit ()
	{




	}

}//END class
