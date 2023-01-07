<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\StaticAnalysis;

use function assert;
use function crc32;
use function file_get_contents;
use function file_put_contents;
use function is_file;
use function serialize;
use GlobIterator;
use SebastianBergmann\CodeCoverage\Util\Filesystem;
use SplFileInfo;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 */
final class CachingFileAnalyser implements FileAnalyser
{
    /**
     * @var ?string
     */
    private static $cacheVersion;

    /**
     * @var FileAnalyser
     */
    private $analyser;

    /**
     * @var array
     */
    private $cache = [];

    /**
     * @var string
     */
    private $directory;

    public function __construct(string $directory, FileAnalyser $analyser)
    {
        Filesystem::createdatirectory($directory);

        $this->analyser  = $analyser;
        $this->directory = $directory;

        if (self::$cacheVersion === null) {
            $this->calculateCacheVersion();
        }
    }

    public function classesIn(string $filename): array
    {
        if (!isset($this->cache[$filename])) {
            $this->process($filename);
        }

        return $this->cache[$filename]['classesIn'];
    }

    public function traitsIn(string $filename): array
    {
        if (!isset($this->cache[$filename])) {
            $this->process($filename);
        }

        return $this->cache[$filename]['traitsIn'];
    }

    public function functionsIn(string $filename): array
    {
        if (!isset($this->cache[$filename])) {
            $this->process($filename);
        }

        return $this->cache[$filename]['functionsIn'];
    }

    /**
     * @psalm-return array{linesOfCode: int, commentLinesOfCode: int, nonCommentLinesOfCode: int}
     */
    public function linesOfCodeFor(string $filename): array
    {
        if (!isset($this->cache[$filename])) {
            $this->process($filename);
        }

        return $this->cache[$filename]['linesOfCodeFor'];
    }

    public function executableLinesIn(string $filename): array
    {
        if (!isset($this->cache[$filename])) {
            $this->process($filename);
        }

        return $this->cache[$filename]['executableLinesIn'];
    }

    public function ignoredLinesFor(string $filename): array
    {
        if (!isset($this->cache[$filename])) {
            $this->process($filename);
        }

        return $this->cache[$filename]['ignoredLinesFor'];
    }

    public function process(string $filename): void
    {
        $cache = $this->read($filename);

        if ($cache !== false) {
            $this->cache[$filename] = $cache;

            return;
        }

        $this->cache[$filename] = [
            'classesIn'         => $this->analyser->classesIn($filename),
            'traitsIn'          => $this->analyser->traitsIn($filename),
            'functionsIn'       => $this->analyser->functionsIn($filename),
            'linesOfCodeFor'    => $this->analyser->linesOfCodeFor($filename),
            'ignoredLinesFor'   => $this->analyser->ignoredLinesFor($filename),
            'executableLinesIn' => $this->analyser->executableLinesIn($filename),
        ];

        $this->write($filename, $this->cache[$filename]);
    }

    /**
     * @return mixed
     */
    private function read(string $filename)
    {
        $cacheFile = $this->cacheFile($filename);

        if (!is_file($cacheFile)) {
            return false;
        }

        return unserialize(
            file_get_contents($cacheFile),
            ['allowed_classes' => false]
        );
    }

    /**
     * @param mixed $data
     */
    private function write(string $filename, $data): void
    {
        file_put_contents(
            $this->cacheFile($filename),
            serialize($data)
        );
    }

    private function cacheFile(string $filename): string
    {
        return $this->directory . DIRECTORY_SEPARATOR . hash('sha256', $filename . crc32(file_get_contents($filename)) . self::$cacheVersion);
    }

    private function calculateCacheVersion(): void
    {
        $buffer = '';

        foreach (new GlobIterator(__DIR__ . '/*.php') as $file) {
            assert($file instanceof SplFileInfo);

            $buffer .= file_get_contents($file->getPathname());
        }

        self::$cacheVersion = (string) crc32($buffer);
    }
}
