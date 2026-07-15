<?php
/**
 * @package   WPEmergeAppCore
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2020 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeAppCore\Avatar;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

/**
 * Provide avatar dependencies.
 *
 * @codeCoverageIgnore
 */
class AvatarServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {

	public function provides( string $id ): bool {
		return $id === Avatar::class;
	}

	public function boot(): void {
		$this->getContainer()->get( Avatar::class )->bootstrap();
	}

	public function register(): void {
		$this->getContainer()->addShared( Avatar::class );
	}
}
