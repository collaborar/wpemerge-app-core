<?php
/**
 * @package   WPEmergeAppCore
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2020 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeAppCore\Assets;

use League\Container\ServiceProvider\AbstractServiceProvider;
use WPEmerge\Application\Configuration;
use WPEmergeAppCore\Config\Config;

/**
 * Provide assets dependencies.
 *
 * @codeCoverageIgnore
 */
class AssetsServiceProvider extends AbstractServiceProvider {

	public function provides( string $id ): bool {
		return in_array( $id, [ Manifest::class, Assets::class ], true );
	}

	public function register(): void {
		$c = $this->getContainer();

		$c->addShared( Manifest::class, function () use ( $c ) {
			$path = $c->get( Configuration::class )->get( 'app_core.path', '' );
			return new Manifest( $path );
		} );

		$c->addShared( Assets::class, function () use ( $c ) {
			$config = $c->get( Configuration::class );
			return new Assets(
				$config->get( 'app_core.path', '' ),
				$config->get( 'app_core.url', '' ),
				$config->get( 'app_core.textdomain', 'default' ),
				$c->get( Config::class ),
				$c->get( Manifest::class ),
				$c->get( \WP_Filesystem_Base::class )
			);
		} );
	}
}
