<?php
/*
Plugin Name: Clever Fox
Plugin URI:
Description: Clever Fox plugin to enhance the functionality of free themes made by Nayra Themes. More than 60000+ trusted websites with Nayra Themes. It provides intuitive features to your website. 35+ Themes compatible with Clever Fox. See below free themes listed here. Avril, Gradiant, Flavita, Conceptly & ColorPress is one of highest installations themes in our collections.
Version: 19.1
Author: nayrathemes
Author URI: https://nayrathemes.com
Text Domain: clever-fox
Requires PHP: 5.6
*/
define( 'CLEVERFOX_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CLEVERFOX_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

function cleverfox_activate() {
	
	/**
	 * Load Custom control in Customizer
	 */
	define( 'CLEVERFOX_DIRECTORY', plugin_dir_url( __FILE__ ) . '/inc/custom-controls/' );
	define( 'CLEVERFOX_DIRECTORY_URI', plugin_dir_url( __FILE__ ) . '/inc/custom-controls/' );
	if ( class_exists( 'WP_Customize_Control' ) ) {
		require_once('inc/custom-controls/controls/range-validator/range-control.php');	
	}
	
	$theme = wp_get_theme(); // gets the current theme
		if ( 'StartKit' == $theme->name){	
			require_once('inc/startkit/startkit.php');
		}
		
		if ( 'StartBiz' == $theme->name){	
			require_once('inc/startbiz/startbiz.php');
		}
		
		if ('Arowana' == $theme->name){	
			 require_once('inc/arowana/arowana.php');
		}
		
		if ('Envira' == $theme->name){	
			 require_once('inc/envira/envira.php');			
		}
		
		if( 'Hantus' == $theme->name){
			require_once('inc/hantus/hantus.php');	
		}
		
		if( 'Thai Spa' == $theme->name){
			require_once('inc/thai-spa/thai-spa.php');	
		}
		
		if( 'Conceptly' == $theme->name){
			require_once('inc/conceptly/conceptly.php');
		}
		
		if( 'Ameya' == $theme->name){
			require_once('inc/ameya/ameya.php');
		}
		
		if( 'Azwa' == $theme->name){
			require_once('inc/azwa/azwa.php');
		}
		
		if( 'Avril' == $theme->name){
			require_once('inc/avril/avril.php');
		}
		
		if( 'Aera' == $theme->name){
			require_once('inc/aera/aera.php');
		}
		
		if( 'Avail' == $theme->name){
			require_once('inc/avail/avail.php');
		}
		
		if( 'Avtari' == $theme->name){
			require_once('inc/avtari/avtari.php');
		}
		
		if( 'Fiona Blog' == $theme->name){
			require_once('inc/fiona-blog/fiona-blog.php');
		}
		
		if( 'MetaSoft' == $theme->name ){
			require_once('inc/metasoft/metasoft.php');
		}
		
		if( 'Belltech' == $theme->name){
			require_once('inc/belltech/belltech.php');
		}
		
		if( 'Fiona Food' == $theme->name){
			require_once('inc/fiona-food/fiona-food.php');
		}
		
		if( 'Fiona News' == $theme->name){
			require_once('inc/fiona-news/fiona-news.php');
		}
		
		if( 'Axtia' == $theme->name){
			require_once('inc/axtria/axtria.php');
		}
		
		if( 'Aravalli' == $theme->name){
			require_once('inc/aravalli/aravalli.php');
		}
		
		if( 'Arbuda' == $theme->name){
			require_once('inc/arbuda/arbuda.php');
		}
		
		if( 'Boostify' == $theme->name){
			require_once('inc/boostify/boostify.php');
		}
		
		if( 'Gradiant' == $theme->name){
			require_once('inc/gradiant/gradiant.php');
		}
		
		if( 'Aviser' == $theme->name){
			require_once('inc/aviser/aviser.php');
		}
		
		if( 'Comoxa' == $theme->name){
			require_once('inc/comoxa/comoxa.php');
		}
		
		if( 'Techine' == $theme->name){
			require_once('inc/techine/techine.php');
		}
		
		if( 'ColorPress' == $theme->name){
			require_once('inc/colorpress/colorpress.php');
		}
		
		if( 'Flavita' == $theme->name){
			require_once('inc/flavita/flavita.php');
		}
		
		if( 'Avitech' == $theme->name){
			require_once('inc/avitech/avitech.php');
		}
		
		if( 'Colorsy' == $theme->name){
			require_once('inc/colorsy/colorsy.php');
		}
		
		if( 'Ampark' == $theme->name){
			require_once('inc/ampark/ampark.php');
		}
		
		if( 'Eduvert' == $theme->name){
			require_once('inc/eduvert/eduvert.php');
		}
		
		if( 'Varuda' == $theme->name){
			require_once('inc/varuda/varuda.php');
		}
		
		if( 'Cosmics' == $theme->name){
			require_once('inc/cosmics/cosmics.php');
		}
		
		if( 'StartWeb' == $theme->name){
			require_once('inc/startweb/startweb.php');
		}
		
		if( 'Appointo' == $theme->name){
			require_once('inc/appointo/appointo.php');
		}
		
		if( 'Renoval' == $theme->name){
			require_once('inc/renoval/renoval.php');
		}
		
		if( 'Builderse' == $theme->name){
			require_once('inc/builderse/builderse.php');
		}
		
		if( 'Constra' == $theme->name){
			require_once('inc/constra/constra.php');
		}
	}
add_action( 'init', 'cleverfox_activate' );

$theme = wp_get_theme();

/**
 * Fiona Widgets
 */
if( 'Fiona Blog' == $theme->name || 'Fiona Food' == $theme->name || 'Fiona News' == $theme->name){
	require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/widgets/class-fiona-widgets.php';
}


/**
 * Gradiant Block
 */
if( 'Gradiant' == $theme->name  || 'Comoxa' == $theme->name  || 'ColorPress' == $theme->name  || 'Flavita' == $theme->name){
	require CLEVERFOX_PLUGIN_DIR . '/inc/gradiant/block/info-box.php'; 
}



/**
 * Renoval Block
 */
if( 'Renoval' == $theme->name ){
	require CLEVERFOX_PLUGIN_DIR . '/inc/renoval/block/info-box.php'; 
}



	if ( ! class_exists( 'Clever_Fox_Setup' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Clever_Fox_Setup {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		 public function __construct() {
			add_action( 'admin_menu', array($this, 'clever_fox_setup_menu') );
			add_action( 'wp_ajax_clever-fox-activate-theme', array( $this, 'activate_theme' ),2 );
			//add_action( 'wp_ajax_clever-fox-activate-theme', array( $this, 'activate_theme' ),1 );
			add_action( 'admin_enqueue_scripts', array( $this, 'clever_fox_enqueue_scripts' ) );
		}
		
		
		public function clever_fox_enqueue_scripts() {
			wp_enqueue_style('clever-fox-admin',CLEVERFOX_PLUGIN_URL .'inc/assets/css/admin.css');
			wp_enqueue_script( 'jquery-ui-core' );
					wp_enqueue_script( 'jquery-ui-dialog' );
					wp_enqueue_style( 'wp-jquery-ui-dialog' );	
					
					wp_enqueue_script( 'clever-fox-install-theme', CLEVERFOX_PLUGIN_URL . 'inc/assets/js/install-theme.js', array( 'jquery', 'updates' ) );
					
					wp_enqueue_script( 'clever-fox-filter-tabs', CLEVERFOX_PLUGIN_URL . 'inc/assets/js/filter-tabs.js', array( 'jquery', 'updates' ) );
					
					$data = apply_filters(
						'clever_fox_install_theme_localize_vars',
						array(
							'installed'  => __( 'Installed! Activating..', 'clever-fox' ),
							'activating' => __( 'Activating..', 'clever-fox' ),
							'activated'  => __( 'Activated! Reloading..', 'clever-fox' ),
							'installing' => __( 'Installing..', 'clever-fox' ),
							'ajaxurl'    => esc_url( admin_url( 'admin-ajax.php' ) ),
							'security' => wp_create_nonce( 'my-special-string' )
						)
					);
					wp_localize_script( 'clever-fox-install-theme', 'CleverFoxInstallThemeVars', $data );
		}

		public function clever_fox_setup_menu() {
			add_menu_page( 'Clever Fox', 'Clever Fox', 'manage_options', 'clever-fox', array($this, 'clever_fox_page_init')  );
		}


		function clever_fox_page_init(){
	echo "<h2 class='clever-heading'>Nayra Themes Compatible Themes</h2>";
	?>
	
	<div class="filter-buttons">
		<button class="filter-button button-primary" data-category="all"><?php esc_html_e('All','clever-fox'); ?></button>
		<button class="filter-button button-primary" data-category="Business"><?php esc_html_e('Business','clever-fox'); ?></button>
		<button class="filter-button button-primary" data-category="Agency"><?php esc_html_e('Agency','clever-fox'); ?></button>
		<button class="filter-button button-primary" data-category="Corporate"><?php esc_html_e('Corporate','clever-fox'); ?></button>
		<button class="filter-button button-primary" data-category="Multipurpose"><?php esc_html_e('Multipurpose','clever-fox'); ?></button>
		<button class="filter-button button-primary" data-category="IT-Software"><?php esc_html_e('IT & Software','clever-fox'); ?></button>
		<button class="filter-button button-primary" data-category="Education"><?php esc_html_e('Education','clever-fox'); ?></button>	
		<button class="filter-button button-primary" data-category="Hotel-Resorts"><?php esc_html_e('Hotel & Resorts','clever-fox'); ?></button>	
		<button class="filter-button button-primary" data-category="News-Blog"><?php esc_html_e('News & Blog','clever-fox'); ?></button>	
		<button class="filter-button button-primary" data-category="Spa-Saloon"><?php esc_html_e('Spa Saloon','clever-fox'); ?></button>	
		<button class="filter-button button-primary" data-category="Events"><?php esc_html_e('Events','clever-fox'); ?></button>	
	</div>
	
	<?php
	
		$api_url = 'https://api.wordpress.org/themes/info/1.1/?action=query_themes&request[author]=nayrathemes&request[per_page]=40';

		// Read JSON file
		$json_data = file_get_contents($api_url);

		// Decode JSON data into PHP array
		$response_data = json_decode($json_data);

	
		// All user data exists in 'data' object
		$theme_data = $response_data->themes;

		// Traverse array and display user data
		
		?>
		
		<div class="specia-sites-panel wp-clearfix">
			<div class="specia-sites-wrapper" id="wrap-disk">
				<?php foreach ($theme_data as $themes) { 
				
				$theme = wp_get_theme();
				
				$get_theme_staus='';
				// Theme installed and activate.
				if ( $themes->name == $theme->name ) {
					$get_theme_staus= 'installed-and-active';
					$specia_btn_value= 'Activated';
				}else{

					// Theme installed but not activate.
					foreach ( (array) wp_get_themes() as $theme_dir => $themesss ) {
						if ( $themes->name == $themesss->name ) {
							$get_theme_staus= 'installed-but-inactive';
							$specia_btn_value= 'Activate Now';
						}
						 //$get_theme_staus= 'not-installed';
					}
				}
				
				?>
				
				
					<?php 
						if ( ($themes->name) == "Ampark" ):
							$theme_category ="Business";

						elseif ( ($themes->name) == "Avitech" ):
							$theme_category ="Business";
							
						elseif ( ($themes->name) == "Aviser" ):
							$theme_category ="Business";
							
						elseif ( ($themes->name) == "Axtia" ):
							$theme_category ="Business";
							
						elseif ( ($themes->name) == "Avail" ):
							$theme_category ="Business";
							
						elseif ( ($themes->name) == "Aera" ):
							$theme_category ="Business";
							
						elseif ( ($themes->name) == "Avril" ):
							$theme_category ="Business";
							
						elseif ( ($themes->name) == "Varuda" ):
							$theme_category ="Business";
							
						elseif ( ($themes->name) == "Avtari" ):
							$theme_category ="Business";
							
						elseif ( ($themes->name) == "Techine" ):
							$theme_category ="Agency";
							
						elseif ( ($themes->name) == "Conceptly" ):
							$theme_category ="Agency";
							
						elseif ( ($themes->name) == "Ameya" ):
							$theme_category ="Agency";
							
						elseif ( ($themes->name) == "Azwa" ):
							$theme_category ="Agency";
							
						elseif ( ($themes->name) == "Colorsy" ):
						$theme_category ="Corporate";

						elseif ( ($themes->name) == "ColorPress" ):
						$theme_category ="Corporate";

						elseif ( ($themes->name) == "Flavita" ):
						$theme_category ="Corporate";

						elseif ( ($themes->name) == "Comoxa" ):
						$theme_category ="Corporate";

						elseif ( ($themes->name) == "Gradiant" ):
						$theme_category ="Corporate";

						elseif ( ($themes->name) == "Boostify" ):
						$theme_category ="Multipurpose";

						elseif ( ($themes->name) == "Envira" ):
						$theme_category ="Multipurpose";

						elseif ( ($themes->name) == "StartKit" ):
						$theme_category ="Multipurpose";

						elseif ( ($themes->name) == "StartBiz" ):
						$theme_category ="Multipurpose";

						elseif ( ($themes->name) == "Arowana" ):
						$theme_category ="Multipurpose";

						elseif ( ($themes->name) == "StartWeb" ):
						$theme_category ="Multipurpose";

						elseif ( ($themes->name) == "MetaSoft" ):
						$theme_category ="IT-Software";

						elseif ( ($themes->name) == "Belltech" ):
						$theme_category ="IT-Software";

						elseif ( ($themes->name) == "Eduvert" ):
						$theme_category ="Education";

						elseif ( ($themes->name) == "Aravalli" ):
						$theme_category ="Hotel-Resorts";

						elseif ( ($themes->name) == "Arbuda" ):
						$theme_category ="Hotel-Resorts";

						elseif ( ($themes->name) == "Fiona Blog" ):
						$theme_category ="News-Blog";

						elseif ( ($themes->name) == "Fiona Food" ):
						$theme_category ="News-Blog";

						elseif ( ($themes->name) == "Fiona News" ):
						$theme_category ="News-Blog";

						elseif ( ($themes->name) == "Hantus" ):
						$theme_category ="Spa-Saloon";

						elseif ( ($themes->name) == "Thai Spa" ):
						$theme_category ="Spa-Saloon";

						elseif ( ($themes->name) == "Cosmics" ):
						$theme_category ="Spa-Saloon";

						elseif ( ($themes->name) == "EventPress" ):
						$theme_category ="Events";

						elseif ( ($themes->name) == "Appointo" ):
						$theme_category ="Agency";

						elseif ( ($themes->name) == "Renoval" ||  ($themes->name) == "Builderse" || ($themes->name) == "Constra"):
						$theme_category ="Agency";

						else :
							$theme_category ="Business";
						endif;
					?>
					<div id="specia-theme-activation-xl" data-category="<?php echo esc_html($theme_category); ?>" class="clever-fox-sites-items <?php echo esc_html($themes->name); ?>">
						<div class="clever-fox-items-inner">
							<div class="specia-demo-screenshot">
								<div class="specia-demo-image" style="background-image: url(<?php echo esc_url($themes->screenshot_url); ?>);"></div>
									<div class="specia-demo-actions">
										<a class="clever-fox-btn clever-fox-btn-outline" href="https://nayrathemes.com/demo/pro/<?php echo esc_html($themes->slug); ?>" target="_blank"><?php esc_html_e('Preview','clever-fox'); ?></a>
										<?php 
										if($get_theme_staus !== 'installed-and-active' && $get_theme_staus !== 'installed-but-inactive'):
											$get_theme_staus= 'not-installed';
											$specia_btn_value= 'Install & Activate Now';
										endif;
										$theme_status = 'clever-fox-theme-' . $get_theme_staus;
										echo sprintf( __( '<a href="#" class="%3$s xl-btn-active clever-fox-btn-outline xl-install-action clever-fox-btn" data-theme-slug="%1$s">%4$s</a>', 'clever-fox' ), esc_html($themes->name),esc_url( admin_url( 'themes.php?theme=%1$s' ) ), $theme_status, $specia_btn_value );
										//switch_theme( $themes->name );
										?>
									</div>
								</div>
								<div class="sp-demo-meta  sp-demo-meta--with-preview">
									<div class="sp-demo-name"><h4 title="Nayra Themes"><a href="<?php echo esc_url(admin_url('theme-install.php?search='.$themes->name)); ?>"><?php echo esc_html($themes->name); ?></a></h4></div>	
									<a class="clever-fox-btn clever-fox-btn-outline" href="https://nayrathemes.com/<?php echo esc_html($themes->slug); ?>-pro/" target="_blank"><?php esc_html_e('Buy Now','clever-fox'); ?></a>	
								</div>
								<?php //echo $get_theme_staus; ?>
						</div>
					</div>
				<?php } ?>									
				</div>
			</div>
		
		<?php
}


		/**
		 * Activate theme
		 *
		 * @since 1.0
		 * @return void
		 */
		function activate_theme() { 
			 $specia_current_theme =  strtolower($_POST['specia_current_theme']);
			switch_theme(  $specia_current_theme );
			wp_send_json_success(
				array(
					'success' => true,
					'message' => __( 'Theme Successfully Activated', 'clever-fox' ),
				)
			);
			wp_die(); 
		}
		
	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Clever_Fox_Setup::get_instance();


/**
 * The code during plugin activation.
 */
function activate_cleverfox() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/cleverfox-activator.php';
	Cleverfox_Activator::activate();
}
register_activation_hook( __FILE__, 'activate_cleverfox' );