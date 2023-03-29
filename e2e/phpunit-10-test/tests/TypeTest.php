<?php declare(strict_types = 1);

namespace PHPUnit10Test;

use PHPStan\Testing\TypeInferenceTestCase;

class TypeTest extends TypeInferenceTestCase
{

	/**
	 * @return iterable<mixed>
	 */
	public function dataFileAsserts(): iterable
	{
		yield from self::gatherAssertTypes(__DIR__ . '/assert.php');
		yield from $this->gatherAssertTypes(__DIR__ . '/assert2.php');
	}

	/**
	 * @dataProvider dataFileAsserts
	 */
	public function testFileAsserts(
		string $assertType,
		string $file,
		mixed ...$args
	): void
	{
		$this->assertFileAsserts($assertType, $file, ...$args);
	}

}