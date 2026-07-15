<?php
/**
 * @package   WPEmergeAppCore
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2020 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeAppCore\Sidebar;

use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * Provide sidebar dependencies.
 *
 * @codeCoverageIgnore
 */
class SidebarServiceProvider extends AbstractServiceProvider {

	public function provides( string $id ): bool {
		return $id === Sidebar::class;
	}

	public function register(): void {
		$this->getContainer()->addShared( Sidebar::class );
	}
}
