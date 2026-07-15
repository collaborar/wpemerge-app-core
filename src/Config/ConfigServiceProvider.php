<?php
/**
 * @package   WPEmergeAppCore
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2020 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeAppCore\Config;

use League\Container\ServiceProvider\AbstractServiceProvider;
use WPEmerge\Application\Configuration;

/**
 * Provide config dependencies.
 *
 * @codeCoverageIgnore
 */
class ConfigServiceProvider extends AbstractServiceProvider {

	public function provides( string $id ): bool {
		return $id === Config::class;
	}

	public function register(): void {
		$this->getContainer()->addShared( Config::class, function () {
			$path = $this->getContainer()->get( Configuration::class )->get( 'app_core.path', '' );
			return new Config( $path );
		} );
	}
}
