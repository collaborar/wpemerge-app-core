<?php
/**
 * @package   WPEmergeAppCore
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2020 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeAppCore\Image;

use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * Provide image dependencies.
 *
 * @codeCoverageIgnore
 */
class ImageServiceProvider extends AbstractServiceProvider {

	public function provides( string $id ): bool {
		return $id === Image::class;
	}

	public function register(): void {
		$this->getContainer()->addShared( Image::class )->addArguments( [ \WP_Filesystem_Base::class ] );
	}
}
