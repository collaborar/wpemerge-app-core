<?php
/**
 * @package   WPEmergeAppCore
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2020 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeAppCore\AppCore;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use WPEmerge\Application\Application;
use WPEmerge\ServiceProviders\ExtendsConfigTrait;

/**
 * Provide theme dependencies.
 *
 * @codeCoverageIgnore
 */
class AppCoreServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface {
	use ExtendsConfigTrait;

	public function provides( string $id ): bool {
		return $id === AppCore::class;
	}

	public function boot(): void {
		$this->extendConfig( 'app_core', [
			'path'       => '',
			'url'        => '',
			'textdomain' => 'default',
		] );

		$app = $this->getContainer()->get( Application::class );
		$app->alias( 'core', AppCore::class );
	}

	public function register(): void {
		$this->getContainer()->addShared( AppCore::class )->addArguments( [ Application::class ] );
	}
}
