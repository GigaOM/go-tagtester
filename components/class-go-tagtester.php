<?php
/**
 * Add a client-side title counter functionality.
 */
class GO_TagTester
{
	public $version = '1.0';

	private $config = NULL;

	/**
	 * Initialize the plugin and register all the hooks.
	 */
	public function __construct()
	{
		add_action( 'init', array( $this, 'init' ) );
	}//END __construct

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
		add_action( 'template_redirect', array( $this, 'template_redirect' ) );
		add_rewrite_endpoint( 'tag-tester', EP_ALL );
	}//END init

	public function template_redirect() {
		global $wp_query;

    	// if this is not a request for tag-tester or a singular object then bail
    	if ( ! isset( $wp_query->query_vars['tag-tester'] ) || ! is_singular() )
        	return;

    	// include custom template
    	include dirname( __FILE__ ) . '/templates/go-tagtester.php';
    	exit;
	}//END template_redirect

}//END class
