<?php
/**
 * @package   WPEmergeAppCore
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2020 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeAppCore\AppCore;

use WPEmerge\Application\Application;
use WPEmergeAppCore\Assets\Assets;
use WPEmergeAppCore\Avatar\Avatar;
use WPEmergeAppCore\Config\Config;
use WPEmergeAppCore\Image\Image;
use WPEmergeAppCore\Sidebar\Sidebar;

/**
 * Main communication channel with the theme.
 */
class AppCore {
	/**
	 * Application instance.
	 *
	 * @var Application
	 */
	protected Application $app;

	/**
	 * Constructor.
	 *
	 * @param Application $app
	 */
	public function __construct( Application $app ) {
		$this->app = $app;
	}

	/**
	 * Shortcut to \WPEmergeAppCore\Assets\Assets.
	 *
	 * @return Assets
	 */
	public function assets(): Assets {
		return $this->app->resolve( Assets::class );
	}

	/**
	 * Shortcut to \WPEmergeAppCore\Avatar\Avatar.
	 *
	 * @return Avatar
	 */
	public function avatar(): Avatar {
		return $this->app->resolve( Avatar::class );
	}

	/**
	 * Shortcut to \WPEmergeAppCore\Config\Config.
	 *
	 * @return Config
	 */
	public function config(): Config {
		return $this->app->resolve( Config::class );
	}

	/**
	 * Shortcut to \WPEmergeAppCore\Image\Image.
	 *
	 * @return Image
	 */
	public function image(): Image {
		return $this->app->resolve( Image::class );
	}

	/**
	 * Shortcut to \WPEmergeAppCore\Sidebar\Sidebar.
	 *
	 * @return Sidebar
	 */
	public function sidebar(): Sidebar {
		return $this->app->resolve( Sidebar::class );
	}
}
